//jQuery to change the navbar on scroll
$(document).ready(function(){
      $(window).scroll(function() { 
        if ($(document).scrollTop() > 500) { 
          $(".navbar-fixed-top").css("background-color", "#1e90ff");
        } else {
          $(".navbar-fixed-top").css("background-color", "rgba(0, 0, 0, 0.43)"); 
        }
        if ($(document).scrollTop() > 50) { 
          $(".footer-block").css("background-color", "#1e90ff"); 
        } else {
          $(".footer-block").css("background-color", "rgba(0, 0, 0, 0.43)"); 
        }
    });
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this),
            $divID = $anchor.attr('href');
        $('html, body').stop().animate({
            scrollTop: $($divID).offset().top
        }, 1500, 'easeInOutExpo');
        // $divID.css('margin-top','15vh');
        event.preventDefault();
    });
});

//jQuery for page shifting feature
$(function() {
    $('a.page-shift').bind('click', function(event) {
        var $anchor = $(this),
            $divID = $anchor.attr('href'),
            $btnID = $($anchor).closest("div").attr("id");
        $(".pro-form-section").css("display", "none");
        console.log('hi'+$btnID);
        $(".tab-btn").removeClass("active");
        $('#'+$btnID).addClass("active");
        $($divID).css("display", "block");
        event.preventDefault();
    });
});



// Visible on scroll

(function($) {
  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);

$(window).scroll(function(event) {
  
  $(".slide-module").each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("come-in"); 
    } 
  });
  
});