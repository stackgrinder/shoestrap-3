<?php

function shoestrap_navbar_widget_area_class() {
  $str = '';
  if ( is_active_sidebar( 'navbar-slide-down-1' ) )
    $str .= '1';

  if ( is_active_sidebar( 'navbar-slide-down-2' ) )
    $str .= '2';

  if ( is_active_sidebar( 'navbar-slide-down-3' ) )
    $str .= '3';

  if ( is_active_sidebar( 'navbar-slide-down-4' ) )
    $str .= '4';
  
  $strlen = strlen( $str );
  
  if ( $strlen > 0 ) {
    $span = 12 / $strlen;
  } else {
    $span = 12;
  }
  
  return $span;
}

function shoestrap_navbar_slidedown_content() {
  echo '<div class="container">';
  $widgetareaclass = 'span' . shoestrap_navbar_widget_area_class();
  
  dynamic_sidebar('navbar-slide-down-top');
  
  echo '<div class="row">';
  if ( is_active_sidebar( 'navbar-slide-down-1' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-1');
    echo '</div>';
    
  if ( is_active_sidebar( 'navbar-slide-down-2' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-2');
    echo '</div>';
    
  if ( is_active_sidebar( 'navbar-slide-down-3' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-3');
    echo '</div>';
    
  if ( is_active_sidebar( 'navbar-slide-down-4' ) )
    echo '<div class="' . $widgerareaclass . '">';
    dynamic_sidebar('navbar-slide-down-4');
    echo '</div>';
    
  echo '</div></div>';
}
add_action( 'shoestrap_branding', 'shoestrap_navbar_slidedown_content', 1 );
