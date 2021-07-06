    import { h, Component } from 'preact';


export interface NumberProps {
    name: string;
    min: number;
    max: number;
    default?: number;
    updateFn?(newValue:any): void;
}

export class Number extends Component<NumberProps, {}> {
    render() {

        // <input type="text" pattern="\d*" />
        // <input type="number" value={this.state.value} onChange={this.onChange}/>

        return <span>
            {this.props.name}
            <input
                type="number" step="1"
                name={this.props.name}
                value={this.props.default}
                // @ts-ignore: blah blah
                updateFn={this.props.updateFn}
            />
        </span>;
    }
}