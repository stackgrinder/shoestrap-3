<?php

function shoestrap_phpless(){
  
  $shoestrap_responsive = get_theme_mod( 'shoestrap_responsive' );
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  
  if ( $advanced_builder == 1 ) {
    if ( !class_exists( 'lessc' ) ) {
      require_once locate_template( '/lib/less_compiler/lessc.inc.php' );
    }
    $less = new lessc;
    // $less->setFormatter( "compressed" );
    
    if ( $shoestrap_responsive == '0' ) {
      $inputFile  = locate_template( 'assets/css/app-fixed.less' );
      $outputFile = locate_template( 'assets/css/app-fixed.css' );
    } else {
      $inputFile  = locate_template( 'assets/css/app-responsive.less' );
      $outputFile = locate_template( 'assets/css/app-responsive.css' );
    }
  
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
  }
}
add_action('wp', 'shoestrap_phpless');

