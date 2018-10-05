logoSize = function () {
    // Get the real width of the logo image
    var theLogo = $("#thelogo");
    var newImage = new Image();
    newImage.src = theLogo.attr("src");
    var imgWidth = newImage.width;
    
    // distance over which zoom effect takes place
    var maxScrollDistance = 250;
    
    // set to window height if larger
    maxScrollDistance = Math.min(maxScrollDistance, $(window).height());
    
    // width at maximum zoom out (i.e. when window has scrolled maxScrollDistance)
    var widthAtMax = 144;
    
    // calculate diff and how many pixels to zoom per pixel scrolled
    var widthDiff = imgWidth - widthAtMax;
    var pixelsPerScroll =(widthDiff / maxScrollDistance);

    $(window).scroll(function () {
        // the currently scrolled-to position - max-out at maxScrollDistance
        var scrollTopPos = Math.min($(document).scrollTop(), maxScrollDistance);
        
        // how many pixels to adjust by
        var scrollChangePx =  Math.floor(scrollTopPos * pixelsPerScroll);
        
        // calculate the new width
        var zoomedWidth = imgWidth - scrollChangePx;
        
        // set the width
        var w = window.innerWidth;
        console.log(w);
        //if(w>1425)
        //$('.img-logo').css('width', zoomedWidth);
    });
}

logoSize();