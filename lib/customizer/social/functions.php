<?php

function shoestrap_social_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_social',            'title' => __( 'Social Links', 'shoestrap' ),     'priority' => 8 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
}
add_action( 'customize_register', 'shoestrap_social_customizer' );
