<?php

function shoestrap_top_megamenu_css() {
  $navbar_color     = get_theme_mod( 'shoestrap_navbar_color' );
  $navbar_textcolor = get_theme_mod( 'shoestrap_navbar_textcolor' );
  
  $navbar_color     = '#' . str_replace( '#', '', $navbar_color );
  $navbar_textcolor = '#' . str_replace( '#', '', $navbar_textcolor );

  $styles = '<style>';
  
  $styles .= '.top-megamenu{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 20 ) . ';';
  }
  $styles .= '}';

  $styles .= '.top-megamenu, .top-megamenu a{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    }
  } else {
    $styles .= 'color: ' . $navbar_textcolor . ';';
  }
  $styles .= '}';
  
  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_top_megamenu_css_cache() {
  $data = get_transient( 'shoestrap_top_megamenu_css' );
  if ( $data === false ) {
    $data = shoestrap_top_megamenu_css();
    set_transient( 'shoestrap_top_megamenu_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_top_megamenu_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_top_megamenu_css_cache_reset() {
  delete_transient( 'shoestrap_top_megamenu_css' );
  shoestrap_top_megamenu_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_top_megamenu_css_cache_reset' );
