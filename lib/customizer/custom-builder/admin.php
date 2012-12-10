<?php

add_action( 'shoestrap_admin_content', 'shoestrap_advanced_toggle', 20 );
function shoestrap_advanced_toggle() {
  $advanced     = get_option( 'shoestrap_advanced_compiler' );
  $current_url  = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $customizeurl = add_query_arg( 'url', urlencode( $current_url ), wp_customize_url() );

  ?>
  <div class="postbox">
    <h3 class="hndle" style="padding: 7px 10px;"><span><?php _e( 'Advanced Customizer and compiler', 'shoestrap' ); ?></span></h3>
    <div class="inside">

      <form method="post" action="options.php">
        <?php settings_fields( 'shoestrap_advanced' ); ?>
    
        <input id="shoestrap_advanced_compiler" name="shoestrap_advanced_compiler" type="checkbox" value="1" <?php checked('1', get_option('shoestrap_advanced_compiler')); ?> />
        <label class="description" for="shoestrap_advanced_compiler">
          <?php _e( 'Enable the advanced customizer', 'shoestrap' ); ?>
        </label>
        <p>
        <?php _e( 'The advanced customizer allows you to change aspects of your theme that are not customizable otherwise.', 'shoestrap' ); ?>
        </p>
        <p>
        <?php _e( 'We are using leafo\'s ', 'shoestrap' ); ?>
        <a href="leafo.net/lessphp/"><?php _e( 'PHP-LESS compiler', 'shoestrap' ); ?></a>
        </p>
        <?php _e( 'In order for the compiler to work, you\'ll have to make sure that these files are writable by your webserver:', 'shoestrap' ); ?>
        <ul>
          <li>assets/less/variables.less</li>
          <li>assets/css/app-responsive.css</li>
          <li>assets/css/app-fixed.css</li>
        </ul>
        <p>
          <?php _e( 'After you enable the advanced customizer, you\'ll be able to visit the', 'shoestrap' ); ?>
          <a href="<?php  echo $customizeurl ?>"> <?php _e( 'Customizer', 'shoestrap' ); ?> </a>
          <?php _e( 'to change bootstrap\'s default behavior', 'shoestrap' ); ?>
        </p>
        <?php submit_button(); ?>
    
      </form>
    </div>
  </div>
  <?php
}

add_action( 'admin_init', 'shoestrap_register_option_advanced_compiler' );
function shoestrap_register_option_advanced_compiler() {
  // creates our settings in the options table
  register_setting( 'shoestrap_advanced', 'shoestrap_advanced_compiler' );
}