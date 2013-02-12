<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_general_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_general', 'title' => __( 'General', 'shoestrap' ), 'priority' => 1 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
  
  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_general_no_gradients',  'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_general_no_radius',     'default' => '' );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Checkbox Controls
  $checkbox_controls = array();
  $checkbox_controls[] = array( 'setting' => 'shoestrap_general_no_gradients','label' => 'No Gradients',    'section' => 'shoestrap_general',  'priority' => 1 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_general_no_radius',   'label' => 'No Border Radius','section' => 'shoestrap_general',  'priority' => 2 );

  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }
  
}
add_action( 'customize_register', 'shoestrap_general_customizer' );
