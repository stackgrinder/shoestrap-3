<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_general_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_general', 'title' => __( 'General', 'shoestrap' ), 'priority' => 6 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
  
  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_general_no_gradients',  'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_general_no_radius',     'default' => '' );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_hero_customizer' );
