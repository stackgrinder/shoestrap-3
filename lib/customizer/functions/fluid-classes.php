<?php

function shoestrap_fluid_body_classes( $context ) {
  $fluidity = get_theme_mod( 'shoestrap_responsive' );
  
  if ( $fluidity == 2 ) {
    $fluid = 1;
  } else {
    $fluid = 0;
  }
  
  if ( $fluid = 1 ) {
    if ( $context == 'row' ) {
      $class = 'row-fluid';
    }
    if ( $context == 'container' ) {
      $class = 'container-fluid';
    }
  } else {
    if ( $context == 'row' ) {
      $class = 'fluid';
    }
    if ( $context == 'container' ) {
      $class = 'container';
    }
  }
}