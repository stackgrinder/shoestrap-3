<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_buttons_register_settings( $wp_customize ){

  $settings   = array();
  
  // Color Settings
  $settings[] = array( 'slug' => 'shoestrap_buttons_color',             'default' => '#0066bb' );
  $settings[] = array( 'slug' => 'shoestrap_flat_buttons',              'default' => '' );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_register_settings' );
