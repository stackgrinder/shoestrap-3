<?php

/*
 * Adds sections to the customizer
 */
function shoestrap_custom_builder_register_sections( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'layout',      'title' => __( 'Layout', 'shoestrap' ),           'priority' => 4 );
  $sections[] = array( 'slug' => 'typography',  'title' => __( 'Typography', 'shoestrap' ),       'priority' => 5 );
  $sections[] = array( 'slug' => 'misc',        'title' => __( 'Misc', 'shoestrap' ),             'priority' => 6 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
}
add_action( 'customize_register', 'shoestrap_custom_builder_register_sections' );
