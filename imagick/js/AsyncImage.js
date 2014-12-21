/*jslint evil: false, vars: true, eqeq: true, white: true */







var AsyncImage = {

    checkCount: 0,
    statusURI: null,
    imageURI: null,
    callback: null,
    statusElement: null,
    
    options: {
        content: null,
        //
        //filterTags: '.searchTags',
        //contentTags: '.contentTags',
        //suggestedTags: '.suggestedTags',
        //suggestWidget: null,
    },

    getAsyncDelay: function (number) {
        if (number == 0) {
            return 0;
        }
        if (number > 5 ) {
            number = 5;
        }
    
        var delay = Math.floor(100 * Math.pow(1.5, number));
    
        if (delay > 4000) {
            delay = 4000;
        }
    
        return delay;
    },



    asyncStatusUpdate: function () {
        var checkCount = this.checkCount;
        if (checkCount > 60) {
            this.statusElement.text("Yeah. I think it's broken dude. Maybe report an issue? Or it could just be taking a really long time to generate the image. Maybe come back in a few minutes and refresh the page.");
            return false;
        }
        else if (checkCount > 30) {
            this.statusElement.text("A really long time. It might be broken.");
        }
        else if (checkCount > 8) {
            this.statusElement.text("Hmm, this seems to be taking a long time.");
        }
        else if (checkCount > 3) {
            this.statusElement.text("Async loading image.");
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

        this.checkCount += 1;
    },

    _create: function() {
        //alert("create called");
    },

    _init: function() {
        this.statusURI = $(this.element).data('statusuri');
        this.imageURI = $(this.element).data('imageuri');
        this.statusElement = $(this.element).find('.asyncImageStatus');
        
        if (!this.statusURI) {
            return;
        }

        if (!this.imageURI) {
            return;
        }
        
        if (!this.statusElement) {
            alert("Failed to find status element");
        }

        $.ajax({
            url: this.imageURI,
            //cache: false,
            error: function (){},
            success: function (){}
        });

        this.callback = $.proxy(this, 'checkImageStatus');
        
        setTimeout(this.callback, 0);
    } 
};

$.widget("phpimagick.asyncImage", AsyncImage); // create the widget

function initAsyncImage(selector){
    $(selector).asyncImage({});
}
