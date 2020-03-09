import { h, Component } from 'preact';

export interface SelectOption {
    value: string;
    label: string;
}


export interface SelectProps {
    name: string;
    defaultValue?: SelectOption;
    default?: string;
    options: Array<SelectOption>;
    updateFn?(newValue:any): void;
}

function optionFn(selectOption: SelectOption) {
    return <option value={selectOption.value}>{selectOption.label}</option>;
}


function getOptionMapFn(defaultValue:SelectOption) {

    return (selectOption: SelectOption) => {
        let selected = false;
        if (selectOption.value === defaultValue.value) {
            selected = true;
        }
        return <option value={selectOption.value} selected={selected}>{selectOption.label}</option>;
    }
}

function nothing() {
}

function updateFnWrapper(event:any, updateFn:any) {
    let index = event.target.selectedIndex;
    let option = event.target.options[index];
    let value = option.value;

    updateFn(value);
}

export class Select extends Component<SelectProps, {}> {
    render() {
        let updateFn = this.props.updateFn || nothing;
        let optionFn = getOptionMapFn(this.props.defaultValue);

        return <select onChange={(event) => updateFnWrapper(event, updateFn)}>
            {this.props.options.map(optionFn)}
        </select>;
    }
}