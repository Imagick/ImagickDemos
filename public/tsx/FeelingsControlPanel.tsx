import {h, Component} from "preact";
import {SliderRange} from "./components/SliderRange";

import {triggerEvent, EventType, registerEvent, unregisterEvent} from "./events";

export interface AppProps {
    name: string;
    initialControlParams: object;
}

type CallbackFunction = (event: any) => void;

export interface FeelingsState {
    emotional_intensity: number;
    goodwill: number;
    phrasing: number;
    openess: number;
}

function getDefaultState(initialControlParams: object): FeelingsState {

    return {
        // @ts-ignore: blah blah
        emotional_intensity: initialControlParams.emotional_intensity || 0.5,
        // @ts-ignore: blah blah
        goodwill: initialControlParams.goodwill || 0.5,
        // @ts-ignore: blah blah
        phrasing: initialControlParams.phrasing || 0,
        // @ts-ignore: blah blah
        openess: initialControlParams.openess || 0,
    };
}

function updateFnWrapper(updateFn:any) {

    return (event:any) => {
        if (updateFn === undefined) {
            return;
        }

        try {
            updateFn(event.currentTarget.value);
        } catch (error) {
            debugger;
        }
    }
}

export class FeelingsControlPanel extends Component<AppProps, FeelingsState> {

    restoreStateFn: Function;

    constructor(props: AppProps) {
        super(props);
        this.state = getDefaultState(props.initialControlParams);
        this.triggerSetFeelingsParams();
    }

    componentDidUpdate() {
        this.triggerSetFeelingsParams();
    }

    restoreState(state_to_restore: object) {
        if (state_to_restore === null) {
            this.setState(getDefaultState(this.props.initialControlParams));
            return;
        }

        this.setState(state_to_restore);
        this.triggerSetFeelingsParams();
    }

    triggerSetFeelingsParams() {
        let params = {
            emotional_intensity:this.state.emotional_intensity,
            goodwill: this.state.goodwill,
            phrasing: this.state.phrasing,
            openess: this.state.openess
        };

        triggerEvent(EventType.set_feelings_params, params);
    }


    render(props: AppProps, state: FeelingsState) {

        return <div class='col-xs-12 contentPanel controlForm'>
            emotional_intensity:
            <input
                type="number"
                value={this.state.emotional_intensity}
                min="0"
                max="1"
                step=".05"
                // @ts-ignore: blah blah
                onChange={updateFnWrapper((emotional_intensity) => this.setState({emotional_intensity}))}
            /><br/>

            {/*goodwill:*/}
            {/*<input*/}
            {/*    type="number"*/}
            {/*    value={this.state.goodwill}*/}
            {/*    min="-1"*/}
            {/*    max="1"*/}
            {/*    step=".05"*/}
            {/*    // @ts-ignore: blah blah*/}
            {/*    onChange={updateFnWrapper((goodwill) => this.setState({goodwill}))}*/}
            {/*/><br/>*/}

            {/*phrasing:*/}
            {/*<input*/}
            {/*    type="number"*/}
            {/*    value={this.state.phrasing}*/}
            {/*    min="-1"*/}
            {/*    max="1"*/}
            {/*    step=".05"*/}
            {/*    // @ts-ignore: blah blah*/}
            {/*    onChange={updateFnWrapper((phrasing) => this.setState({phrasing}))}*/}
            {/*/><br/>*/}

            Openess to others:
            <input
                type="number"
                value={this.state.openess}
                min="-1"
                max="1"
                step=".05"
                // @ts-ignore: blah blah
                onChange={updateFnWrapper((openess) => this.setState({openess}))}
            /><br/>

            Needs righteousness...

        </div>;
    }
}










