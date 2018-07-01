/*jslint evil: false, vars: true, eqeq: true, white: true */


var AsyncImage = {

    checkCount: 0,
    statusURI: null,
    imageURI: null,
    callback: null,
    statusElement: null,
    asyncSpinner: null,
    startTime: null,

    options: {
        content: null
    },

    getTicks: function() {
        var d = new Date();
        return d.getTime();
    },

    getAsyncDelay: function() {
        var timeElapsed = this.getTicks() - this.startTime;
        var delays = {
            500: 10,
            1000: 100,
            5000: 250
        };
        for (var i in delays) {
            if (timeElapsed < delays[i]) {
                return delays[i];
            }
        }

        return 250; //Do we care about spamming the server?
    },

    asyncStatusUpdate: function () {
        var timeElapsed = this.getTicks() - this.startTime;
        var secondsElapsed = timeElapsed / 1000;
        if (secondsElapsed > 60) {
            var text = "Yeah, I think it's broken. Maybe report an issue? Or the background image processor is just taking a really long time to generate the image. Maybe come back in a few minutes and refresh the page. Or you could go for walk, stretch your legs a bit and get a bit of exercise ";
            this.statusElement.text(text);
            return false;
        }
        else if (secondsElapsed > 30) {
            this.statusElement.text("A really long time. It might be broken.");
        }
        else if (secondsElapsed > 5) {
            this.statusElement.text("Hmm, this seems to be taking a long time.");
        }
        else if (secondsElapsed > 1) {
            this.asyncSpinner.css('display', 'inline-block');
        }

        return true;
    },
    
    checkImageStatus: function (asyncLoad) {

        var errorCallback = function(jqXHR, textStatus, errorThrown) {
            
            if (jqXHR.status == 420) {
                var continueProcessing = this.asyncStatusUpdate();
                if (continueProcessing) {
                    var delay = this.getAsyncDelay();
                    setTimeout(this.callback, delay);
                }
                return;
            }

            this.statusElement.text("Image generation failed with status code '" + jqXHR.status + "'");
        };

        var successCallback = function(data, textStatus, jqXHR) {
            var d = new Date();
            var newSrc;
            
            var n = this.imageURI.indexOf("?");
            if (n == -1) {
                newSrc = this.imageURI + "?time=" + d.getTime();
            }
            else {
                newSrc = this.imageURI + "&time=" + d.getTime();
            }
            
            $(this.element).find('.imageStatus').attr('src', newSrc); 
            $(this.element).find('.imageShown').toggle(true);
            $(this.element).find('.asyncShown').toggle(false);
        };

        $.ajax({
            url: this.imageURI,
            cache: true,
            context: this,
            error: errorCallback,
            success: successCallback
        });
    },

    imageError: function(event, xhr) {
        this.imageErrorTweakHTML();
        setTimeout(this.callback, 0);
    },
    
    imageErrorTweakHTML: function() {
        $(this.element).find('.imageShown').toggle(false);
        $(this.element).find('.asyncShown').toggle(true);
    },
    
    _create: function() {
    },

    _init: function() {
        this.imageURI = $(this.element).data('imageuri');
        this.statusElement = $(this.element).find('.asyncImageStatus');
        this.asyncSpinner = $(this.element).find('.asyncSpinner');


        if (!this.imageURI) {
            return;
        }
        
        $(this.element).find('.exampleImage').off('error');
        $(this.element).find('.exampleImage').on('error', $.proxy(this, 'imageError'));

        var enabledData = $(this.element).data('enabled');
        if (enabledData) {
            var enabled = ("" + enabledData).toLowerCase();
            if (enabled != "true") {
                return;
            }
        }

        //Create the proxy once, to avoid leaving them hanging around
        this.callback = $.proxy(this, 'checkImageStatus');
        this.first = true;
        this.startTime = this.getTicks();

        //Has a load error already occurred before this widget was 
        //intialised.
        var status = $(this.element).find('.imageStatus').data('status');
        if (status == "loadError") {
            this.imageErrorTweakHTML();
            setTimeout(this.callback, 0);
        }
    } 
};

$.widget("phpimagick.asyncImage", AsyncImage); // create the widget

function initAsyncImage(selector){

    $(selector).asyncImage({});
}
