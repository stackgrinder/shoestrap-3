<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_buttons_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_buttons', 'title' => __( 'Buttons', 'shoestrap' ), 'priority' => 9 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_buttons_color', 'default' => '#0066bb' );
  $settings[] = array( 'slug' => 'shoestrap_flat_buttons',  'default' => '' );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Buttons Color
  $color_controls   = array();
  $color_controls[] = array( 'setting' => 'shoestrap_buttons_color', 'label' => 'Buttons Color', 'section' => 'shoestrap_buttons', 'priority' => 4 );
  
  /*
   * Checkbox Controls
   */
  $checkbox_controls = array();
  // Flat buttons on/off
  $checkbox_controls[] = array( 'setting' => 'shoestrap_flat_buttons', 'label' => 'Flat Buttons (no gradients)', 'section' => 'shoestrap_buttons', 'priority' => 9 );

  
  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority'],
      )
    ));
  }

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
add_action( 'customize_register', 'shoestrap_buttons_customizer' );
