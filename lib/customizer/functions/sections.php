<?php

/*
 * Adds sections to the customizer
 */
function shoestrap_register_sections( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_logo',              'title' => __( 'Logo', 'shoestrap' ),             'priority' => 1 );
  $sections[] = array( 'slug' => 'shoestrap_layout',            'title' => __( 'Layout', 'shoestrap' ),           'priority' => 2 );
  $sections[] = array( 'slug' => 'shoestrap_extra_header',      'title' => __( 'Extra Header', 'shoestrap' ),     'priority' => 5 );
  $sections[] = array( 'slug' => 'shoestrap_social',            'title' => __( 'Social Links', 'shoestrap' ),     'priority' => 8 );
  $sections[] = array( 'slug' => 'shoestrap_advanced',          'title' => __( 'Advanced', 'shoestrap' ),         'priority' => 9 );
  $sections[] = array( 'slug' => 'shoestrap_footer',            'title' => __( 'Footer', 'shoestrap' ),           'priority' => 10 );
  $sections[] = array( 'slug' => 'shoestrap_general',           'title' => __( 'Presets', 'shoestrap' ),          'priority' => 15 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
}
add_action( 'customize_register', 'shoestrap_register_sections' );
