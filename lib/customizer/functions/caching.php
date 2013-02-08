<?php

function shoestrap_customizer_combined_data() {
  // Determine if the user is using the advanced builder or not
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  // Turn off the advanced builder on multisite
  if ( is_multisite() && !is_super_admin() ) {
    $advanced_builder == '';
  }

  $data = '';
  if ( $advanced_builder != 1 ) {
    $data .= shoestrap_typography_webfont();
    $data .= shoestrap_text_css();
    $data .= shoestrap_typography_css();
    $data .= shoestrap_buttons_css();
    $data .= shoestrap_navbar_css();
    $data .= shoestrap_navbar_dropdown_css();
    $data .= shoestrap_top_megamenu_css();
  }
  $data .= shoestrap_branding_css();
  $data .= shoestrap_css_hero();
  $data .= shoestrap_footer_css();
  $data .= shoestrap_social_share_styles();
  
  return $data;
}

function shoestrap_customizer_cache() {
  $caching_disabled = get_option( 'shoestrap_customizer_caching' );
  
  if ( $caching_disabled != 1 ) {
    $data = get_transient( 'shoestrap_customizer_css' );
    if ( $data === false ) {
      $data = shoestrap_customizer_combined_data();
      set_transient( 'shoestrap_customizer_combined_data', $data, 3600 * 24 );
    }
  } else {
    $data = shoestrap_customizer_combined_data();
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_customizer_cache', 199 );

function shoestrap_customizer_cache_reset() {
  delete_transient( 'shoestrap_customizer_css' );
  shoestrap_customizer_cache();
}
add_action( 'customize_preview_init', 'shoestrap_customizer_cache_reset' );
