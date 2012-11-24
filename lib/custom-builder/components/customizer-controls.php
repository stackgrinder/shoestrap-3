<?php

function shoestrap_register_builder_controls( $wp_customize ){
  
  $color_controls   = array();

  $color_controls[] = array( 'setting' => 'strp_cb_bodybackground',     'label' => 'Body Background',               'section' => 'colors',      'priority' => 1 );
  $color_controls[] = array( 'setting' => 'strp_cb_textcolor',          'label' => 'Text Color',                    'section' => 'colors',      'priority' => 2 );
  $color_controls[] = array( 'setting' => 'strp_cb_blue',               'label' => 'Blue',                          'section' => 'colors',      'priority' => 3 );
  $color_controls[] = array( 'setting' => 'strp_cb_bluedark',           'label' => 'Dark Blue',                     'section' => 'colors',      'priority' => 4 );
  $color_controls[] = array( 'setting' => 'strp_cb_green',              'label' => 'Green',                         'section' => 'colors',      'priority' => 5 );
  $color_controls[] = array( 'setting' => 'strp_cb_red',                'label' => 'Red',                           'section' => 'colors',      'priority' => 6 );
  $color_controls[] = array( 'setting' => 'strp_cb_yellow',             'label' => 'Yellow',                        'section' => 'colors',      'priority' => 7 );
  $color_controls[] = array( 'setting' => 'strp_cb_orange',             'label' => 'Orange',                        'section' => 'colors',      'priority' => 8 );
  $color_controls[] = array( 'setting' => 'strp_cb_pink',               'label' => 'Pink',                          'section' => 'colors',      'priority' => 9 );
  $color_controls[] = array( 'setting' => 'strp_cb_purple',             'label' => 'Purple',                        'section' => 'colors',      'priority' => 10 );
  $color_controls[] = array( 'setting' => 'strp_cb_linkcolor',          'label' => 'Links Color',                   'section' => 'colors',      'priority' => 11 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_primary',        'label' => 'Primary Buttons Color',         'section' => 'colors',      'priority' => 12 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_info',           'label' => 'Info Buttons Color',            'section' => 'colors',      'priority' => 13 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_success',        'label' => 'Success Buttons Color',         'section' => 'colors',      'priority' => 14 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_warning',        'label' => 'Warning Buttons Color',         'section' => 'colors',      'priority' => 15 );
  $color_controls[] = array( 'setting' => 'strp_cb_btn_danger',         'label' => 'Danger Buttons Color',          'section' => 'colors',      'priority' => 16 );
  $color_controls[] = array( 'setting' => 'strp_cb_navbar_background',  'label' => 'Navbar Background',             'section' => 'colors',      'priority' => 17 );
  
  $text_controls    = array();

  $text_controls[]  = array( 'setting' => 'strp_cb_sansfont',           'label' => 'Sans Font Family',              'section' => 'typography',  'priority' => 1 );
  $text_controls[]  = array( 'setting' => 'strp_cb_serifont',           'label' => 'Serif Font Family',             'section' => 'typography',  'priority' => 2 );
  $text_controls[]  = array( 'setting' => 'strp_cb_monofont',           'label' => 'Mono Font Family',              'section' => 'typography',  'priority' => 3 );
  $text_controls[]  = array( 'setting' => 'strp_cb_basefontsize',       'label' => 'Base Font Size',                'section' => 'typography',  'priority' => 4 );
  $text_controls[]  = array( 'setting' => 'strp_cb_baselineheight',     'label' => 'Base Line Height',              'section' => 'typography',  'priority' => 5 );
  $text_controls[]  = array( 'setting' => 'strp_cb_fontsizelarge',      'label' => 'Font Size Large',               'section' => 'typography',  'priority' => 6 );
  $text_controls[]  = array( 'setting' => 'strp_cb_fontsizesmall',      'label' => 'Font Size Small',               'section' => 'typography',  'priority' => 7 );
  $text_controls[]  = array( 'setting' => 'strp_cb_fontsizemini',       'label' => 'Font Size Mini',                'section' => 'typography',  'priority' => 8 );
  $text_controls[]  = array( 'setting' => 'strp_cb_baseborderradius',   'label' => 'Base Border Radius',            'section' => 'misc',        'priority' => 9 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridwidth_normal',   'label' => 'Grid Width - Normal',           'section' => 'layout',      'priority' => 10 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridwidth_wide',     'label' => 'Grid Width - Wide',             'section' => 'layout',      'priority' => 11 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridwidth_narrow',   'label' => 'Grid Width - Narrow',           'section' => 'layout',      'priority' => 12 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridgutter_normal',  'label' => 'Grid Gutter - Normal & Narrow', 'section' => 'layout',      'priority' => 13 );
  $text_controls[]  = array( 'setting' => 'strp_cb_gridgutter_wide',    'label' => 'Grid Gutter - Wide',            'section' => 'layout',      'priority' => 14 );

  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $controls['setting'],
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