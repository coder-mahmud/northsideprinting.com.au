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

    // Sticky menu at artwork template page
    var $window = $(window),
        $mainMenuBar = $('.onpage_links'),
        $mainMenuBarAnchor = $('#mainMenuBarAnchor');

    // Run this on scroll events.
    $window.scroll(function() {
        var window_top = $window.scrollTop();
        if($mainMenuBarAnchor){
          var div_top = $mainMenuBarAnchor.offset().top;
        }
        
        if (window_top > div_top) {
            // Make the div sticky.
            $mainMenuBar.addClass('stick');
            $mainMenuBarAnchor.height($mainMenuBar.height());
        }
        else {
            // Unstick the div.
            $mainMenuBar.removeClass('stick');
            $mainMenuBarAnchor.height(0);
        }

    });

$('.onpage_links a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });



  // window.onresize = function(){ location.reload(); }
  


// Menu Scripts
window.onresize = function(){ 
    //console.log($(window).width());

    if($(window).width() < 768){
        $('ul li:nth-child(2) ul').css('display', 'block'); 
    }
}

if($(window).width() < 768){
    $('ul li:nth-child(2) ul').css('display', 'block');
}
    



    $(".menu_toggler").click(function() {

        $("ul.main_menu > ul").css("display", "none");
        
        $("nav > ul").slideToggle();

            
    });

      $("ul li").click(function() {
            $("ul ul").slideUp();
            //$(this).find('ul').slideToggle();
            $(this).find('ul').stop().slideToggle();
      });

      $(window).resize(function() {
            if($(window).width() > 768) {
                  $("ul").removeAttr('style');
            }
      });


      $('.menu-item-has-children').addClass('asd');
      $('.main_menu > .menu-item-has-children > a').append('<i class="fa fa-angle-down"></i>');



  });// End window load

import Search from './modules/search'

var search = new Search();

