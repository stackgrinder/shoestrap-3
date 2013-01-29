<?php

function shoestrap_primary_navbar_login_link() {
    
  $primary_login_link   = get_theme_mod( 'shoestrap_header_loginlink' );
  
  if ( is_user_logged_in() ) {
    $link  = wp_logout_url( get_permalink() );
    $label = __( 'Logout', 'shoestrap' );
  }
  else {
    $link  = wp_login_url( get_permalink() );
    $label = __( 'Login/Register', 'shoestrap' );
  }
  $content = '<ul class="pull-right nav nav-collapse">';
  $content .= '<li class="dropdown">';
  $content .= '<a href="#" class="pull-right dropdown-toggle" data-toggle="dropdown">';
  $content .= '<i class="icon-user"></i><b class="caret"></b>';
  $content .= '<ul class="dropdown-menu">';
  $content .= '<li>';
  $content .= '<a href="' . $link . '">' . $label . '</a>';
  $content .= '</li>';
  $content .= do_action( 'shoestrap_login_link_additions' );
  $content .= '</ul>';
  $content .= '</li></ul>';
  
  if ( $primary_login_link == 1 ) {
    echo $content;
  }
}
add_action( 'shoestrap_nav_top_right', 'shoestrap_primary_navbar_login_link', 11 );

function shoestrap_secondary_navbar_login_link() {
    
  $secondary_login_link = get_theme_mod( 'shoestrap_navbar2_loginlink' );
  
  if ( is_user_logged_in() ) {
    $link  = wp_logout_url( get_permalink() );
    $label = __( 'Logout', 'shoestrap' );
  }
  else {
    $link  = wp_login_url( get_permalink() );
    $label = __( 'Login/Register', 'shoestrap' );
  }
  $content = '<ul class="pull-right nav nav-collapse"><li><a class="pull-right login-link" href="' . $link . '">';
  $content .= '<i class="icon-user"></i> ' . $label;
  $content .= '</a></li></ul>';
  
  if ( $secondary_login_link != 0 ) {
    echo $content;
  }
}
add_action( 'shoestrap_secondary_nav_top_right', 'shoestrap_secondary_navbar_login_link', 11 );
