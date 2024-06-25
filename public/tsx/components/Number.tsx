    import { h, Component } from 'preact';


export interface NumberProps {
    name: string;
    min: number;
    max: number;
    value: number|string;
    updateFn?(newValue:any): void;
}

export class Number extends Component<NumberProps, {}> {

    updateBlurValue(value:string|number) {

        // if a user enters a string which is not a valid number
        // we force the value to be a floating point number
        if (typeof value === "string") {
            value = parseFloat(value);
        }

        // Force number to be zero instead of NaN.
        if (isNaN(value) === true) {
            value = 0;
        }

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

    // This function only checks the bounds. It does not alter the value
    // as trying to do that while the user is still typing, leads to
    // annoying behaviour, as the cursor changes position.
    updateValue(value:string|number) {
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
                // @ts-ignore: It would be nice to validate the value is
                // in the correct range on every input. but for now, only
                // validate when focus is lost, to prevent weird interactions
                // between the users' keypresses and the validate code.
                oninput={(event) => this.updateValue(event.target.value) }
              // @ts-ignore: blah blah
                onBlur={(event) => this.updateBlurValue(event.target.value) }
            />
        </span>;
    }
}