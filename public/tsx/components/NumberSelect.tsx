import * as React from "react";

import Select from "react-select";

export interface NumberSelectProps {
    name: string;
    min: number;
    max: number
}

function makeOptions(min: number, max: number) {

    let options = [];

    for (let i=min; i <= max; i+=1) {
        options.push({
            value: '' + i,
            label: '' + i
        });
    }

    return options;
}


export class NumberSelect extends React.Component<NumberSelectProps, {}> {
    render() {
        let options = makeOptions(this.props.min, this.props.max);

        return <span>
            Selector: {this.props.name}
            <Select options={options}
                    defaultValue={{ label: "" + this.props.min , value: "" + this.props.min }} />
        </span>;
    }
}