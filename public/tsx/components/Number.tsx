    import { h, Component } from 'preact';


export interface NumberProps {
    name: string;
    min: number;
    max: number;
    value: number|string;
    updateFn?(newValue:any): void;
}

export class Number extends Component<NumberProps, {}> {

    updateValue(value:string|number ) {
        if (this.props.min !== undefined) {
            if (value < this.props.min) {
                value = this.props.min;
            }
        }
        if (this.props.max !== undefined) {
            if (value > this.props.max) {
                value = this.props.max;
            }
        }

        this.props.updateFn(value);
    }

    render() {
        return <span>
            {this.props.name}
            <input
                type="number" step="1"
                name={this.props.name}
                value={this.props.value}
                // @ts-ignore: blah blah
                onchange={(event) => this.updateValue(event.target.value) }
            />
        </span>;
    }
}