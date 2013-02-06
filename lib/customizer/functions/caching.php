<?php

function shoestrap_buttons_css_cache() {
  $data = get_transient( 'shoestrap_buttons_css' );
  if ( $data === false ) {
    $data = shoestrap_buttons_css();
    set_transient( 'shoestrap_buttons_css', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_buttons_css_cache_reset() {
  delete_transient( 'shoestrap_buttons_css' );
  shoestrap_buttons_css_cache();
}

function shoestrap_footer_css_cache() {
  $data = get_transient( 'shoestrap_footer_css' );
  if ( $data === false ) {
    $data = shoestrap_footer_css();
    set_transient( 'shoestrap_footer_css', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_footer_css_cache_reset() {
  delete_transient( 'shoestrap_footer_css' );
  shoestrap_footer_css_cache();
}

function shoestrap_branding_css_cache() {
  $data = get_transient( 'shoestrap_branding_css' );
  if ( $data === false ) {
    $data = shoestrap_branding_css();
    set_transient( 'shoestrap_branding_css', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_branding_css_cache_reset() {
  delete_transient( 'shoestrap_branding_css' );
  shoestrap_branding_css_cache();
}

function shoestrap_css_hero_cache() {
  $data = get_transient( 'shoestrap_css_hero' );
  if ( $data === false ) {
    $data = shoestrap_css_hero();
    set_transient( 'shoestrap_css_hero', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_css_hero_cache_reset() {
  delete_transient( 'shoestrap_css_hero' );
  shoestrap_css_hero_cache();
}

function shoestrap_navbar_css_cache() {
  $data = get_transient( 'shoestrap_navbar_css' );
  if ( $data === false ) {
    $data = shoestrap_navbar_css();
    set_transient( 'shoestrap_navbar_css', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_navbar_css_cache_reset() {
  delete_transient( 'shoestrap_navbar_css' );
  shoestrap_navbar_css_cache();
}

function shoestrap_navbar_dropdown_css_cache() {
  $data = get_transient( 'shoestrap_navbar_dropdown_css' );
  if ( $data === false ) {
    $data = shoestrap_navbar_dropdown_css();
    set_transient( 'shoestrap_navbar_dropdown_css', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_navbar_dropdown_css_cache_reset() {
  delete_transient( 'shoestrap_navbar_dropdown_css' );
  shoestrap_navbar_dropdown_css_cache();
}

function shoestrap_top_megamenu_css_cache() {
  $data = get_transient( 'shoestrap_top_megamenu_css' );
  if ( $data === false ) {
    $data = shoestrap_top_megamenu_css();
    set_transient( 'shoestrap_top_megamenu_css', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_top_megamenu_css_cache_reset() {
  delete_transient( 'shoestrap_top_megamenu_css' );
  shoestrap_top_megamenu_css_cache();
}

function shoestrap_social_share_styles_cache() {
  $data = get_transient( 'shoestrap_social_share_styles' );
  if ( $data === false ) {
    $data = shoestrap_social_share_styles();
    set_transient( 'shoestrap_social_share_styles', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_social_share_styles_cache_reset() {
  delete_transient( 'shoestrap_social_share_styles' );
  shoestrap_social_share_styles_cache();
}

/*
 * Set cache for 24 hours
 */
function shoestrap_typography_webfont_cache() {
  $data = get_transient( 'shoestrap_typography_webfont' );
  if ( $data === false ) {
    $data = shoestrap_typography_webfont();
    set_transient( 'shoestrap_typography_webfont', $data, 3600 * 24 );
  }
  echo $data;
}

function shoestrap_typography_webfont_cache_reset() {
  delete_transient( 'shoestrap_typography_webfont' );
  shoestrap_typography_webfont_cache();
}

function shoestrap_transients_cache() {
  $caching = get_option( 'shoestrap_customizer_caching' );
  
  if ( $caching == 1 ) {
    
  } else {
    add_action( 'wp_head', 'shoestrap_buttons_css_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_buttons_css_cache_reset' );
    add_action( 'wp_head', 'shoestrap_footer_css_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_footer_css_cache_reset' );
    add_action( 'wp_head', 'shoestrap_branding_css_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_branding_css_cache_reset' );
    add_action( 'wp_head', 'shoestrap_css_hero_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_css_hero_cache_reset' );
    add_action( 'wp_head', 'shoestrap_navbar_css_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_navbar_css_cache_reset' );
    add_action( 'wp_head', 'shoestrap_navbar_dropdown_css_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_navbar_dropdown_css_cache_reset' );
    add_action( 'wp_head', 'shoestrap_top_megamenu_css_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_top_megamenu_css_cache_reset' );
    add_action( 'wp_head', 'shoestrap_social_share_styles_cache', 199 );
    add_action( 'customize_preview_init', 'shoestrap_social_share_styles_cache_reset' );
    add_action( 'wp_head', 'shoestrap_typography_webfont_cache', 201 );
    add_action( 'customize_preview_init', 'shoestrap_typography_webfont_cache_reset' );
  }
}
