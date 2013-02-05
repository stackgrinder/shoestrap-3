<?php

/*
 * Removes core controls
 */
function shoestrap_remove_controls( $wp_customize ){
  $wp_customize->remove_control( 'header_textcolor');
}
add_action( 'customize_register', 'shoestrap_remove_controls' );

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 */
function shoestrap_customize_preview( $wp_customize ) {
  wp_enqueue_script( 'shoestrap-customizer', get_stylesheet_directory_uri() . '/lib/customizer/js/theme-customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'shoestrap_customize_preview' );

function shoestrap_nav_class_pull() {
  if ( get_theme_mod( 'shoestrap_nav_pull' ) == '1' ) {
    $ul = 'nav pull-right';
  } else {
    $ul = 'nav';
  }
  return $ul;
}
