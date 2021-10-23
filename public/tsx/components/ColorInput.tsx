import { h, Component } from 'preact';
import {getNamedColorValue} from "../ImagickColors";
import {colorValues} from "../color_convert";
import {RgbaColor, RgbaColorPicker} from "react-colorful";
import {map_api_name} from "../ControlPanel";


export interface ColorInputProps {
    name: string;
    value: string;
    active: boolean;
}

export class ColorInput extends Component<ColorInputProps, {}> {

    handleChange(event) {
        // this.setState({value: event.target.value});
        console.log("Change happened " + event.target.value);
    }

    handleBlur() {
        console.log("Blur happened");
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

    render() {

        // return <span>
        //     {this.props.name}
        //
        // </span>;

        // @ts-ignore: blah blah blah
        const style = {
            width: "20px",
            margin: "2px",
            display: "inline-block",
            // @ts-ignore: blah blah blah
            "background-color": getNamedColorValue(this.props.value)
        }

        let color_picker = <span></span>;

        if (this.props.active) {
            // @ts-ignore: blah blah blah
            let actual_color = getNamedColorValue(this.props.value);
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
            {map_api_name(this.props.name)}

            <span
                style="display: inline-block; border: 1px solid #000; padding: 0px;"
                // @ts-ignore: blah blah blah
                //onclick={() => this.setActiveColor(control_info.name)}
            >
                <span style={style}>
                    &nbsp;
                </span>
            </span>

            <input type="text" class="inputValue" value={
                // @ts-ignore: blah blah blah
                this.props.value
            }/>

            {color_picker}
        </div>;
    }
}