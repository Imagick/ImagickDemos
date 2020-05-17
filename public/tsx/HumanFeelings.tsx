import {h, Component} from "preact";
import {NumberSelect} from "./components/NumberSelect";
import {ValueSelect} from "./components/ValueSelect";

import {triggerEvent, EventType, registerEvent, unregisterEvent} from "./events";

import {FeelingsState} from "./FeelingsControlPanel";

export interface FeelingsProps {

}

interface x_y_point {
    x: number;
    y: number;
}

export class HumanFeelingsPanel extends Component<FeelingsProps, FeelingsState> {

    bottom_left_x = 100;
    bottom_left_y = 750;

    top_right_x = 1100;
    top_right_y = 50;

    constructor(props: FeelingsProps) {
        super(props);
        this.setState({
            emotional_intensity: 0,
            goodwill: 0,
            phrasing: 0,
            openess: 0
        });
    }

    setFeelingsParams = (params:any) => {
        // @ts-ignore: blah blah
        this.setState(
            params
            // @ts-ignore: blah blah
            // {feelingsParams: params}
        );

        // debugger;

        // // Don't include the time in the page params.
        // // It is only part of the image params to cache bust.
        // delete params.time;
        //
        // let full_page_url = this.props.pageBaseUrl + "?" + createQueryString(params);
        // window.history.pushState(
        //     params, // This needs to be restored on state pop?
        //     '', // Leave blank, as unused.
        //     full_page_url
        // );
    };

    componentWillMount() {
    }

    componentDidMount() {
        registerEvent(
            EventType.set_feelings_params,
            'FeelingsPanel',
            this.setFeelingsParams
        );
    }

    componentWillUnmount() {
        unregisterEvent(EventType.set_feelings_params, 'FeelingsPanel');
    }

    // Nice graph tool https://www.desmos.com/calculator
    // f(x) = L / (1 + e^(-k.x)

    calculatePoint(i:number, max:number, strength:number):x_y_point {

        let width = this.top_right_x - this.bottom_left_x;
        // @ts-ignore: blah blah
        let fraction_i = 5 * ((2 * i / max) - 1 + parseFloat(this.state.openess));

        // https://en.wikipedia.org/wiki/Generalised_logistic_function

        let C = 1;
        let Q = 1;

        let max_intensity = 500;
        let scaled_intensity = max_intensity * this.state.emotional_intensity;
        let intensity = 1 - (scaled_intensity / (scaled_intensity - max_intensity - 5 ));

        let Bt = intensity * fraction_i;
        let one_over_v = 1;
        let lower = C + Q * Math.exp(-Bt);
        let yt = this.bottom_left_y + (this.top_right_y - (this.bottom_left_y)) / Math.pow(lower, one_over_v);

        return {
            x: (width * i / max) + this.bottom_left_x,
            y: yt
        };
    }

    render(props: FeelingsProps, state: FeelingsState) {

        let points:x_y_point = this.calculatePoint(0, 100, this.state.emotional_intensity);
        let path_string = `M${points.x},${points.y} `;

        for (let i=1; i<=100 ; i+=1) {
            let points:x_y_point = this.calculatePoint(i, 100, this.state.emotional_intensity);
            path_string += `L ${points.x} ${points.y}`;
        }

        return <div>

      <svg xmlns='http://www.w3.org/2000/svg' width='600' height='600'  viewBox='0 0 1200 1200'>

            <text x='100' y='450' text-anchor='start' fill='black' font-size='2.5em'>Bad intent</text>
            <text x='1100' y='450' text-anchor='end' fill='black' font-size='2.5em'>Good intent</text>

            <text x='475' y='75' text-anchor='end' fill='black' font-size='2.5em'>Feels good</text>
            <text x='475' y='750' text-anchor='end' fill='black' font-size='2.5em'>Feels bad</text>

            <line x1='100' y1='400' x2='1100' y2='400' style='stroke:rgb(0,0,0);stroke-width:2' stroke-linecap='butt' />
            <line x1='600' y1='750' x2='600' y2='50' style = 'stroke:rgb(0,0,0);stroke-width:2' stroke-linecap='butt' />

            <path d={path_string} style='stroke:rgb(64,64,192);stroke-width:4; fill: none' stroke-linecap='butt' />
        </svg>
        </div>;
    }
}










