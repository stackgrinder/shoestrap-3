<?php

/*
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 */

if ( class_exists( 'ReduxFramework' ) ) :
	function shoestrap_redux_init() {
	
	

	$args = array();

	// ** PLEASE PLEASE for production use your own key! **

	/*
	 * Remove the link until Redux is updated on wp.org
	 */
	//Setup custom links in the footer for share icons
	 // $args['share_icons'][] = array(
	 //  'url'  => 'https://github.com/shoestrap/shoestrap',
	 //  'title' => 'Fork Me on GitHub',
	 //  'icon'   => 'el-icon-github'
	 // );

	// Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
	$args['opt_name']               = SHOESTRAP_OPT_NAME;
	$args['customizer']             = false;
	$args['forced_edd_license']     = true;
	$args['google_api_key']         = 'AIzaSyCDiOc36EIOmwdwspLG3LYwCg9avqC5YLs';
	$args['global_variable']        = 'redux';
	$args['default_show']           = true;
	$args['default_mark']           = '*';
	$args['page_slug']              = SHOESTRAP_OPT_NAME;
	$theme                          = wp_get_theme();
	$args['display_name']           = $theme->get( 'Name' );
	$args['menu_title']             = __( 'Theme Options', 'shoestrap' );
	$args['display_version']        = $theme->get( 'Version' );    
	$args['page_position']          = 99;
	$args['dev_mode']               = false;
	$args['page_type']              = 'submenu';
	$args['page_parent']            = 'themes.php';

	$args['help_tabs'][] = array(
		'id'      => 'redux-options-1',
		'title'   => __( 'Theme Information 1', 'shoestrap' ),
		'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'shoestrap' )
	);
	$args['help_tabs'][] = array(
		'id'      => 'redux-options-2',
		'title'   => __( 'Theme Information 2', 'shoestrap' ),
		'content' => __( '<p>This is the tab content, HTML is allowed. Tab2</p>', 'shoestrap' )
	);

	//Set the Help Sidebar for the options page - no sidebar by default                   
	$args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'shoestrap' );

	$sections = array();
	$sections = apply_filters( 'shoestrap_add_sections', $sections );
  global $ReduxFramework;
	$ReduxFramework = new ReduxFramework( $sections, $args );

	if ( !empty( $redux['dev_mode'] ) && $redux['dev_mode'] == 1 ) :
		$ReduxFramework->args['dev_mode']     = true;
		$ReduxFramework->args['system_info']  = true;
	endif;
}
add_action('init', 'shoestrap_redux_init');
endif;

// make sure we only have one instance
if ( !class_exists( 'ShoestrapCustomize' ) ) :

class ShoestrapCustomize extends ReduxFramework {
  private $parent;

  public function __construct($parent) {
    $this->parent = $parent;
  }

  public function map_options_2_less() {
    
    $shoestrap_options = [];
    $i=0;

    foreach( $this->parent->sections as $key => $section ) {

      foreach ( $section['fields'] as $key => $option ) {

        $parts = explode( "_", $option['id']);

        if ( !isset($option['customizer']) || $option['customizer'] === false ) {
          continue;
        }
        if ( count($parts) < 2 ) continue; //for right now skip a bunch of options like logo (single word options)
        $re1 = '^(.*?)'; 
        $re2 = '_';
        if ( $c = preg_match( "/" . $re1 . $re2 . "/is", $option['id'], $matches ) ) {
          $var_type = $matches[1];
        }
        switch( $var_type ) {
          case 'color':
            $shoestrap_options[$option['id']] = '@' . $parts[1] . '-' .  $parts[2];
            break;
          case 'navbar':
           switch( end($parts) ) {
            case 'bg':
              $shoestrap_options[$option['id']] = '@' . $var_type . '-default-bg';
              break;
           }
           break;
          case 'footer':
            switch( end($parts) ) {
            case 'color':
               $shoestrap_options[$option['id']] = 'footer.content-info{color';
               break;
            case 'background':
              $shoestrap_options[$option['id']] =  'footer.content-info{background';
              break;
            }
          break;
          case 'header':
            switch( end($parts) ) {
            case 'color':
              $shoestrap_options[$option['id']] = '@jumbotron-color';
            break;
            }
          break;
        }
      }
    }
    return $shoestrap_options;
  }
}
endif;
/**
 * Adds tracking parameters for Redux settings. Outside of the main class as the class could also be in use in other plugins.
 *
 * @param array $options
 * @return array
 */
function shoestrap_tracking_additions( $options ) {
	$opt = array();
	// This is a Shoestrap specific key. Please do not remove or use in any product
	// that is not based on Shoestrap.
	$options['3a91ce2622596f6b4c67e27a4a2dc313'] = array(
		'title'=>'Shoestrap'
	);

	return $options;
}
add_filter( 'redux/tracking/developer', 'shoestrap_tracking_additions' );
