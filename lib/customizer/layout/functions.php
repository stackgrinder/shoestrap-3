<?php

/*
 * Adds sections to the customizer
 */
function shoestrap_layout_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_layout', 'title' => __( 'Layout', 'shoestrap' ), 'priority' => 2 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_layout',                    'default' => 'mp' );
  $settings[] = array( 'slug' => 'shoestrap_aside_width',               'default' => '4' );
  $settings[] = array( 'slug' => 'shoestrap_secondary_width',           'default' => '3' );
  $settings[] = array( 'slug' => 'shoestrap_sidebar_on_front',          'default' => 'hide' );
  $settings[] = array( 'slug' => 'shoestrap_responsive',                'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_fluid',                     'default' => '0' );
    
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  /*
   * Checkbox Controls
   */
  $checkbox_controls = array();
  // Fluid Layout
  $checkbox_controls[] = array( 'setting' => 'shoestrap_fluid',               'label' => 'Fluid Layout',                          'section' => 'shoestrap_layout',          'priority' => 7 );

  /*
   * Dropdown (Select) Controls
   */
  $select_controls = array();
  // Responsive or fixed-width layout
  $select_controls[] = array( 'setting' => 'shoestrap_responsive',              'label' => 'Responsive / Fixed-width',        'section' => 'shoestrap_layout',      'priority' => 1, 'choises' => array( '1' => __( 'Responsive', 'shoestrap' ), '0' => __( 'Fixed-Width', 'shoestrap' ) ) );
  // Layout (sidebars and main area arrangement)
  $select_controls[] = array( 'setting' => 'shoestrap_layout',                  'label' => 'Layout',                          'section' => 'shoestrap_layout',      'priority' => 2, 'choises' => array( 'm' => __( 'Main only', 'shoestrap' ), 'mp' => __( 'Main-Primary', 'shoestrap' ), 'pm' => __( 'Primary-Main', 'shoestrap' ), 'ms' => __( 'Main-Secondary', 'shoestrap' ), 'sm' => __( 'Secondary-Main', 'shoestrap' ), 'mps' => __( 'Main-Primary-Secondary', 'shoestrap' ), 'msp' => __( 'Main-Secondary-Primary', 'shoestrap' ), 'pms' => __( 'Primary-Main-Secondary', 'shoestrap' ), 'psm' => __( 'Primary-Secondary-Main', 'shoestrap' ), 'smp' => __( 'Secondary-Main-Primary', 'shoestrap' ), 'spm' => __( 'Secondary-Primary-Main', 'shoestrap' ) ) );
  // Main sidebar width (based on a 12-column bootstrap layout)
  $select_controls[] = array( 'setting' => 'shoestrap_aside_width',             'label' => 'Primary Sidebar Width',           'section' => 'shoestrap_layout',      'priority' => 3, 'choises' => array( '2' => '2/12', '3' => '3/12', '4' => '4/12', '5' => '5/12', '6' => '6/12' ) );
  // Secondary sidebar width (based on a 12-column bootstrap layout)
  $select_controls[] = array( 'setting' => 'shoestrap_secondary_width',         'label' => 'Secondary Sidebar Width',         'section' => 'shoestrap_layout',      'priority' => 5, 'choises' => array( '2' => '2/12', '3' => '3/12', '4' => '4/12' ) );
  // Show/Hide sidebars on the homepage
  $select_controls[] = array( 'setting' => 'shoestrap_sidebar_on_front',        'label' => 'Show sidebars on the Home Page',  'section' => 'shoestrap_layout',      'priority' => 6, 'choises' => array( 'show' => __( 'Show', 'shoestrap' ), 'hide' => __( 'Hide', 'shoestrap' ) ) );

  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }
  
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

}
add_action( 'customize_register', 'shoestrap_layout_customizer' );

function shoestrap_fluid_body_classes( $context ) {
  
  if ( get_theme_mod( 'shoestrap_fluid' ) == 1 ) {
    if ( $context == 'row' ) {
      $class = 'row-fluid';
    }
    if ( $context == 'container' ) {
      $class = 'container-fluid';
    }
  } else {
    if ( $context == 'row' ) {
      $class = 'row';
    }
    if ( $context == 'container' ) {
      $class = 'container';
    }
  }
  
  echo $class;
}
