<?php

function shoestrap_social_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_social', 'title' => __( 'Social Links', 'shoestrap' ), 'priority' => 8 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_facebook_link',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_twitter_link',              'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_google_plus_link',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_pinterest_link',            'default' => '' );
  
  $settings[] = array( 'slug' => 'shoestrap_facebook_on_posts',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_twitter_on_posts',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_gplus_on_posts',            'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_linkedin_on_posts',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_pinterest_on_posts',        'default' => '' );
  
  $settings[] = array( 'slug' => 'shoestrap_single_social_text',        'default' => 'Share' );
  $settings[] = array( 'slug' => 'shoestrap_single_social_position',    'default' => 'none' );  
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_social_customizer' );
