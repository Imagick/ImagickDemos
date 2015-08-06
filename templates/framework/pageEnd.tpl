
</body>


{inject name='scriptInclude' type='ScriptServer\Service\ScriptInclude'}



{$scriptInclude->addJS("jquery-1.11.0.min")}
{$scriptInclude->addJS("jquery-ui-1.10.0.custom.min")}
 
{$scriptInclude->addJS("colpick")}
{$scriptInclude->addJS("jquery.fastLiveFilter")}
{$scriptInclude->addJS("syntaxhighlighter/xregexp")}
{$scriptInclude->addJS("syntaxhighlighter/shCore")}
{$scriptInclude->addJS("syntaxhighlighter/shBrushPhp")}
{$scriptInclude->addJS("syntaxhighlighter/shBrushJScript")}
{$scriptInclude->addJS("AsyncImage")}
{$scriptInclude->addJS("jQuery/jquery.tablesorter")}
{$scriptInclude->addJS("jQuery/jquery.tablesorter.parser-metric")}
{$scriptInclude->linkJS() | nofilter}

<script src="/js/bootstrap.min.js"></script>

{* $scriptInclude->addJS("bootstrap.min") *}

<script type="text/javascript">
    
    //http://colpick.com/plugin - I love you color picker

    function addColorSelector(selector, targetElement) {
        var params = {
            colorScheme:'dark',
            layout:'rgbhex',
            color:'ff8800',
            submit: false,
            onChange:function(hsb, hex, rgb, el) {
                $(el).children().css('background-color', '#' + hex);
                $(targetElement).val("rgb("+ rgb.r + ", " + rgb.g + ", " + rgb.b + ")")
            },
        };

        var startColor = $(selector).data('color');

        if (startColor !== undefined) {
            params.color = startColor;
        }

        $(selector).colpick(params);
    }

    //These are currently hardcoded - todo add JS page injection.
    addColorSelector("#backgroundColorSelector", "#backgroundColor");
    addColorSelector("#colorSelector", "#color");
    addColorSelector("#strokeColorSelector", "#strokeColor");
    addColorSelector("#targetColorSelector", "#targetColor");
    addColorSelector("#fillColorSelector", "#fillColor");
    addColorSelector("#fillModifiedColorSelector", "#fillModifiedColor");
    addColorSelector("#textUnderColorSelector", "#textUnderColor");
    addColorSelector("#gradientStartColorSelector", "#gradientStartColor");
    addColorSelector("#gradientEndColorSelector", "#gradientEndColor");
    addColorSelector("#replacementColorSelector", "#replacementColor");
    addColorSelector("#thresholdColorSelector", "#thresholdColor"); 
    

    {literal}
    var params = {
        links: {
            raw: 'Raw text',
            github: 'View on github'
        },
    };

    SyntaxHighlighter.all(params);


    $(function() {
        var callback = function(total) {
            if (total == 0) {
                $('#searchResultNone').css('display', 'inline-block');
            }
            else {
                $('#searchResultNone').css('display', 'none');
            }
        };

        var options = {
            //    timeout: 200,
            callback: callback
        };

        $('#searchInput').fastLiveFilter(
                '#searchList',
                options
        );
        
        
        $('#searchInput').keypress(function(e) {
            if(e.which == 13) {
                var funcTest = function(count, element) {
                    var linkElement = $(element).children("a").first();
                    if (!linkElement) {
                        return;
                    }
                    var link = $(linkElement).attr("href");
                    if (!link) {
                        return;
                    }

                    window.location = link;
                };

                $('#searchList').children(":visible").first().each(funcTest);
            }
        });
    });



        function toggleImage(imageSelector, mouseSelector, originalURL, originalText, modifiedURL, modifiedText) {

        var newImageURL;
        var newText;

        if ( typeof toggleImage.originalImage == 'undefined' ) {
            // First call, perform the initialization
            toggleImage.originalImage = false;
        }

        if (toggleImage.originalImage) {
            newImageURL = modifiedURL;
            newText = modifiedText;
            toggleImage.originalImage = false;
        }
        else {
            newImageURL = originalURL;
            newText = originalText;
            toggleImage.originalImage = true;
        }

        $(imageSelector).attr('src', newImageURL);
        $(mouseSelector).text(newText);
    }

    initAsyncImage('.asyncImage');

    
    function initTableSorter() {
    
    var table = $("#myTable");

    if (table) {
        table.tablesorter({
            headers: {
                0: {
                    sorter: 'metric'
                }/*,
                1: {
                    sorter: 'text'
                } */
            },
            widgets: ['zebra']
        });
    }
    else{
        alert("table not found");
    }
}

    initTableSorter();
    
    //$(window).bind("pageshow", function() {
    // use this to reset form for back button cleanup
    //    alert("pageshow?");
    //});

    {/literal}
</script>

</html>
