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
}
add_action( 'customize_register', 'shoestrap_footer_customizer' );
