<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_register_settings( $wp_customize ){
  
  // Adds compatibility with wordpress's default background color control.
  $background_color = get_theme_mod( 'background_color' );
  $background_color = '#' . str_replace( '#', '', $background_color );
  set_theme_mod( 'background_color', get_theme_mod( 'shoestrap_background_color' ) );
  
  // Compatibility hack for previous versions of Shoestrap.
  if ( get_theme_mod( 'shoestrap_header_mode' ) == 'header' ) {
    $shoestrap_extra_branding = 1;
  } else {
    $shoestrap_extra_branding = 0;
  }

  $settings   = array();
  
  // Logo Settings
  $settings[] = array( 'slug' => 'shoestrap_logo',                      'default' => '' );
    
  // Extra Header Settings
  $settings[] = array( 'slug' => 'shoestrap_extra_branding',            'default' => $shoestrap_extra_branding );
  $settings[] = array( 'slug' => 'shoestrap_header_loginlink',          'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_header_backgroundcolor',    'default' => '#0066bb' );
  $settings[] = array( 'slug' => 'shoestrap_header_textcolor',          'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_header_social',             'default' => '0' );
    
  // Layout Settings
  $settings[] = array( 'slug' => 'shoestrap_layout',                    'default' => 'mp' );
  $settings[] = array( 'slug' => 'shoestrap_aside_affix',               'default' => 'normal' );
  $settings[] = array( 'slug' => 'shoestrap_aside_width',               'default' => '4' );
  $settings[] = array( 'slug' => 'shoestrap_secondary_width',           'default' => '3' );
  $settings[] = array( 'slug' => 'shoestrap_sidebar_on_front',          'default' => 'hide' );
  $settings[] = array( 'slug' => 'shoestrap_responsive',                'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_fluid',                     'default' => '0' );
    
  // Color Settings
  $settings[] = array( 'slug' => 'shoestrap_background_color',          'default' => $background_color );
  $settings[] = array( 'slug' => 'shoestrap_buttons_color',             'default' => '#0066bb' );
  
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
  $settings[] = array( 'slug' => 'shoestrap_flat_buttons',              'default' => '' );
    
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
