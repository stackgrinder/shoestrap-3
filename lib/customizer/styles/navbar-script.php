<?php

/*
 * The below script allows our extra navbar
 * to be fixed on the top of the page
 * when users scroll down.
 */
function shoestrap_subnav_script() {
  $navbar     = get_theme_mod( 'shoestrap_extra_display_navigation' );
  $navbar_top = get_theme_mod( 'shoestrap_navbar_top' );
  if ( $navbar == 1 && $navbar_top == 0 ) { ?>
    <script>
    !function ($) { $(function(){
      // fix sub nav on scroll
      var $win = $(window)
        , $nav = $('#main-subnav')
        , navTop = $('#main-subnav').length && $('#main-subnav').offset().top - 40
        , isFixed = 0
  
      processScroll()
  
      $win.on('scroll', processScroll)
  
      function processScroll() {
        var i, scrollTop = $win.scrollTop()
        if (scrollTop >= navTop && !isFixed) {
          isFixed = 1
          $nav.addClass('subnav-fixed')
        } else if (scrollTop <= navTop && isFixed) {
          isFixed = 0
          $nav.removeClass('subnav-fixed')
        }
      }
    })
  }(window.jQuery)
  </script>
  <?php }
}
add_action( 'wp_head', 'shoestrap_subnav_script' );