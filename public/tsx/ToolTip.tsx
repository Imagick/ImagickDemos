
import { h, Component } from 'preact';

export interface ToolTipProps {
    description: string;
    // name: string;
    // value: string;
    // checked?: boolean;
    // updateFn?(checked:any): void;

    min: number|undefined;
    max: number|undefined;
}

interface ToolTipState {
    hover: boolean;
    // controls: Controls; // TODO - move to props.
    // values: Values;
    // active_color: string|null; // the color being edited.
}


export class ToolTip extends Component<ToolTipProps, ToolTipState> {

    handleMouseIn() {
        this.setState({ hover: true })
    }

    handleMouseOut() {
        this.setState({ hover: false })
    }
    render() {
        const tooltipStyle = {
            display: this.state.hover ? 'block' : 'none'
        }

        let lines = [];
        if (this.props.min != undefined) {
            lines.push("Minimum: " + this.props.min);
        }
        if (this.props.max != undefined) {
            lines.push("Maximum: " + this.props.max);
        }
        let content = lines.map((string:string) =>
            <div>{string}</div>
        );

        return (
            <span class="tooltip">
                <span
                  onMouseOver={this.handleMouseIn.bind(this)}
                  onMouseOut={this.handleMouseOut.bind(this)}>
                    <img
                      src="/images/icons/information-help-svgrepo-com.svg"
                      width="16"
                      height="16"
                      alt="info" />
                </span>
                <div class="tooltip_text" style={tooltipStyle}>
                     {content}
                </div>
            </span>
        );
    }
}

