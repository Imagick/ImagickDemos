<?php


$HTML = <<< HTML

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Hello React!</title>
    </head>
    <body>
            <div id="content"></div>

        <!-- Dependencies -->
<!--        <script src="./node_modules/react/umd/react.development.js"></script>-->
<!--        <script src="./node_modules/react-dom/umd/react-dom.development.js"></script>-->

        <!-- Main -->
        <script src="./dist/js/vendor.bundle.js"></script>
        <script src="./dist/js/app.bundle.js"></script>
    </body>
</html>
HTML;

echo "hello.";


echo $HTML;