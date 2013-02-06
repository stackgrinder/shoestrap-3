<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_register_settings( $wp_customize ){
  
  $settings   = array();
  
  // Advanced Settings
  $settings[] = array( 'slug' => 'shoestrap_advanced_head',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_advanced_footer',           'default' => '' );

  // General / Preset Settings
  $settings[] = array( 'slug' => 'shoestrap_general_presets',           'default' => 'bootstrap' );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_register_settings' );
