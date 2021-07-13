import {h, Component} from "preact";
import {Integer} from "./components/Integer";
import {Number} from "./components/Number";
import {ValueSelect} from "./components/ValueSelect";
import {triggerEvent, EventType, registerEvent, unregisterEvent} from "./events";
import {SelectOption} from "./components/Select";

import {getNamedColorValue} from "./ImagickColors";
// import {HexColorPicker} from "react-colorful";
import {RgbaColorPicker, RgbaColor} from "react-colorful";
import {colorValues} from "./color_convert";
// import {RgbaColor} from "react-colorful/dist/types";

// https://swagger.io/specification/#example-object

enum OpenApiType {
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

function map_api_name(api_param_name: string): string {

    let known_map = {
        background_color: "Background color",
        black_point: "Black point",
        channel_1_sample: "Channel 1",
        channel_2_sample: "Channel 2",
        channel_3_sample: "Channel 3",
        colorspace: "Colorspace",
        endX: "End X",
        endY: "End Y",
        fill_color: "Fill color",
        fill_modified_color: "Fill color 2",
        first_term: "First term",
        fx_analyze_example: "FX Analyze example",
        kernel_render: "Kernel render",
        kernel_type: "Kernel type",
        paint_type: "Paint type",
        second_term: "Second term",
        startX: "Start X",
        startY: "Start Y",
        stroke_color: "Stroke color",
        text_under_color: "Text under color",
        third_term: "Third term",
        translate_x: "Translate X",
        translate_y: "Translate Y",
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

    createControl(index: number, control_info: ControlInfo) {
        if (control_info.schema.type === undefined) {
            throw Error("control_info.schema.type is undefined for " + control_info)
        }

        switch(control_info.schema.type) {
            case OpenApiType.boolean: {
                console.log("make an boolean");
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

        let debugBlock = <pre>
            <code>{JSON.stringify(this.state.values, null, 2)}</code>
        </pre>

        let itemBlock = <div class='col-xs-12 contentPanel controlForm'>
            {controls}
            {processingBlock}
            {debugBlock}
        </div>;

//         let block = <div class='col-xs-12 contentPanel controlForm' key={"old"}>
//             <NumberSelect
//                 name="Channel 1"
//                 min={1}
//                 max={20}
//                 default={this.state.channel_1_sample}
//                 updateFn={(channel_1_sample) => this.setState({channel_1_sample})}
//             />
//             <br/>
//
//             <NumberSelect
//                 name="Channel 2"
//                 min={1}
//                 max={20}
//                 default={this.state.channel_2_sample}
//                 updateFn={(channel_2_sample) => this.setState({channel_2_sample})}
//             />
//             <br/>
//
//             <NumberSelect
//                 name="Channel 3"
//                 min={1}
//                 max={20}
//                 default={this.state.channel_3_sample}
//                 updateFn={(channel_3_sample) => this.setState({channel_3_sample})}
//             />
//             <br/>
//             <ValueSelect
//                 name="Color space"
//                 options={color_space_options}
//                 default={this.state.colorspace}
//                 updateFn={(colorspace) => this.setState({colorspace})}
//             />
//             <br/>
//
//             <ValueSelect
//                 name="Image"
//                 options={image_path_options}
//                 default={'Lorikeet'}
//                 updateFn={(imagepath) => this.setState({imagepath})}
//             />
//             <br/>
//
//             Data size as % of original size: {info_percent_string}%
//             <br/>
//
//             {processingBlock}
//
//             <br/>
//
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










