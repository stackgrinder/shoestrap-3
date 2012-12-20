<?php

add_action( 'admin_init', 'shoestrap_dev_mode_register_options', 11 );
function shoestrap_dev_mode_register_options() {
  // creates our settings in the options table
  register_setting( 'shoestrap_advanced', 'shoestrap_dev_mode' );
  register_setting( 'shoestrap_advanced', 'shoestrap_advanced_compiler' );
}

add_action( 'shoestrap_admin_content', 'shoestrap_dev_mode_toggle', 15 );
function shoestrap_dev_mode_toggle() {
  $shoestrap_dev_mode = get_option( 'shoestrap_dev_mode' );
  $advanced     = get_option( 'shoestrap_advanced_compiler' );
  $current_url  = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $customizeurl = add_query_arg( 'url', urlencode( $current_url ), wp_customize_url() );
  if ( get_option( 'shoestrap_dev_mode' ) != 1 ) {
    $disabled = 'disabled';
  }

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
        <p>
        <?php _e( 'The actual compiling is done using leafo\'s ', 'shoestrap' ); ?>
        <a href="leafo.net/lessphp/"><?php _e( 'PHP-LESS compiler', 'shoestrap' ); ?></a>
        </p>
        <?php _e( 'Before enabling this option, please make sure that you webserver can write to the', 'shoestrap' ); ?>
        <code>assets/css/app.css</code> <?php _e( 'and', 'shoestrap' ); ?> <code>assets/css/responsive.css</code>
        <?php _e( 'files', 'shoestrap' ); ?>
        <p>
        <p><?php _e( 'Once you enable the developer mode, you will also be able to enable the', 'shoestrap' ); ?> <strong><?php _e( 'Advanced Customizer', 'shoestrap' ); ?></strong></p>

        <div class="shoestrap_advanced_compiler">
          <?php if ( get_option( 'shoestrap_dev_mode' ) != 1 ) { ?>
            <style>
              div.shoestrap_advanced_compiler{
                opacity: 0.5;
              }
            </style>
          <?php } ?>
          <hr />
          <?php settings_fields( 'shoestrap_advanced' ); ?>
      
          <input id="shoestrap_advanced_compiler" name="shoestrap_advanced_compiler" <?php echo $disabled; ?> type="checkbox" value="1" <?php checked('1', get_option('shoestrap_advanced_compiler')); ?> />
          <label class="description" for="shoestrap_advanced_compiler">
            <?php _e( 'Enable the advanced customizer', 'shoestrap' ); ?>
          </label>
          <p>
          <?php _e( 'The advanced customizer allows you to change aspects of your theme that are not otherwise customizable.', 'shoestrap' ); ?>
          </p>
          <?php _e( 'Before enabling this option, please make sure that you webserver can write to the', 'shoestrap' ); ?>
          <code>assets/less/variables.less</code>
          <?php _e( 'file', 'shoestrap' ); ?>
          <p>
            <?php _e( 'After you enable the advanced customizer, you\'ll be able to visit the', 'shoestrap' ); ?>
            <a href="<?php  echo $customizeurl ?>"> <?php _e( 'Customizer', 'shoestrap' ); ?> </a>
            <?php _e( 'to change bootstrap\'s default options', 'shoestrap' ); ?>
          </p>
        </div>
        
        <?php submit_button(); ?>
        
      </form>
    </div>
  </div>
  <?php
}
