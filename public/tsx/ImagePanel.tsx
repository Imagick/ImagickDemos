
import { h, Component } from "preact";
import { registerEvent, unregisterEvent, EventType } from "./events";

export interface ImageProps {
   pageBaseUrl: string;
   imageBaseUrl: string;
   fullPageRefresh: boolean|null;
   original_image_url: string|null;
}

interface ImageState {
    imageParams: Object;
    showing_original: boolean;
}

// Help wanted - make there be fewer ts-ignores...
function createQueryString(params:Object): string {
    //debugger;
    let queryString = Object.keys(params).map((key) => {
        // @ts-ignore: TS2322
        let parts = [];
        // @ts-ignore: TS2322
        if(Array.isArray(params[key])) {
            // @ts-ignore: TS2322
            for (let i = 0; i < params[key].length; i++) {
                // @ts-ignore: TS2322
                if (Array.isArray(params[key][i])) {
                    // @ts-ignore: TS2322
                    parts.push("[" + params[key][i].join(",") + "]")
                }
            }

            // TODO - values are all floats, or uriencode them
            // @ts-ignore: TS2322
            // return encodeURIComponent(key) + '=' + "[" + params[key].join(',') + "]";
            return encodeURIComponent(key) + '=' + "[" + parts.join(',') + "]";
        }

        // @ts-ignore: TS2322
        if (params[key] === null) {
            // @ts-ignore: TS2322
            return encodeURIComponent(key) + '=';
        }

        // @ts-ignore: TS2322
        return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
    }).join('&');

    return queryString;
}

export class ImagePanel extends Component<ImageProps, ImageState> {

    constructor(props: ImageProps, state: any) {
        super(props);

        this.state = {
            imageParams: {},
            showing_original: false
        };
    }

    setImageParams = (params:any) => {
        this.setState({
            imageParams: params
        });

        // Don't include the time in the page params.
        // It is only part of the image params to cache bust.
        delete params.time;

        let full_page_url: string = this.props.pageBaseUrl + "?" + createQueryString(params);
        if (this.props.fullPageRefresh === true) {
            let current: string = window.location.href;

            if (current.indexOf(full_page_url) === -1) {
                window.location.href = full_page_url;
            }
            return;
        }


        // // console.log("history is disabled until controls are working.");
        // window.history.pushState(
        //     params, // This needs to be restored on state pop?
        //     '', // Leave blank, as unused.
        //     full_page_url
        // );
    };

    componentWillMount() {
        console.log("componentWillMount")
    }

    componentDidMount() {
        registerEvent(EventType.set_image_params, 'ImagePanel',  this.setImageParams);
    }

    componentWillUnmount() {
        unregisterEvent(EventType.set_image_params, 'ImagePanel');

        // need to register popstate
    }

    mouseOver() {
        console.log("mouse over");
        this.setState({showing_original: true});
    }
    mouseOut() {
        console.log("mouse out");
        this.setState({showing_original: false});
    }

    render(props: ImageProps, state: ImageState) {

        let imageParams = state.imageParams;

        let date = new Date();
        // @ts-ignore: yes, we're setting it.
        imageParams.time = date.getTime();

        let queryString:string = createQueryString(imageParams);
        let img_url = props.imageBaseUrl + "?" + queryString;

        // console.log("Full url is " + fullUrl);
        // <!-- fullUrl is {fullUrl} -->

        if (this.props.fullPageRefresh === true) {
            return <span></span>;
        }

        let original_image_text = "";

        if (this.props.original_image_url !== null) {
            if (this.state.showing_original === true) {
                original_image_text = "Touch/mouse out to see modified";
            }
            else {
                original_image_text = "Touch/mouse over to see original";
            }
        }

        if (this.state.showing_original === true) {
            img_url = this.props.original_image_url;
        }

        // @ts-ignore: TS2322
        return <span onmouseover={() => this.mouseOver()} onmouseout={() => this.mouseOut()}>
            <img src={img_url} class="img-responsive exampleImage imageStatus" />
            {original_image_text}
        </span>;
    }
}