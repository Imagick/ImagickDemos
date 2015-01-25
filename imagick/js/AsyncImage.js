/*jslint evil: false, vars: true, eqeq: true, white: true */



var AsyncImage = {

    checkCount: 0,
    statusURI: null,
    imageURI: null,
    callback: null,
    statusElement: null,
    startTime: null,
    
    options: {
        content: null
    },
    
    getTicks: function() {
        var d = new Date();
        return d.getTime();
    },

    getAsyncDelay: function () {
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
            var imageLink = "<a href='" + this.imageURI + "'>" + this.imageURI + "</a>";
            var text = "Yeah, I think it's broken. Maybe report an issue? Or it could just be taking a really long time to generate the image. Maybe come back in a few minutes and refresh the page.";
            this.statusElement.text(text);
            return false;
        }
        else if (secondsElapsed > 30) {
            this.statusElement.text("A really long time. It might be broken.");
        }
        else if (secondsElapsed > 5) {
            this.statusElement.text("Hmm, this seems to be taking a long time.");
        }

        return true;
    },
    
    checkImageStatus: function (asyncLoad) {
        var errorCallback = function(jqXHR, textStatus, errorThrown) {
            //alert("checkImageStatus done with error: textStatus");
        };

        var successCallback = function(data, textStatus, jqXHR) {
            if (data.hasOwnProperty('finished')) {
                var finished = data['finished'];

                if (finished) {
                    $(this.element).find('.exampleImage').attr('src', this.imageURI);
                    this.statusElement.text("");
                    $(this.element).find('.asyncImageHidden').removeClass('asyncImageHidden');
                    $(this.element).find('.asyncLoading').css('display', 'none');
                }
                else {
                    var continueProcessing = this.asyncStatusUpdate();
                    if (continueProcessing) {
                        var delay = this.getAsyncDelay();
                        setTimeout(this.callback, delay);
                    }
                }
            }
        };

        $.ajax({
            url: this.statusURI,
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

        if (!this.statusURI) {
            return;
        }

        if (!this.imageURI) {
            return;
        }

        if (this.imageURI.indexOf("?")) {
            this.imageURI = this.imageURI + "&noredirect=true";
        }
        else {
            this.imageURI = this.imageURI + "?noredirect=true";
        }
        if (!JSON.parse(("" + this.enabled).toLowerCase())) {
            return;
        }

        $.ajax({
            url: this.imageURI,
            //cache: false,
            error: function (){},
            success: function (){}
        });

        this.callback = $.proxy(this, 'checkImageStatus');

        this.startTime = this.getTicks();
        
        setTimeout(this.callback, 0);
    } 
};

$.widget("phpimagick.asyncImage", AsyncImage); // create the widget

function initAsyncImage(selector){
    $(selector).asyncImage({});
}
