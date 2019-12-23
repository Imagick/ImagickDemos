import * as React from "react";

import Select from "react-select";
import {NumberSelect} from "./NumberSelect";
import {ValueSelect} from "./ValueSelect";


export interface HelloWorldProps {
    firstName: string;
    lastName: string;
}


const color_space_options = [
    {label: "HSL", value: "HSL"},
    {label: "RGB", value: "RGB"},
    {label: "LAB", value: "LAB"},
];


export class HelloWorld extends React.Component<HelloWorldProps, {}> {
    render() {
        return <span>

            <ValueSelect name="Color space" options={color_space_options} />
            <NumberSelect name="Red" min={1} max={20} />
            <NumberSelect name="Green" min={1} max={20} />
            <NumberSelect name="Blue" min={1} max={20} />
        </span>;
    }
}