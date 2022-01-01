    import { h, Component } from 'preact';


export interface TextInputProps {
    name: string;

    maxLength: number|undefined;
    value: number|string;
    updateFn?(newValue:any): void;
}

export class TextInput extends Component<TextInputProps, {}> {

    updateValue(value:string ) {
        let new_string = value;
        if (this.props.maxLength !== undefined) {
            new_string = value.slice(0, this.props.maxLength);
        }

        this.props.updateFn(new_string);
    }

    render() {
        return <span>
            {this.props.name}
            <input
                type="text"
                name={this.props.name}
                value={this.props.value}
                // @ts-ignore: blah blah
                onchange={(event) => this.updateValue(event.target.value) }
            />
        </span>;
    }
}