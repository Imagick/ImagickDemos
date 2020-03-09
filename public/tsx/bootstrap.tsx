import { h, render } from "preact";
import { ControlPanel } from "./ControlPanel";
import { ImagePanel, ImageProps } from "./ImagePanel";

import "./legacy.js";

function setupControlPanel() {
    let controlPanelElement = document.getElementById("controlPanel");
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
        <ControlPanel {...controlProps} />,
        document.getElementById("controlPanel")
    );
}

function setupImagePanel() {
    let element = document.getElementById("imagePanel");
    if (element === null) {
        console.warn('imagePanel not present.');
        return;
    }

    if (element.dataset.hasOwnProperty("imagebaseurl") !== true) {
        console.error('imagePanel missing imagebaseurl');
        return;
    }

    if (element.dataset.hasOwnProperty("imagebaseurl") !== true) {
        console.error('imagePanel missing imagebaseurl');
        return;
    }

    let params:ImageProps = {
        imageBaseUrl: element.dataset.imagebaseurl,
        pageBaseUrl: element.dataset.pagebaseurl
    };

    render(<ImagePanel {...params} />, element);
}

(function(){
    setupImagePanel();
    setupControlPanel();
})();

