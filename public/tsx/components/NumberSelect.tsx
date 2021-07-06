    import { h, Component } from 'preact';

// import Select from "react-select";
import {Select, SelectOption} from "./Select";

export interface NumberSelectProps {
    name: string;
    min: number;
    max: number;
    defaultValue?: SelectOption;
    default?: number;
    updateFn?(newValue:any): void;
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

export class NumberSelect extends Component<NumberSelectProps, {}> {
    render() {
        let options = makeOptions(this.props.min, this.props.max);

        let defaultValue = {
            label: "" + this.props.min,
            value: "" + this.props.min
        };
        if (this.props.defaultValue !== undefined) {
            defaultValue = this.props.defaultValue;
        }
        else if (this.props.default !== undefined) {
            defaultValue = {
                label: "" + this.props.default,
                value: "" + this.props.default
            };
        }

        // <input type="text" pattern="\d*" />
        // <input type="number" value={this.state.value} onChange={this.onChange}/>

        return <span>
            {this.props.name}
            <Select
                name={this.props.name}
                options={options}
                defaultValue={defaultValue}
                updateFn={this.props.updateFn}
            />
        </span>;
    }
}