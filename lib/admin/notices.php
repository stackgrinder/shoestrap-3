<?php

/*
 * Check the files permissions and echo a message for admins
 * if files are not writable.
 */
function shoestrap_check_files_permissions() {

  $files  = array(
    'variables'   =>  locate_template( 'assets/less/bootstrap/variables.less' ),
    'app'         =>  locate_template( 'assets/css/app.css' ),
    'appng'       =>  locate_template( 'assets/css/app-no-gradients.css' ),
    'appngnr'     =>  locate_template( 'assets/css/app-no-gradients-no-radius.css' ),
    'appnr'       =>  locate_template( 'assets/css/app-no-radius.css' ),
    'responsive'  =>  locate_template( 'assets/css/responsive.css' ),
  );
  
  foreach ( $files as $file ) {
    if ( !is_writable( $file ) )
      $notice = true;
    else
      $notice = false;
    
    if ( $notice == true ) {
      echo '<div>';
      foreach ( $files as $file ) {
        echo '<p>';
        echo $file . ' : ';
        if ( is_writable( $file ) )
          echo '<span style="color: #00aa00;">' .  __( 'Writable', 'shoestrap' );
        else
          echo '<span style="color: #aa0000;">' .  __( 'Not Writable', 'shoestrap' );
        
        echo '</p>';
      }
      echo '</div>';
    }
  }
}
add_action( 'admin_notices', 'shoestrap_check_files_permissions' );
