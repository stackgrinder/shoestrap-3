<?php

add_action( 'admin_init', 'shoestrap_dev_mode_register_options', 11 );
function shoestrap_dev_mode_register_options() {
  // creates our settings in the options table
  register_setting( 'shoestrap_dev_mode', 'shoestrap_dev_mode' );
}

add_action( 'shoestrap_admin_content', 'shoestrap_dev_mode_toggle', 15 );
function shoestrap_dev_mode_toggle() {
  $shoestrap_dev_mode = get_option( 'shoestrap_dev_mode' );

  ?>
  <div class="postbox">
    <h3 class="hndle" style="padding: 7px 10px;"><span><?php _e( 'Developer Mode', 'shoestrap' ); ?></span></h3>
    <div class="inside">

      <form method="post" action="options.php">
        <?php settings_fields( 'shoestrap_dev_mode' ); ?>

        <h4><?php _e( 'Enable Developer Mode', 'shoestrap' ); ?></h4>
        <input id="shoestrap_dev_mode" name="shoestrap_dev_mode" type="checkbox" value="1" <?php checked('1', get_option('shoestrap_dev_mode')); ?> />
        <label class="description" for="shoestrap_dev_mode">
          <?php _e( 'Enable Developer Mode', 'shoestrap' ); ?>
        </label>
        <p><?php _e( 'When you enable the developer mode, the LESS compiler will detect any changes to your less files and re-compile the css files accordingly.', 'shoestrap' ); ?></p>
        <p><?php _e( 'Once you enable the developer mode, you will also be able to enable the', 'shoestrap' ); ?><strong><?php _e( 'Advanced Customizer', 'shoestrap' ); ?></strong></p>
        <?php submit_button(); ?>
      </form>
    </div>
  </div>
  <?php
}
