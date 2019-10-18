jQuery(window).on('load',function(){

    jQuery('#carousel').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: 120,
      itemMargin: 5,
      asNavFor: '#slider'
    });


    jQuery('.MySlider').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      sync: "#carousel",
      start: function(slider){
        jQuery('body').removeClass('loading');
      }
    });

  });

