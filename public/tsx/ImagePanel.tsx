
import { h, Component } from "preact";
import { registerEvent, unregisterEvent, EventType } from "./events";

export interface ImageProps {
   pageBaseUrl: string;
   imageBaseUrl: string;
}

interface ImageState {
    imageParams: Object;
}

function createQueryString(params:Object): string {
    let queryString = Object.keys(params).map((key) => {
        // @ts-ignore: TS2322
        return encodeURIComponent(key) + '=' + encodeURIComponent(params[key])
    }).join('&');

    return queryString;
}

export class ImagePanel extends Component<ImageProps, ImageState> {
    constructor(props: ImageProps, state: any) {
        super(props);

        this.state = {
            imageParams: {}
        };
    }

    setImageParams = (params:any) => {
        this.setState({
            imageParams: params
        });

        // Don't include the time in the page params.
        // It is only part of the image params to cache bust.
        delete params.time;

        let full_page_url = this.props.pageBaseUrl + "?" + createQueryString(params);
        console.log("history is disabled until controls are working.");
        window.history.pushState(
            params, // This needs to be restored on state pop?
            '', // Leave blank, as unused.
            full_page_url
        );
    };

    componentWillMount() {
    }

    componentDidMount() {
        registerEvent(EventType.set_image_params, 'ImagePanel',  this.setImageParams);
    }

    componentWillUnmount() {
        unregisterEvent(EventType.set_image_params, 'ImagePanel');

        // need to register popstate
    }

    render(props: ImageProps, state: ImageState) {

        let imageParams = state.imageParams;

        let date = new Date();
        // @ts-ignore: yes, we're setting it.
        imageParams.time = date.getTime();

        let queryString:string = createQueryString(imageParams);
        let fullUrl = props.imageBaseUrl + "?" + queryString;

        // console.log("Full url is " + fullUrl);
        // <!-- fullUrl is {fullUrl} -->

        // @ts-ignore: TS2322
        return <span>
            <img src={fullUrl} class="img-responsive exampleImage imageStatus" />
        </span>;
    }
}