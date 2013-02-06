<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_register_settings( $wp_customize ){
  
  $settings   = array();
  
  // Social Settings
  $settings[] = array( 'slug' => 'shoestrap_facebook_link',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_twitter_link',              'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_google_plus_link',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_pinterest_link',            'default' => '' );
  
  $settings[] = array( 'slug' => 'shoestrap_facebook_on_posts',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_twitter_on_posts',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_gplus_on_posts',            'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_linkedin_on_posts',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_pinterest_on_posts',        'default' => '' );
  
  $settings[] = array( 'slug' => 'shoestrap_single_social_text',    	'default' => 'Share' );
  $settings[] = array( 'slug' => 'shoestrap_single_social_position',    'default' => 'none' );  
  
  // Advanced Settings
  $settings[] = array( 'slug' => 'shoestrap_advanced_head',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_advanced_footer',           'default' => '' );
    
  // Footer Settings
  $settings[] = array( 'slug' => 'shoestrap_footer_background_color',   'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_footer_text',               'default' => get_bloginfo( 'name' ) );
  
  // General / Preset Settings
  $settings[] = array( 'slug' => 'shoestrap_general_presets',           'default' => 'bootstrap' );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_register_settings' );
