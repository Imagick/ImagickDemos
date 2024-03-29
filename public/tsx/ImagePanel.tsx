
import { h, Component } from "preact";
import { registerEvent, unregisterEvent, EventType } from "./events";

export interface ImageProps {
    pageBaseUrl: string;
    imageBaseUrl: string|null;
    fullPageRefresh: boolean|null;
    // Use the currently selected image as the original image url
    use_image_control_as_original_image: boolean;
    // Example has hard-coded original image, that is not part
    // of the controls
    original_image_url: string|null;
}

interface ImageState {
    imageParams: Object;
    showing_original: boolean;
}

// Help wanted - make there be fewer ts-ignores...
function createQueryString(params:Object): string {
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
        window.history.pushState(
            params, // This needs to be restored on state pop?
            '', // Leave blank, as unused.
            full_page_url
        );
    };

    componentWillMount() {
        // console.log("componentWillMount");
    }

    componentDidMount() {
        registerEvent(EventType.set_image_params, 'ImagePanel',  this.setImageParams);
    }

    componentWillUnmount() {
        unregisterEvent(EventType.set_image_params, 'ImagePanel');
        // need to register popstate
    }

    mouseOver() {
        if (this.hasOriginalImage() !== true) {
            return;
        }

        this.setState({showing_original: true});
    }
    mouseOut() {
        if (this.hasOriginalImage() !== true) {
            return;
        }
        this.setState({showing_original: false});
    }

    hasOriginalImage(): boolean {
        if (this.props.use_image_control_as_original_image === true) {
            return true;
        }
        if (this.props.original_image_url !== null) {
            return true;
        }

        return false;
    }

    getOriginalImagePath() {

        let params = this.state.imageParams;

        if (this.props.original_image_url !== null) {
            return this.props.original_image_url;
        }

        // @ts-ignore: image_path
        if (params.image_path === undefined) {
            console.log("control data doesn't contain image_path, can't get original path.");
            return;
        }

        let knownPaths = {
            'Skyline': "/images/Skyline_400.jpg",
            'Lorikeet': "/images/Biter_500.jpg",
            'People': "/images/SydneyPeople_400.jpg",
            'Low contrast': "/images/LowContrast.jpg",
            'Logo': "/images/logo.png",
        };

        // @ts-ignore: image_path
        if (knownPaths[params.image_path] === undefined) {
            // @ts-ignore: image_path
            console.log(`image_path ${params.image_path}, isn't listed, can't get original image url.`);
            return;
        }

        // @ts-ignore: image_path
        return knownPaths[params.image_path];
    }

    render(props: ImageProps, state: ImageState) {

        let imageParams = state.imageParams;

        let date = new Date();
        // @ts-ignore: yes, we're setting it.
        imageParams.time = date.getTime();

        let queryString:string = createQueryString(imageParams);
        if (props.imageBaseUrl === null) {
            return <span></span>;
        }

        let img_url = props.imageBaseUrl + "?" + queryString;

        // if (this.props.fullPageRefresh === true) {
        //     return <span></span>;
        // }

        let original_image_text = "";
        let view_modified = <span></span>;

        if (this.hasOriginalImage() === true) {
            if (this.state.showing_original === true) {
                original_image_text = "Touch/mouse out to see modified ";
            }
            else {
                original_image_text = "Touch/mouse over to see original ";
            }

            view_modified = <a href={img_url} target="_blank">View modified in new window.</a>
        }

         if (this.state.showing_original === true) {
             img_url = this.getOriginalImagePath();
         }

        // @ts-ignore: TS2322
        return <span onmouseover={() => this.mouseOver()} onmouseout={() => this.mouseOut()}>
            <img src={img_url} class="img-responsive exampleImage imageStatus" />
            <div class="original_instructions">
              {original_image_text}
              <br/>
              {view_modified}
            </div>
        </span>;
    }
}