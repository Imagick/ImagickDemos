import { h, Component } from 'preact';

export interface CheckBoxProps {
    description: string;
    name: string;
    value: string;
    checked?: boolean;
    updateFn?(checked:any): void;
}


function updateFnWrapper(event:any, updateFn:any) {
    if (updateFn === undefined) {
        return;
    }

    updateFn(event.currentTarget.checked);
}

export class CheckBox extends Component<CheckBoxProps, {}> {
    render() {
        // let options = makeOptions(this.props.min, this.props.max);
        //
        // let defaultValue = {
        //     label: "" + this.props.min,
        //     value: "" + this.props.min
        // };
        // if (this.props.defaultValue !== undefined) {
        //     defaultValue = this.props.defaultValue;
        // }
        // else if (this.props.default !== undefined) {
        //     defaultValue = {
        //         label: "" + this.props.default,
        //         value: "" + this.props.default
        //     };
        // }

        // {this.props.options.map(optionFn)}

        return <span>
            {this.props.description}:
            <input
                type="checkbox"
                onChange={(event) => updateFnWrapper(event, this.props.updateFn)}
                name="John">
            </input>
        </span>
    }
}