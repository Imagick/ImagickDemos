import * as React from "react";

import Select from "react-select";

export interface ValueSelectProps {
    name: string;
    options: Array<{ value: string, label: string }>;
}


export class ValueSelect extends React.Component<ValueSelectProps, {}> {
    render() {
        console.log(this.props.options);
        return <span>
            ValueSelect: {this.props.name}
            <Select options={this.props.options}
             defaultValue={this.props.options[0]}/>
        </span>;
    }
}