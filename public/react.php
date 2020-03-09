<?php


$HTML = <<< HTML

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Hello React!</title>
    </head>
    <body>
        <div id="controlPanel"></div>

        <div id="imagePanel"></div>
        <script src="./dist/js/app.bundle.js"></script>
    </body>
</html>
HTML;

echo "This is a react test page.";

echo $HTML;