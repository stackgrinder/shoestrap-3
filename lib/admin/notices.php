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
      echo '<div class="error">';
        echo '<h2>' . __( 'Important notice:', 'shoestrap' ) . '</h2>';
        echo '<p>' . __( 'The advanced mode of the Shoestrap theme requires some files in your theme folder to be writable by your webserver.', 'shoestrap' ) . '</p>';
        echo '<p>' . __( 'Please make sure that all files listed below are marked as Writable.', 'shoestrap' ) . '</p>';
        echo '<p>' . __( 'In case you see a file marked as "Not Writable", you will have to change its permissions and make it writable.', 'shoestrap' ) . '</p>';
        echo '<table class="table table-bordered" style="width: 100%;">';
      foreach ( $files as $file ) {
        echo '<tr><td style="border-bottom: 1px solid;">' . $file . ' : </td>';
        if ( is_writable( $file ) )
          echo '<td style="border-bottom: 1px solid;"><strong>' .  __( 'Writable', 'shoestrap' ) . '</strong></td>';
        else
          echo '<td style="border-bottom: 1px solid;"><strong>' .  __( 'Not Writable', 'shoestrap' ) . '</strong></td>';
        
        echo '</tr>';
      }
      echo '</table>';
      echo '<p>' . __( 'Once you make your changes please refresh this page. Once you see no more error messages you\'ll be able to use the developer tools.', 'shoestrap' ) . '</p>';
      echo '</div>';
    }
  }
}
add_action( 'admin_notices', 'shoestrap_check_files_permissions' );
