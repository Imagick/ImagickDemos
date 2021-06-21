import {h, Component} from "preact";
import {NumberSelect} from "./components/NumberSelect";
import {ValueSelect} from "./components/ValueSelect";

import {triggerEvent, EventType, registerEvent, unregisterEvent} from "./events";
import {SelectOption} from "./components/Select";

export interface AppProps {
    name: string;
    initialControlParams: object;
    controls: Array<object>;
}

type CallbackFunction = (event: any) => void;

interface AppState {
    colorspace: string;
    channel_1_sample: number;
    channel_2_sample: number;
    channel_3_sample: number;
    isProcessing: boolean;
    imagepath: string;
}

const color_space_options = [
    {label: "RGB", value: "RGB"},
    {label: "YIC", value: "YIC"},
    {label: "YUV", value: "YUV"},
    {label: "SRGB", value: "SRGB"},
    {label: "HSB", value: "HSB"},
    {label: "HSL", value: "HSL"},
    {label: "CMY", value: "CMY"},
];

const image_path_options = [
    {label: 'Skyline', value: 'Skyline'},
    {label: 'Lorikeet', value: 'Lorikeet'},
    {label: 'People', value: 'People'},
    {label: 'Low contrast', value: 'Low contrast'},
];

function getDefaultState(initialControlParams: object): AppState {

    return {
        // @ts-ignore: blah blah
        colorspace: initialControlParams.colorspace || "RGB",
        // @ts-ignore: blah blah
        channel_1_sample: initialControlParams.channel_1_sample || 4,
        // @ts-ignore: blah blah
        channel_2_sample: initialControlParams.channel_2_sample || 4,
        // @ts-ignore: blah blah
        channel_3_sample: initialControlParams.channel_3_sample || 16,
        // @ts-ignore: blah blah
        imagepath: initialControlParams.imagepath || 'Lorikeet',
        // @ts-ignore: blah blah
        isProcessing: false
    };
}


function map_api_name(api_param_name: string): string {

    let known_map = {
        channel_1_sample: "Channel 1",
        channel_2_sample: "Channel 2",
        channel_3_sample: "Channel 3",
        colorspace: "Colorspace",
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


    createControl(index: number, control_info: any) {
        if (control_info.schema.type === undefined) {
            throw Error("control_info.schema.type is undefined for " + control_info)
        }

        switch(control_info.schema.type) {

            case "boolean": {
                // console.log("make an boolean");
                return <span></span>;
            }

            case "integer": {
                return <div>
                    <NumberSelect
                        name={map_api_name(control_info.name)}
                        min={control_info.schema.minimum}
                        max={control_info.schema.maximum}
                        default={control_info.schema.default}
                        // @ts-ignore: I don't understand that error message.
                        updateFn={(newValue) => {
                            // @ts-ignore: I don't understand that error message.
                            let obj = {};
                            // @ts-ignore: I don't understand that error message.
                            obj[control_info.name] = newValue;
                            // @ts-ignore: I don't understand that error message.
                            this.setState(obj);
                        }}
                    />
                </div>
            }

            case "string": {
                let options = makeOptionsFromEnum(control_info.schema.enum);

                return <div>
                    <ValueSelect
                    name={map_api_name(control_info.name)}
                    options={options}
                    default={control_info.schema.default}
                    updateFn={(newValue) => {
                        // @ts-ignore: I don't understand that error message.
                        let obj = {};
                        // @ts-ignore: I don't understand that error message.
                        obj[control_info.name] = newValue;
                        // @ts-ignore: I don't understand that error message.
                        this.setState(obj);
                    }}
                />
                </div>
            }

            default: {
                throw Error("Unknown control_info.schema.type is undefined for " + control_info.schema.type)
            }
        }

        return <li key={index}>A '{control_info.schema.type}' should be here.</li>
    }

    triggerSetImageParams() {
        this.setState({
            isProcessing: true
        });

        let params = {
            colorspace:this.state.colorspace,
            channel_1_sample: this.state.channel_1_sample,
            channel_2_sample: this.state.channel_2_sample,
            channel_3_sample: this.state.channel_3_sample,
            imagepath: this.state.imagepath
        };

        // console.log("params are: ");
        // console.log(params);

        triggerEvent(EventType.set_image_params, params);
    }

    render(props: AppProps, state: AppState) {
        let info_used =
            ((1 / this.state.channel_1_sample) ** 2) +
            ((1 / this.state.channel_2_sample) ** 2) +
            ((1 / this.state.channel_3_sample) ** 2);

        let info_percent = ((100 * info_used) / 3);
        let info_percent_string = info_percent.toFixed();
        let processingBlock = <button onClick={() => this.triggerSetImageParams()}>Update</button>;

        let controls = [];
        for (let i=0; i<props.controls.length; i+=1) {
            let control = this.createControl(i, props.controls[i]);
            controls.push(control);
        }

        let itemBlock = <div class='col-xs-12 contentPanel controlForm'>
            {controls}
            {processingBlock}
        </div>;

        let block = <div class='col-xs-12 contentPanel controlForm' key={"old"}>
            <NumberSelect
                name="Channel 1"
                min={1}
                max={20}
                default={this.state.channel_1_sample}
                updateFn={(channel_1_sample) => this.setState({channel_1_sample})}
            />
            <br/>

            <NumberSelect
                name="Channel 2"
                min={1}
                max={20}
                default={this.state.channel_2_sample}
                updateFn={(channel_2_sample) => this.setState({channel_2_sample})}
            />
            <br/>

            <NumberSelect
                name="Channel 3"
                min={1}
                max={20}
                default={this.state.channel_3_sample}
                updateFn={(channel_3_sample) => this.setState({channel_3_sample})}
            />
            <br/>
            <ValueSelect
                name="Color space"
                options={color_space_options}
                default={this.state.colorspace}
                updateFn={(colorspace) => this.setState({colorspace})}
            />
            <br/>

            <ValueSelect
                name="Image"
                options={image_path_options}
                default={'Lorikeet'}
                updateFn={(imagepath) => this.setState({imagepath})}
            />
            <br/>

            Data size as % of original size: {info_percent_string}%
            <br/>

            {processingBlock}

            <br/>

            <b>Channel 1, Channel 2, Channel 3</b> - how many pixels should be combined into 1 pixel, for each channel. e.g. if for the RGB colorspace, this would be red, green and blue.<br/>

<b>Color space</b> which colorspace to process the image in.<br/>

            <b>Image</b> - which image to use.<br/>
        </div>;

        return <span>
            {itemBlock}
        </span>;
    }
}










