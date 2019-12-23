import * as React from "react";
import * as ReactDOM from "react-dom";

import { HelloWorld } from "./components/HelloWorld";

ReactDOM.render(
    <HelloWorld firstName="Chris" lastName="Parker" />,
    document.getElementById("content")
);