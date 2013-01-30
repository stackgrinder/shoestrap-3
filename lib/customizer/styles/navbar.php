<?php

/*
 * Applies the styles to the navbar.
 */
function shoestrap_navbar_css(){
  // Get the customizer settings
  $header_bg_color      = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  $navbar_color         = get_theme_mod( 'shoestrap_navbar_color' );
  $navbar_textcolor     = get_theme_mod( 'shoestrap_navbar_textcolor' );
  $navbar_logo_padding  = get_theme_mod( 'shoestrap_navbar_logo_padding' );
  $navbar_no_gradient   = get_theme_mod( 'shoestrap_navbar_no_gradient' );
  $navbar_fixed         = get_theme_mod( 'shoestrap_navbar_fixed' );
  
  // Make sure colors are properly formatted
  $header_bg_color  = '#' . str_replace( '#', '', $header_bg_color );
  $navbar_color     = '#' . str_replace( '#', '', $navbar_color );
  $navbar_textcolor = '#' . str_replace( '#', '', $navbar_textcolor );
  
  // Make sure the padding is properly formatted
  if ( $navbar_logo_padding >= 1 ) {} else { $navbar_logo_padding = 0; }
  
  // Apply proper padding for logos
  $styles = '<style>';
  if ( get_theme_mod( 'shoestrap_logo' ) ) {
    if ( get_theme_mod( 'shoestrap_header_mode' ) == 'navbar' ) {
      '.navbar a.brand{padding: 5px 20px 5px;}';
    }
  }
  
  // Navbar colors
  $styles .= '.navbar-inner, #main-subnav.subnav-fixed, .navbar-inner .dropdown-menu{';
  $styles .= 'background-color:' . $navbar_color . '!important;';
  if ( $navbar_no_gradient != 1 ) {
    $styles .= 'background-image: -moz-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $navbar_color . '), to(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ')) !important;';
    $styles .= 'background-image: -webkit-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'background-image: -o-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'background-image: linear-gradient(to bottom, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'filter: e(%("progid:DXImageTransform.Microsoft.gradient(startColorstr="%d", endColorstr="%d", GradientType=0)",argb(' . $navbar_color . '),argb(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . '))) !important;';
    $styles .= 'border: 1px solid ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
  } else {
    $styles .= 'background-image: -moz-linear-gradient(top, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $navbar_color . '), to(' . $navbar_color . ')) !important;';
    $styles .= 'background-image: -webkit-linear-gradient(top, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'background-image: -o-linear-gradient(top, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'background-image: linear-gradient(to bottom, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'filter: e(%("progid:DXImageTransform.Microsoft.gradient(startColorstr="%d", endColorstr="%d", GradientType=0)",argb(' . $navbar_color . '),argb(' . $navbar_color . '))) !important;';
    $styles .= 'border: 1px solid ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
  }

  // Navbar Padding
  $styles .= 'padding:' . $navbar_logo_padding . 'px;}';
  
  // Navbar Dropdown colors
  $styles .= '.navbar-inner .dropdown-menu{padding: 0;}';
  
  // Extra css for non-fixed navbar
  if ( $navbar_fixed != 1 ) {
    $styles .= '.navbar.navbar-fixed-top{position:relative;}';
    $styles .= 'body.admin-bar .navbar-fixed-top{top:0;}';
    $styles .= 'body.top-navbar{padding-top:0;}';
  }
  
  // Navbar Button colors
  $styles .= '.btn.btn-navbar{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -40 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 40 ) . ';';
  }
  $styles .= '}';
  
  $styles .= '.btn.btn-navbar:hover, .btn.btn-navbar:active, .btn.btn-navbar:enabled{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -30 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
  }
  $styles .= '}';
  
  // Navbar menu items text-color and active menu styling
  $styles .= '.navbar-inner a, .navbar-inner .brand, .navbar .nav > li > a{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    }
  } else {
    $styles .= 'color: ' . $navbar_textcolor . ';';
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  $styles .= '.navbar-inner a:hover, .navbar-inner .brand:hover, .navbar .nav > li > a:hover{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -200 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 200 ) . ';';
    }
  } else {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, -20 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, 20 ) . ';';
    }
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  $styles .= '.navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 130) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -180 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 180 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
    }
  } else {
    if ( shoestrap_get_brightness( $navbar_color ) >= 130) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, -30 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, 300 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
    }
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  
  // Destroy active menu item background when user has added padding
  if ( $navbar_logo_padding >= 1 ) {
    $styles .= '.navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus{';
    $styles .= 'background-color:none; background-color:transparent;';
    $styles .= '-webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none;}';
  }

  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_navbar_css_cache() {
  $data = get_transient( 'shoestrap_navbar_css' );
  if ( $data === false ) {
    $data = shoestrap_navbar_css();
    set_transient( 'shoestrap_navbar_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_navbar_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_navbar_css_cache_reset() {
  delete_transient( 'shoestrap_navbar_css' );
  shoestrap_navbar_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_navbar_css_cache_reset' );
