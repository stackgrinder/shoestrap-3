<?php

/*
 * Adds the Administration page for Shoestrap.
 * This page will hold any option for the shoestrap theme
 * as well as any shoestrap addon plugins.
 */
add_action( 'admin_menu', 'shoestrap_admin_page' );
function shoestrap_admin_page() {
  add_theme_page( 'Shoestrap', 'Shoestrap', 'manage_options', 'shoestrap_options', 'shoestrap_admin_page_content' );
}

/*
 * The content of the administration page for Shoestrap.
 * We add an action here called 'shoestrap_admin_content'
 * that all other plugins and addons can hook into.
 */
function shoestrap_admin_page_content() { ?>
  <div class="wrap">
    <h2><?php _e( 'Shoestrap Administration Page' ); ?></h2>
    <div id="icon-themes" class="icon32"></div>
    <h2 class="nav-tab-wrapper">
    	<?php do_action( 'shoestrap_admin_main_nav_tab' ); ?>
    </h2>
    <?php do_action( 'shoestrap_admin_content' ); ?>
  </div>
  <?php
}

/*
* Notice for 3rd version
*/
add_action('admin_notices', 'shoestrap_new_version_notice');
function shoestrap_new_version_notice() {
  global $current_user ;
  $user_id = $current_user->ID;
  /* Check that the user hasn't already clicked to ignore the message */
  if ( ! get_user_meta($user_id, 'shoestrap_ignore_notice') ) {
    echo "<div class='updated'><p><h3>Theme Notice</h3><h4>We would like to inform you about the release of <a href='http://shoestrap.org/downloads/shoestrap-3/' target='_blank'>Shoestrap 3</a></h4><div>The new theme is a complete re-write of Shoestrap, using Bootstrap 3 and many many more. As the migration from current theme would possibly cause lots of problems, <strong>Shoestrap 3</strong> won't be an upgrade but a new start, causing <a href='http://shoestrap.org/downloads/shoestrap/' target='_blank'>Shoestrap</a> to become deprecated after a while. The <a href='http://shoestrap.org/forums/forum/shoestrap/' target='_blank'>Shoestrap Support Forum</a> will continue to assist you with any issue you may have, considering <strong>both</strong> versions.</div><br/><div><i>The Shoestrap team</i></div><br/>";
    printf(__('<a href="%1$s">Hide Notice</a>'), '?shoestrap_nag_ignore=0');
    echo "</p></div>";
  }
}
add_action('admin_init', 'shoestrap_nag_ignore');
function shoestrap_nag_ignore() {
  global $current_user;
  $user_id = $current_user->ID;
  /* If user clicks to ignore the notice, add that to their user meta */
  if ( isset($_GET['shoestrap_nag_ignore']) && '0' == $_GET['shoestrap_nag_ignore'] ) {
    add_user_meta($user_id, 'shoestrap_ignore_notice', 'true', true);
  }
}