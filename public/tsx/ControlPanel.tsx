import {h, Component} from "preact";
import {NumberSelect} from "./components/NumberSelect";
import {ValueSelect} from "./components/ValueSelect";

import {triggerEvent, EventType, registerEvent, unregisterEvent} from "./events";

export interface AppProps {
    name: string;
    initialControlParams: object;
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

    let default_state = {
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

    return default_state;
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

        return  <div class='col-xs-12 contentPanel controlForm'>
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
    }
}










