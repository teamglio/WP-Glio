function activateSlider() {
        jQuery('.item').first().addClass('active-slide');
};
function makeSlideActive() {
        var activediv = jQuery('.item').filter('.active-slide');//or jQuery('.item.active')
        var index = activediv.index();
        var jQueryall = jQuery(".item").removeClass("active-slide");
        var jQuerytotal = jQuery(".item").length;
        var jQuerynextslide = index+1;
        if (jQuerynextslide == jQuerytotal) {
          jQuerynextslide = 0;
        }
        jQuery('div.item').eq(jQuerynextslide).addClass('active-slide');
};
function sliderArea() {
    var height = jQuery(window).height();
    var width = jQuery(window).width();
    var minfooter = (height) - 160;
    minfooterPx = parseInt(minfooter) + 'px';
    jQuery("div.featured-area").css('height',minfooterPx);
    jQuery("div.featured-area").css('width',width);
    var sliderTop = ((parseInt(minfooter) - 480) / 2) + 30 + "px";
    document.getElementById("slider").style.top=sliderTop;
};
function featuredArea() {
    var height = jQuery(window).height();
    var width = jQuery(window).width();
    var minfooter = (height) - 160;
    minfooterPx = parseInt(minfooter) + 'px';
    jQuery("div.featured-area").css('height',minfooterPx);
    jQuery("div.featured-area").css('width',width);
    var sliderTop = ((parseInt(minfooter) - 480) / 2) + 30 + "px";
    document.getElementById("feature-box").style.top=sliderTop;
};