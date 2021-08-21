import {h, Component} from "preact";
import {Integer} from "./components/Integer";
import {KernelMatrix} from "./components/KernelMatrix";
import {Number} from "./components/Number";
import {ValueSelect} from "./components/ValueSelect";
import {triggerEvent, EventType, registerEvent, unregisterEvent} from "./events";
import {SelectOption} from "./components/Select";
import {getNamedColorValue} from "./ImagickColors";
import {RgbaColorPicker, RgbaColor} from "react-colorful";
import {colorValues} from "./color_convert";


// https://swagger.io/specification/#example-object

enum OpenApiType {
    array = 'array',
    boolean = "boolean",
    integer = "integer",
    enum = 'enum',
    number = "number",
    string = "string",
}

interface Schema {
    default: string;
    format: string;
    minimum: (string|number|undefined);
    maximum: (string|number|undefined);
    enum: Array<string>|undefined;
    type: OpenApiType;
}

interface ControlInfo {
    schema: Schema;
    name: string;
    required: boolean;
}

export interface AppProps {
    name: string;
    initialControlParams: object;
    controls: Array<ControlInfo>;
}

type Controls = {
    [key: string]: ControlInfo;
};

type Values = {
    [key: string]: string|number;
};

interface AppState {
    isProcessing: boolean;
    controls: Controls; // TODO - move to props.
    values: Values;
    active_color: string|null; // the color being edited.
}

function getDefaultState(initialControlParams: object): AppState {

    let state: AppState = {
        isProcessing: false,
        controls: {},
        values: {},
        active_color: null
    };

    for (let name in initialControlParams) {
        if (initialControlParams.hasOwnProperty(name) === true) {
            // @ts-ignore: blah blah
            state.values[name] = initialControlParams[name];
        }
    }

    // @ts-ignore: blah blah
    return state;
}

/**
 * Given an api parameter name, return a nicer user facing name,
 * if one exists, otherwise just return the api parameter name.
 * @param api_param_name
 */
function map_api_name(api_param_name: string): string {

    let known_map = {
        amount: "Amount",
        background_color: "Background color",
        best_fit: "Best fit",
        black_point: "Black point",
        bias: "Bias",
        channel: "Channel",
        channel_number: "Channel number",
        channel_1_sample: "Channel 1",
        channel_2_sample: "Channel 2",
        channel_3_sample: "Channel 3",
        color: "Color",
        colorspace: "Colorspace",
        color_space: "Color space",
        color_matrix: "Color matrix",
        convolve_matrix: "Convolve matrix",
        end_angle: "End angle",
        end_x: "End X",
        end_y: "End Y",
        endX: "End X",
        endY: "End Y",
        fill_color: "Fill color",
        fill_modified_color: "Fill color 2",
        first_term: "First term",
        fourth_term: "Fourth term",
        function_type: "Function type",
        fx_analyze_example: "FX Analyze example",
        height: "Height",
        image_path: "Image",
        inner_bevel: "Inner bevel",
        kernel_render: "Kernel render",
        kernel_type: "Kernel type",
        outer_bevel: "Outer bevel",
        paint_type: "Paint type",
        radius: "Radius",
        round_x: "Round x",
        round_y: "Round y",
        second_term: "Second term",
        sigma: "Sigma",
        start_angle: "Start angle",
        start_x: "Start X",
        start_y: "Start Y",
        startX: "Start X",
        startY: "Start Y",
        stroke_color: "Stroke color",
        text_under_color: "Text under color",
        third_term: "Third term",
        translate_x: "Translate X",
        translate_y: "Translate Y",
        unsharp_threshold: 'Unsharp threshold',
        width: "Width",
        white_point: "White point",
    };






    if (known_map.hasOwnProperty(api_param_name) === true) {
        // @ts-ignore: blah blah
        return known_map[api_param_name];
    }

    return api_param_name;
}

function makeOptionsFromEnum(options: Array<string>): Array<SelectOption>
{
    let options_map = [];

    for(let i=0; i<options.length; i+=1) {
        // @ts-ignore: blah blah
        let next = {
            value: options[i],
            label: options[i]
        };

        options_map.push(next);
    }

    return options_map;
}


export class ControlPanel extends Component<AppProps, AppState> {

    restoreStateFn: Function;

    constructor(props: AppProps) {
        super(props);
        this.state = getDefaultState(props.initialControlParams);
        this.triggerSetImageParams();
    }

    componentDidMount() {
        this.restoreStateFn = (event:any) => this.restoreState(event.state);
        // @ts-ignore: I don't understand that error message.
        window.addEventListener('popstate', this.restoreStateFn);
    }

    componentWillUnmount() {
        // unbind the listener
        // @ts-ignore: I don't understand that error message.
        window.removeEventListener('popstate', this.restoreStateFn, false);
        this.restoreStateFn = null;
    }

    restoreState(state_to_restore: object) {
        if (state_to_restore === null) {
            this.setState(getDefaultState(this.props.initialControlParams));
            return;
        }

        this.setState(state_to_restore);
        this.triggerSetImageParams();
    }

    createIntegerControl(control_info: ControlInfo) {

        return <div>
            <Integer
                name={map_api_name(control_info.name)}
                // @ts-ignore: blah blah
                min={control_info.schema.minimum}
                // @ts-ignore: blah blah
                max={control_info.schema.maximum}
                // @ts-ignore: blah blah
                value={this.state.values[control_info.name]}
                // @ts-ignore: I don't understand that error message.
                updateFn={(newValue) => {
                    // @ts-ignore: I don't understand that error message.
                    this.setCurrentValue(control_info.name, newValue);
                }}
            />
        </div>
    }

    createNumberControl(control_info: ControlInfo) {

        // console.log("************");
        // console.log(this.state.values);
        // console.log(control_info);
        // console.log("************");

        return <div>
            <Number
                name={map_api_name(control_info.name)}
                // @ts-ignore: blah blah
                min={control_info.schema.minimum}
                // @ts-ignore: blah blah
                max={control_info.schema.maximum}
                // @ts-ignore: blah blah
                value={this.state.values[control_info.name]}
                // @ts-ignore: I don't understand that error message.
                updateFn={(newValue) => {
                    // @ts-ignore: I don't understand that error message.
                    this.setCurrentValue(control_info.name, newValue);
                }}
            />
        </div>
    }


    setActiveColor(active_color: string) {
        // console.log("Setting active color: " + active_color);
        this.setState({active_color: active_color})
    }

    // TODO - these var names
    setCurrentValue(active_color: string, new_color_string: string) {
        let current_values = this.state.values;
        current_values[active_color] = new_color_string;
        this.setState({values: current_values});
    }

    setColorFromPicker(color:RgbaColor) {
        if (this.state.active_color === null) {
            throw new Error("active_color is null, can't update color");
        }

        let new_color_string: string = `rgba(${color.r}, ${color.g}, ${color.b}, ${color.a})`;

        if (color.a === 1) {
            new_color_string= `rgb(${color.r}, ${color.g}, ${color.b})`;
        }
        this.setCurrentValue(this.state.active_color, new_color_string);
    }

    setMatrixCurrentValue(name: string, row_index: number, column_index: number, new_value: string ) {
        let current_values = this.state.values;

        let new_value_trimmed = new_value.trim()

        if (new_value_trimmed.length === 0) {
            new_value_trimmed = "0";
        }

        if (Array.isArray(current_values[name]) !== true) {
            debugger;
            throw new Error("Current value for " + name  + "is not an array");
        }
        let new_value_as_float = parseFloat(new_value_trimmed);

        if (isNaN(new_value_as_float) === true) {
            console.warn("Value [" + new_value + "] was NAN, changing to zero.");
            new_value_as_float = 0;
        }

        let new_value_to_use = "" + new_value_as_float;

        // when users are typing 0.5, they type '0', then '.', then '5'.
        // but '0.' is parsed to '0' by parseFloat(), so the decimal point can't
        // be entered...hack around it.
        if ((new_value_as_float + ".") === new_value_trimmed) {
            new_value_to_use = new_value_trimmed;
        }


        // @ts-ignore: yeah, I know
        current_values[name][row_index][column_index] = new_value_to_use;
        this.setState({values: current_values});
    }

    createColorControl(control_info: ControlInfo) {
        // @ts-ignore: blah blah blah
        const style = {
            width: "20px",
            margin: "2px",
            display: "inline-block",
            // @ts-ignore: blah blah blah
            "background-color": getNamedColorValue(this.state.values[control_info.name])
        }

        let color_picker = <span></span>;

        if (this.state.active_color === control_info.name) {
            // @ts-ignore: blah blah blah
            let actual_color = getNamedColorValue(this.state.values[control_info.name]);

            let color_array = colorValues(actual_color);

            let color_rgba: RgbaColor = {
                r: color_array.r,
                g: color_array.g,
                b: color_array.b,
                a: 1
            };

            // @ts-ignore: blah blah blah
            if (color_array.a !== undefined) {
                // @ts-ignore: blah blah blah
                color_rgba.a = color_array.a;
            }

            color_picker = <RgbaColorPicker
                color={color_array}
                onChange={(newColor => this.setColorFromPicker(newColor))} />
        }

        return <div>
            {map_api_name(control_info.name)}

            <span
                style="display: inline-block; border: 1px solid #000; padding: 0px;"
                // @ts-ignore: blah blah blah
                onclick={() => this.setActiveColor(control_info.name)}
            >
                <span style={style}>
                    &nbsp;
                </span>
            </span>

            <input type="text" class="inputValue" value={
                // @ts-ignore: blah blah blah
                this.state.values[control_info.name]
            }/>

            {color_picker}
        </div>;
    }

    createEnumControl(control_info: ControlInfo) {
        let options = makeOptionsFromEnum(control_info.schema.enum);
        let default_value = this.state.values[control_info.name] ?? control_info.schema.default;

        return <div>
            <ValueSelect
                name={map_api_name(control_info.name)}
                options={options}
                // @ts-ignore: blah blah blah
                default={default_value}
                updateFn={(newValue) => {
                    this.setCurrentValue(control_info.name, newValue);
                }}
            />
        </div>
    }

    createStringControl(control_info: ControlInfo) {
        if (control_info.schema.format === 'color') {
            return this.createColorControl(control_info);
        }

        if (control_info.schema.enum !== undefined) {
            return this.createEnumControl(control_info);
        }

        console.log("Don't know how to render ");
        console.log(control_info);

        return <div>I don't know how to render this string.</div>
    }

    createKernelMatrixControl(control_info: ControlInfo) {
        let values = this.state.values[control_info.name] ?? control_info.schema.default;

        let updateFn = (row_index: number, column_index: number, new_value:any) =>
            this.setMatrixCurrentValue(
                control_info.name,
                row_index,
                column_index,
                new_value,
            );


        return <div>
            <KernelMatrix
                name={map_api_name(control_info.name)}
                // @ts-ignore: TS2322
                values={values}
                // @ts-ignore: blah blah blah
                updateFn={updateFn}
            />
        </div>

    }

    createControl(index: number, control_info: ControlInfo) {
        if (control_info.schema.type === undefined) {
            throw Error("control_info.schema.type is undefined for " + control_info)
        }

        switch(control_info.schema.type) {
            case OpenApiType.boolean: {
                // console.log("make an boolean");
                return <span>this should be a boolean</span>;
            }

            case OpenApiType.integer: {
                return this.createIntegerControl(control_info);
            }

            case OpenApiType.number: {
                return this.createNumberControl(control_info);
            }

            case OpenApiType.string: {
                return this.createStringControl(control_info);
            }

            case OpenApiType.array: {
                if (control_info.schema.format === 'kernel_matrix') {
                    return this.createKernelMatrixControl(control_info)
                }
            }
        }

        //throw Error("Unknown control_info.schema.type is undefined for " + control_info.schema.type)

        return <li key={index}>A '{control_info.schema.type}' should be here.</li>
    }

    triggerSetImageParams() {
        this.setState({
            isProcessing: true
        });

        triggerEvent(EventType.set_image_params, this.state.values);
    }

    render(props: AppProps, state: AppState) {
        // let info_used =
        //     ((1 / this.state.channel_1_sample) ** 2) +
        //     ((1 / this.state.channel_2_sample) ** 2) +
        //     ((1 / this.state.channel_3_sample) ** 2);

        // let info_percent = ((100 * info_used) / 3);
        // let info_percent_string = info_percent.toFixed();
        let processingBlock = <button onClick={() => {
            this.triggerSetImageParams();
        }}>Update</button>;

        let controls = [];
        for (let i=0; i<props.controls.length; i+=1) {
            let control = this.createControl(i, props.controls[i]);
            controls.push(control);
        }

        let debugBlock = <span></span>
        // let debugBlock = <pre>
        //     <code>{JSON.stringify(this.state.values, null, 2)}</code>
        // </pre>

        let itemBlock = <div class='col-xs-12 contentPanel controlForm'>
            {controls}
            {processingBlock}
            {debugBlock}
        </div>;


//             <b>Channel 1, Channel 2, Channel 3</b> - how many pixels should be combined into 1 pixel, for each channel. e.g. if for the RGB colorspace, this would be red, green and blue.<br/>
//
// <b>Color space</b> which colorspace to process the image in.<br/>
//
//             <b>Image</b> - which image to use.<br/>
//         </div>;

        return <span>
            {itemBlock}
        </span>;
    }
}










