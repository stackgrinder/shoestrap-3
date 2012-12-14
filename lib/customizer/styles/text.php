<?php

/*
 * CSS needed to apply the selecte styles to text elements.
 */
function shoestrap_text_css() {
  $background_color = get_theme_mod( 'shoestrap_background_color' );
  $link_color       = get_theme_mod( 'shoestrap_link_color' );
	$text_color				= get_theme_mod( 'shoestrap_text_color' );
  
  // Make sure colors are properly formatted
  $background_color = '#' . str_replace( '#', '', $background_color );
  $link_color       = '#' . str_replace( '#', '', $link_color );
	$text_color       = '#' . str_replace( '#', '', $text_color );
  
  $styles = '<style>';
  // General links styling
  $styles .= 'a, a.active, a:hover, a.hover, a.visited, a:visited, a.link, a:link{ color: ' . $link_color . ';}';
  // Button and Text styling
  $styles .= 'a.btn, #wrap{ color: ' . $text_color . '; }';
  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_text_css_cache() {
  $data = get_transient( 'shoestrap_text_css' );
  if ( $data === false ) {
    $data = shoestrap_text_css();
    set_transient( 'shoestrap_text_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_text_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_text_css_cache_reset() {
  delete_transient( 'shoestrap_text_css' );
  shoestrap_text_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_text_css_cache_reset' );

