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
  
  /*
   * Color Controls
   */
  $color_controls   = array();
  
  // Footer Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_footer_background_color','label' => 'Footer Background Color',         'section' => 'shoestrap_footer',  'priority' => 1 );
  
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
  
  // Location of share element on single posts/pages/custom-post-types
  $select_controls[] = array( 'setting' => 'shoestrap_single_social_position',  'label' => 'Location of social shares',       'section' => 'shoestrap_social',      'priority' => 10,'choises' => array( 'top' => __( 'Top', 'shoestrap' ), 'bottom' => __( 'Bottom', 'shoestrap' ), 'both' => __( 'Both', 'shoestrap' ), 'none' => __( 'None', 'shoestrap' ) ) );
  // Location of share element on single posts/pages/custom-post-types
  $select_controls[] = array( 'setting' => 'shoestrap_general_presets',         'label' => 'Styling Presets',                 'section' => 'shoestrap_general',     'priority' => 1,'choises' => array( 'bootstrap' => __( 'Bootstrap', 'shoestrap' ), 'google' => __( 'Google', 'shoestrap' ) ) );
  
  // Text Controls
  $text_controls = array();
  // Link of the site's facebook page
  $text_controls[]  = array( 'setting' => 'shoestrap_facebook_link',    	'label' => 'Facebook Page Link',          'section' => 'shoestrap_social',      'priority' => 1 );
  // Link or username of the site's twitter profile
  $text_controls[]  = array( 'setting' => 'shoestrap_twitter_link',     	'label' => 'Twitter URL or @username',    'section' => 'shoestrap_social',      'priority' => 2 );
  // Google Plus Link
  $text_controls[]  = array( 'setting' => 'shoestrap_google_plus_link', 	'label' => 'Google+ Profile Link',        'section' => 'shoestrap_social',      'priority' => 3 );
  // Pinterest Link
  $text_controls[]  = array( 'setting' => 'shoestrap_pinterest_link',   	'label' => 'Pinterest Profile Link',      'section' => 'shoestrap_social',      'priority' => 4 );
  // Single Social Text
  $text_controls[]  = array( 'setting' => 'shoestrap_single_social_text',	'label' => 'Single Social Text',   		    'section' => 'shoestrap_social',      'priority' => 10 );
  // Footer Text
  $text_controls[]  = array( 'setting' => 'shoestrap_footer_text',        'label' => 'Footer Alternative Text',     'section' => 'shoestrap_footer',      'priority' => 2 );
  
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

/*
 * ADVANCED
 * 
 * The advanced section allow users to enter their own css and/or scripts
 * and place them either in the head or the footer of the page.
 * These are textarea controls that we created in the beginning of this file.
 * 
 * CAUTION:
 * Using this can be potentially dangerous for your site.
 * Any content you enter here will be echoed with minimal checks 
 * so you should be careful of your code.
 * 
 * To add css rules you must write <style>....your styles here...</style>
 * To add a script you should write <script>....your styles here...</script>
 * 
 */
 
  // Header scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_head', array(
    'label'       => 'Header Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_head',
    'priority'    => 1,
  )));

  // Footer scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_footer', array(
    'label'       => 'Footer Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_footer',
    'priority'    => 2,
  )));

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
