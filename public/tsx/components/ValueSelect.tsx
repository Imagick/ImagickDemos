import { h, Component } from 'preact';
import {Select, SelectProps} from "./Select";

export class ValueSelect extends Component<SelectProps, {}> {
    render() {
        let defaultValue = this.props.options[0];

        if (this.props.defaultValue !== undefined) {
            defaultValue = this.props.defaultValue;
        }
        else if (this.props.default !== undefined) {
            defaultValue = {
                label: "" + this.props.default,
                value: "" + this.props.default
            };
        }

        return <span>
            {this.props.name}
            <Select
                name={this.props.name}
                options={this.props.options}
                defaultValue={defaultValue}
                updateFn={this.props.updateFn}
            />
        </span>;
    }
}