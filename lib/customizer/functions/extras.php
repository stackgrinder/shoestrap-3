<?php

/*
 * Removes core controls
 */
function shoestrap_remove_controls( $wp_customize ){
  $wp_customize->remove_control( 'header_textcolor');
}
add_action( 'customize_register', 'shoestrap_remove_controls' );

/*
 * If the user has selected to not display the top navbar,then hide it.
 * To do that, we 'll remove the bootstrap-top-navbar theme support
 * (it is on by default).
 */
add_action( 'wp', 'shoestrap_hide_navbar' );
function shoestrap_hide_navbar() {
  $navbar = get_theme_mod( 'shoestrap_navbar_top' );
  if ( $navbar == 0 ) {
    remove_theme_support( 'bootstrap-top-navbar' );
  }
}

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
