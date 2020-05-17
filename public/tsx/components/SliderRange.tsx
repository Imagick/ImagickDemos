import { h, Component } from 'preact';

export interface SliderRangeProps {
    name: string;
    default: number;
    currentValue: number;
    updateFn?(newValue:any): void;
}

function updateFnWrapper(event:any, updateFn:any) {
    if (updateFn === undefined) {
        return;
    }

    try {
        updateFn(event.currentTarget.value);
    }
    catch (error) {
        debugger;
    }
}

export class SliderRange extends Component<SliderRangeProps, {}> {
    render() {
        return <span>
            {this.props.name}
            <span>
            <input
                type="range"
                min="-1"
                max="1"
                step="0.05"
                value={this.props.currentValue}
                onInput={(event) => updateFnWrapper(event, this.props.updateFn)}
            />

            </span>

            {this.props.currentValue}

        </span>;
    }
}