<?php

function shoestrap_typography_register_sections( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_typography',        'title' => __( 'Typography', 'shoestrap' ),       'priority' => 7 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  
  // Color Settings
  $settings[] = array( 'slug' => 'shoestrap_text_color',                'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_link_color',                'default' => '#0088cc' );
  $settings[] = array( 'slug' => 'shoestrap_google_webfonts',           'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_webfonts_weight',           'default' => '400' );
  $settings[] = array( 'slug' => 'shoestrap_webfonts_character_set',    'default' => 'latin' );
  $settings[] = array( 'slug' => 'shoestrap_webfonts_assign',           'default' => 'all' );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_typography_register_sections' );
