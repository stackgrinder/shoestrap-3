<?php

/*
 * Adds sections to the customizer
 */
function shoestrap_footer_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_footer',            'title' => __( 'Footer', 'shoestrap' ),           'priority' => 10 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_footer_background_color',   'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_footer_text',               'default' => get_bloginfo( 'name' ) );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }
}
add_action( 'customize_register', 'shoestrap_footer_customizer' );
