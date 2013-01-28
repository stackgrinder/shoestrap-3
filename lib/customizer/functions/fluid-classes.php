<?php

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
