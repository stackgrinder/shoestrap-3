<?php

/*
 * Create the controls in the customizer.
 */
function shoestrap_register_controls( $wp_customize ){
  // Remove the default "background" control
  $wp_customize->remove_control( 'background_color' );
  
  // Determine if the user is using the advanced builder or not
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  // Turn off the advanced builder on multisite
  if ( is_multisite() && !is_super_admin() ) {
    $advanced_builder == '';
  }
  
  // Location of share element on single posts/pages/custom-post-types
  $select_controls[] = array( 'setting' => 'shoestrap_general_presets',         'label' => 'Styling Presets',                 'section' => 'shoestrap_general',     'priority' => 1,'choises' => array( 'bootstrap' => __( 'Bootstrap', 'shoestrap' ), 'google' => __( 'Google', 'shoestrap' ) ) );
  
  foreach ( $select_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'select',
      'priority'    => $control['priority'],
      'choices'     => $control['choises']
    ));
  }

 

  /*
   * The below lines are simply for better live previewing results.
   */
  $wp_customize -> get_setting( 'blogname' )                -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_title' )    -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_content' )  -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_cta_text' ) -> transport = 'postMessage';
  $wp_customize -> get_setting( 'shoestrap_hero_cta_text' ) -> transport = 'postMessage';
  $wp_customize -> get_setting( 'background_color' )        -> transport = 'postMessage';
}
add_action( 'customize_register', 'shoestrap_register_controls' );
