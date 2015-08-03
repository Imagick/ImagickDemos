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
            1000: 100, 
            5000: 250
        };
        for (var i in delays) {
            if (timeElapsed < delays[i]) {
                return delays[i];
            }
        }

        return 1000;
    },

    asyncStatusUpdate: function () {
        var timeElapsed = this.getTicks() - this.startTime;
        var secondsElapsed = timeElapsed / 1000;
        if (secondsElapsed > 60) {
            var text = "Yeah, I think it's broken. Maybe report an issue? Or the background image processor is just taking a really long time to generate the image. Maybe come back in a few minutes and refresh the page.";
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
            this.statusElement.text("Image generation failed with status code '" + jqXHR.status + "'");
        };

        var successCallback = function(data, textStatus, jqXHR) {
            if (jqXHR.status == 200) {
                $(this.element).find('.exampleImage').attr('src', this.imageURI);
                this.statusElement.text("");
                $(this.element).find('.asyncImageHidden').removeClass('asyncImageHidden');
                $(this.element).find('.asyncLoading').css('display', 'none');
                return;
            }
  
            var continueProcessing = this.asyncStatusUpdate();
            if (continueProcessing) {
                var delay = this.getAsyncDelay();
                setTimeout(this.callback, delay);
            }
        };

        $.ajax({
            url: this.imageURI,
            cache: false,
            context: this,
            error: errorCallback,
            success: successCallback
        });
    },

    _create: function() {
        //alert("create called");
    },

    _init: function() {
        this.statusURI = $(this.element).data('statusuri');
        this.imageURI = $(this.element).data('imageuri');
        this.enabled = $(this.element).data('enabled');
        this.statusElement = $(this.element).find('.asyncImageStatus');
        this.asyncSpinner = $(this.element).find('.asyncSpinner');

        if (!this.statusURI) {
            return;
        }

        if (!this.imageURI) {
            return;
        }

        if (!JSON.parse(("" + this.enabled).toLowerCase())) {
            return;
        }

        //We make a single request to get the image to initiate it's generation.
        $.ajax({
            url: this.imageURI,
            //cache: false,
            error: function (){},
            success: function (){}
        });

        this.callback = $.proxy(this, 'checkImageStatus');
        this.first = true;
        this.startTime = this.getTicks();
        
        setTimeout(this.callback, 0);
    } 
};

$.widget("phpimagick.asyncImage", AsyncImage); // create the widget

function initAsyncImage(selector){
    $(selector).asyncImage({});
}
