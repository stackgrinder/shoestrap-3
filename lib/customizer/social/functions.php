<?php

function shoestrap_social_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_social', 'title' => __( 'Social Links', 'shoestrap' ), 'priority' => 8 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_facebook_link',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_twitter_link',              'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_google_plus_link',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_pinterest_link',            'default' => '' );
  
  $settings[] = array( 'slug' => 'shoestrap_facebook_on_posts',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_twitter_on_posts',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_gplus_on_posts',            'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_linkedin_on_posts',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_pinterest_on_posts',        'default' => '' );
  
  $settings[] = array( 'slug' => 'shoestrap_single_social_text',        'default' => 'Share' );
  $settings[] = array( 'slug' => 'shoestrap_single_social_position',    'default' => 'none' );  
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  $checkbox_controls = array();
  // Share Buttons on posts/pages/custom post types: Facebook
  $checkbox_controls[] = array( 'setting' => 'shoestrap_facebook_on_posts',   'label' => 'Share Buttons on Posts: Facebook',      'section' => 'shoestrap_social',      'priority' => 5 );
  // Share Buttons on posts/pages/custom post types: Twitter
  $checkbox_controls[] = array( 'setting' => 'shoestrap_twitter_on_posts',    'label' => 'Share Buttons on Posts: Twitter',       'section' => 'shoestrap_social',      'priority' => 6 );
  // Share Buttons on posts/pages/custom post types: Google+
  $checkbox_controls[] = array( 'setting' => 'shoestrap_gplus_on_posts',      'label' => 'Share Buttons on Posts: Google Plus',   'section' => 'shoestrap_social',      'priority' => 7 );
  // Share Buttons on posts/pages/custom post types: LinkedIn
  $checkbox_controls[] = array( 'setting' => 'shoestrap_linkedin_on_posts',   'label' => 'Share Buttons on Posts: Linkedin',      'section' => 'shoestrap_social',      'priority' => 8 );
  // Share Buttons on posts/pages/custom post types: Pinterest
  $checkbox_controls[] = array( 'setting' => 'shoestrap_pinterest_on_posts',  'label' => 'Share Buttons on Posts: Pinterest',     'section' => 'shoestrap_social',      'priority' => 9 );

  $select_controls = array();
  // Location of share element on single posts/pages/custom-post-types
  $select_controls[] = array( 'setting' => 'shoestrap_single_social_position',  'label' => 'Location of social shares',       'section' => 'shoestrap_social',      'priority' => 10,'choises' => array( 'top' => __( 'Top', 'shoestrap' ), 'bottom' => __( 'Bottom', 'shoestrap' ), 'both' => __( 'Both', 'shoestrap' ), 'none' => __( 'None', 'shoestrap' ) ) );

  // Text Controls
  $text_controls = array();
  // Link of the site's facebook page
  $text_controls[]  = array( 'setting' => 'shoestrap_facebook_link',      'label' => 'Facebook Page Link',          'section' => 'shoestrap_social',      'priority' => 1 );
  // Link or username of the site's twitter profile
  $text_controls[]  = array( 'setting' => 'shoestrap_twitter_link',       'label' => 'Twitter URL or @username',    'section' => 'shoestrap_social',      'priority' => 2 );
  // Google Plus Link
  $text_controls[]  = array( 'setting' => 'shoestrap_google_plus_link',   'label' => 'Google+ Profile Link',        'section' => 'shoestrap_social',      'priority' => 3 );
  // Pinterest Link
  $text_controls[]  = array( 'setting' => 'shoestrap_pinterest_link',     'label' => 'Pinterest Profile Link',      'section' => 'shoestrap_social',      'priority' => 4 );
  // Single Social Text
  $text_controls[]  = array( 'setting' => 'shoestrap_single_social_text', 'label' => 'Single Social Text',          'section' => 'shoestrap_social',      'priority' => 10 );

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
add_action( 'customize_register', 'shoestrap_social_customizer' );
