
/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
(function($) {
  
  function menu(){
      var triggerBttn = document.getElementById( 'trigger-overlay' ),
        overlay = document.querySelector( 'div.overlay' ),
        closeBttn = overlay.querySelector( 'button.overlay-close' );
        transEndEventNames = {
          'WebkitTransition': 'webkitTransitionEnd',
          'MozTransition': 'transitionend',
          'OTransition': 'oTransitionEnd',
          'msTransition': 'MSTransitionEnd',
          'transition': 'transitionend'
        },
        transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
        support = { transitions : Modernizr.csstransitions };

      function toggleOverlay() {
        if( classie.has( overlay, 'open' ) ) {
          classie.remove( overlay, 'open' );
          classie.add( overlay, 'close' );
          var onEndTransitionFn = function( ev ) {
            if( support.transitions ) {
              if( ev.propertyName !== 'visibility' ) return;
              this.removeEventListener( transEndEventName, onEndTransitionFn );
            }
            classie.remove( overlay, 'close' );
          };
          if( support.transitions ) {
            overlay.addEventListener( transEndEventName, onEndTransitionFn );
          }
          else {
            onEndTransitionFn();
          }
        }
        else if( !classie.has( overlay, 'close' ) ) {
          classie.add( overlay, 'open' );
        }
      }

      triggerBttn.addEventListener( 'click', toggleOverlay );
      closeBttn.addEventListener( 'click', toggleOverlay );
    }
    function reslogo(){
      $(window).resize(function() {
          var outerwidth = $('.page-header').width();
          var rightpos = outerwidth / 2 - 90;
          $('#logo').css('right', rightpos);
          $('#logo').fadeIn();
        });

        $(window).trigger('resize');
    }
    function respag(){
      $(window).resize(function() {
          var pagwidth = $('.paginate').width();
          $('#paging').css("right", "-"+pagwidth+"px");
          $('#paging').fadeIn();
        });

        $(window).trigger('resize');
    }

    function resnav(){
      $(window).resize(function() {
          var outerwidth = $('#fix').width();
          var rightpos = outerwidth / 2 + 55;
          $('#pagenav').css('left', rightpos);
          $('#pagenav').fadeIn();
        });

        $(window).trigger('resize');
    }
    function reshome(){
      $(window).resize(function() {
          if($(document.body).hasClass("logged-in")){
            $('.half').height($(window).height() - 132);
            $('.half').fadeIn();
          }else{
            $('.half').height($(window).height() - 100);
            $('.half').fadeIn();
          }
        });

        $(window).trigger('resize');
    }
    function rescenter(){
      var centered = $('.centered');
      centered.imagesLoaded( function() {
        // images have loaded
        $(window).resize(function() {
          
          var img = $('#singleimg');
          var height = img.height();
          var width = img.width();
          var dh = $(document).height();
        
          if(height){} else {
            height = 400;
          }
        
        dh = dh - 100;
        var margin = dh - height;
        margin = margin / 2;
        console.log(width);
        centered.css('margin-top', margin);
        centered.css('margin-bottom', margin);
        //$('.image').css('max-width', width);
        centered.fadeTo("slow", 1);
        });

        $(window).trigger('resize');
      });

     
      /*$(window).resize(function() {
          var dh = $(document).height();
          var img = document.getElementById('singleimg'); 
          var height = img.clientHeight;
          var margin = dh - height;
          margin = margin / 2;
          $('.centered').css('top', margin);
          console.log(dh);
          console.log(height);
          console.log(margin);
        });

        $(window).trigger('resize');*/
    }



  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        menu();
        reslogo();
        resnav();
        respag();
        rescenter();


        
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
          reshome();
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  

  // Load Events
  $(document).ready(UTIL.loadEvents);

  

 

})(jQuery); // Fully reference jQuery after this point.
