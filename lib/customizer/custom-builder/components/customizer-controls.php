<?php

function shoestrap_register_builder_controls( $wp_customize ){
  // Determine if the user is using the advanced builder or not
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  if ( is_multisite() && !is_super_admin() ) { $advanced_builder == ''; }

  $color_controls   = array();
  $text_controls    = array();
  
  // Only add the following settings when advanced builder is ON
  $color_controls[] = array( 'setting' => 'strp_cb_textcolor',          'label' => 'Text Color',                    'section' => 'colors',      'priority' => 22 );
  $color_controls[] = array( 'setting' => 'strp_cb_linkcolor',          'label' => 'Links Color',                   'section' => 'colors',      'priority' => 31 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_primary',        'label' => 'Primary Buttons Color',         'section' => 'colors',      'priority' => 32 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_info',           'label' => 'Info Buttons Color',            'section' => 'colors',      'priority' => 33 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_success',        'label' => 'Success Buttons Color',         'section' => 'colors',      'priority' => 34 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_warning',        'label' => 'Warning Buttons Color',         'section' => 'colors',      'priority' => 35 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_danger',         'label' => 'Danger Buttons Color',          'section' => 'colors',      'priority' => 36 );
  $color_controls[] = array( 'setting' => 'strp_cb_navbar_background',  'label' => 'Navbar Background',             'section' => 'colors',      'priority' => 37 );
  
  $text_controls[]  = array( 'setting' => 'strp_cb_sansfont',           'label' => 'Sans Font Family',              'section' => 'shoestrap_typography',  'priority' => 21 );
  $text_controls[]  = array( 'setting' => 'strp_cb_serifont',           'label' => 'Serif Font Family',             'section' => 'shoestrap_typography',  'priority' => 22 );
  $text_controls[]  = array( 'setting' => 'strp_cb_monofont',           'label' => 'Mono Font Family',              'section' => 'shoestrap_typography',  'priority' => 23 );
  $text_controls[]  = array( 'setting' => 'strp_cb_basefontsize',       'label' => 'Base Font Size',                'section' => 'shoestrap_typography',  'priority' => 24 );
  $text_controls[]  = array( 'setting' => 'strp_cb_baselineheight',     'label' => 'Base Line Height',              'section' => 'shoestrap_typography',  'priority' => 25 );
  $text_controls[]  = array( 'setting' => 'strp_cb_fontsizelarge',      'label' => 'Font Size Large',               'section' => 'shoestrap_typography',  'priority' => 26 );
  $text_controls[]  = array( 'setting' => 'strp_cb_fontsizesmall',      'label' => 'Font Size Small',               'section' => 'shoestrap_typography',  'priority' => 27 );
  $text_controls[]  = array( 'setting' => 'strp_cb_fontsizemini',       'label' => 'Font Size Mini',                'section' => 'shoestrap_typography',  'priority' => 28 );
  $text_controls[]  = array( 'setting' => 'strp_cb_baseborderradius',   'label' => 'Base Border Radius',            'section' => 'shoestrap_advanced',    'priority' => 29 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridwidth_normal',   'label' => 'Grid Width - Normal',           'section' => 'shoestrap_layout',      'priority' => 30 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridwidth_wide',     'label' => 'Grid Width - Wide',             'section' => 'shoestrap_layout',      'priority' => 31 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridwidth_narrow',   'label' => 'Grid Width - Narrow',           'section' => 'shoestrap_layout',      'priority' => 32 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridgutter_normal',  'label' => 'Grid Gutter - Normal & Narrow', 'section' => 'shoestrap_layout',      'priority' => 33 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridgutter_wide',    'label' => 'Grid Gutter - Wide',            'section' => 'shoestrap_layout',      'priority' => 34 );

  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => $control['label'],
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority'],
      )
    ));
  }
  foreach ( $text_controls as $control) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'text',
      'priority'    => $control['priority']
    ));
  }
}
add_action( 'customize_register', 'shoestrap_register_builder_controls' );
