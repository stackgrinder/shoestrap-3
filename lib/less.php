<?php

function shoestrap_phpless( $inputFile, $outputFile ) {
  
  $shoestrap_responsive = get_theme_mod( 'shoestrap_responsive' );
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  
  // if ( $advanced_builder == 1 ) {
    if ( !class_exists( 'lessc' ) ) {
      require_once locate_template( '/lib/less_compiler/lessc.inc.php' );
    }
    $less = new lessc;
    // $less->setFormatter( "compressed" );
    
    $less = new lessc;
  
    // create a new cache object, and compile
    $cache = $less -> cachedCompile( $inputFile );
  
    file_put_contents( $outputFile, $cache["compiled"] );
  
    // the next time we run, write only if it has updated
    $last_updated = $cache['updated'];
    $cache = $less -> cachedCompile( $cache );
    if ( $cache['updated'] > $last_updated ) {
      file_put_contents( $outputFile, $cache['compiled'] );
    }
  // }
}

function shoestrap_phpless_bulk() {

  $app_less         = locate_template( 'assets/css/app.less' );
  $app_css          = locate_template( 'assets/css/app.css' );

  $responsive_less  = locate_template( 'assets/css/responsive.less' );
  $responsive_css   = locate_template( 'assets/css/responsive.css' );
  
  shoestrap_phpless( $app_less, $app_css );
  shoestrap_phpless( $responsive_less, $responsive_css );
}
add_action('wp', 'shoestrap_phpless_bulk');
