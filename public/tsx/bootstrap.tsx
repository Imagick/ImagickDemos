import { h, render } from "preact";
import { ControlPanel } from "./ControlPanel";
import { FeelingsControlPanel } from "./FeelingsControlPanel";
import { ImagePanel, ImageProps } from "./ImagePanel";
import { NavigationPanel, NavigationProps } from "./NavigationPanel";
import {FeelingsProps, HumanFeelingsPanel} from "./HumanFeelings";
import {startEventProcessing} from "./events";
import Dropdown from 'react-dropdown';

function setupControlPanel() {
    let controlPanelElement = document.getElementById("controlPanel");

    if (controlPanelElement === null) {
        console.warn('controlPanel not present.');
        return;
    }

    let params = {};
    if (controlPanelElement.dataset.hasOwnProperty("params_json") === true) {
        let json = controlPanelElement.dataset.params_json;
        params = JSON.parse(json);
    }
    else {
        console.error("params_json not set, cannot create react controls");
        return;
    }

    let controls = {};
    if (controlPanelElement.dataset.hasOwnProperty("controls_json") === true) {
        let json = controlPanelElement.dataset.controls_json;
        controls = JSON.parse(json);
    }
    else {
        console.error("controls_json not set, cannot create react controls");
        return;
    }

    let controlProps = {
        name: "cool working",
        initialControlParams: params,
        controls: controls
    };

    // @ts-ignore: blah blah
    render(
        // @ts-ignore: blah blah
        <ControlPanel {...controlProps} />,
        // @ts-ignore: blah blah
        document.getElementById("controlPanel")
    );
}

function setupHumanFeelings() {
    let element = document.getElementById("human_feelings");
    if (element === null) {
        // console.warn('human_feelings not present.');
        return;
    }

    let params:FeelingsProps = {
    };

    render(<HumanFeelingsPanel {...params} />, element);
}


function setupHumanFeelingsControlPanel()
{
    let controlPanelElement = document.getElementById("feelingsControls");

    if (controlPanelElement === null) {
        // console.warn('feelingsControls not present.');
        return;
    }

    let control_params = {};
    if (controlPanelElement.dataset.hasOwnProperty("params_json") === true) {
        let json = controlPanelElement.dataset.params_json;
        control_params = JSON.parse(json);
    }

    let controlProps = {
        name: "cool working",
        initialControlParams: control_params
    };

    render(
        <FeelingsControlPanel {...controlProps} />,
        controlPanelElement
    );
}

function setupImagePanel() {
    let element = document.getElementById("imagePanel");
    if (element === null) {
        console.warn('imagePanel not present.');
        return;
    }

    let imagebaseurl = null;
    if (element.dataset.hasOwnProperty("imagebaseurl") === true) {
        imagebaseurl = element.dataset.imagebaseurl;
    }

    let use_image_control_as_original_image = false;
    if (element.dataset.hasOwnProperty("use_image_control_as_original_image") === true) {
        let use_image_control_as_original_image_string = element.dataset.use_image_control_as_original_image;
        if (use_image_control_as_original_image_string === 'true') {
            use_image_control_as_original_image = true;
        }
    }

    let original_image_url = null;
    if (element.dataset.hasOwnProperty("original_image_url") === true) {
        original_image_url = element.dataset.original_image_url;
    }

    let params:ImageProps = {
        imageBaseUrl: imagebaseurl,
        pageBaseUrl: element.dataset.pagebaseurl,
        fullPageRefresh: (element.dataset.full_page_refresh == "true"),
        use_image_control_as_original_image: use_image_control_as_original_image,
        original_image_url: original_image_url
    };

    render(<ImagePanel {...params} />, element);
}


function setupNavigationPanel() {
    let element = document.getElementById("navigationPanel");
    if (element === null) {
        console.warn('navigationPanel not present.');
        return;
    }

    let links = [];
    let current_link = null;

    if (element.dataset.hasOwnProperty("links_json") === true) {
        let json = element.dataset.links_json;
        links = JSON.parse(json);
    }
    if (element.dataset.hasOwnProperty("current_link") === true) {
        current_link = element.dataset.current_link;
    }

    let params:NavigationProps = {
        links: links,
        current_link: current_link
    };
    // Clear the existing HTML
    element.innerHTML = "";

    render(<NavigationPanel {...params} />, element);
}

// function setupDropdownWidget() {
// // <Dropdown options={options} onChange={this._onSelect} value={defaultOption} placeholder="Select an option" />
//
//     let element = document.getElementById("navigationPanel");
//     if (element === null) {
//         console.warn('navigationPanel not present.');
//         return;
//     }
//
//     let params = {};
//     // ReactDropdownProps
//
//     // const options = [
//     //     'one', 'two', 'three'
//     // ];
//     // const defaultOption = options[0];
//     // <Dropdown options={options} onChange={this._onSelect} value={defaultOption} placeholder="Select an option" />;
//
//
//     render(<Dropdown {...params} />, element);
//
// }


(function(){
    setupImagePanel();
    setupNavigationPanel();
    setupControlPanel();
    setupHumanFeelings();
    setupHumanFeelingsControlPanel();
    startEventProcessing();
    // setupDropdownWidget();
})();
