<?php

add_action( 'admin_init', 'shoestrap_theme_supports_register_options' );
function shoestrap_theme_supports_register_options() {
  // creates our settings in the options table
  register_setting( 'shoestrap_theme_supports', 'shoestrap_root_relative_urls' );
  register_setting( 'shoestrap_theme_supports', 'shoestrap_rewrite_urls' );
}

add_action( 'shoestrap_admin_content', 'shoestrap_theme_supports_toggle', 15 );
function shoestrap_theme_supports_toggle() {
  $root_relative_urls = get_option( 'shoestrap_root_relative_urls' );
  $rewrite_urls       = get_option( 'shoestrap_rewrite_urls' );
  
  $submit_text        = __( 'Save', 'shoestrap' );
  $activationurl      = admin_url( 'themes.php?page=theme_activation_options' );

  ?>
  <div class="postbox">
    <h3 class="hndle" style="padding: 7px 10px;"><span><?php _e( 'Configure theme supports', 'shoestrap' ); ?></span></h3>
    <div class="inside">

      <form method="post" action="options.php">
        <?php settings_fields( 'shoestrap_theme_supports' ); ?>

        <h4><?php _e( 'Enable Root Relative URLs', 'shoestrap' ); ?></h4>
        <input id="shoestrap_root_relative_urls" name="shoestrap_root_relative_urls" type="checkbox" value="1" <?php checked('1', get_option('shoestrap_root_relative_urls')); ?> />
        <label class="description" for="shoestrap_root_relative_urls">
          <?php _e( 'Enable Root Relative URLs', 'shoestrap' ); ?>
        </label>
        <p><?php _e( 'Return URLs such as', 'shoestrap' ); ?> <code>/assets/css/app-responsive.css</code> <?php _e( 'instead of', 'shoestrap' ); ?> <code>http://example.com/assets/css/app-responsive.css</code></p>
        <hr />

        <h4><?php _e( 'Enable URL Rewrites', 'shoestrap' ); ?></h4>
        <input id="shoestrap_rewrite_urls" name="shoestrap_rewrite_urls" type="checkbox" value="1" <?php checked('1', get_option('shoestrap_rewrite_urls')); ?> />
        <label class="description" for="shoestrap_rewrite_urls">
          <?php _e( 'Enable URL Rewrites', 'shoestrap' ); ?>
        </label>
        <p><?php _e( 'Using this feature, URLs are rewritten like the following examples:', 'shoestrap' ); ?> </p>
        <p><code>/wp-content/themes/themename/assets/css/</code> <?php _e( 'to', 'shoestrap' ); ?> <code>/assets/css/</code></p>
        <p><code>/wp-content/themes/themename/assets/js/</code> <?php _e( 'to', 'shoestrap' ); ?> <code>/assets/js/</code></p>
        <p><code>/wp-content/themes/themename/assets/img/</code> <?php _e( 'to', 'shoestrap' ); ?> <code>/assets/img/</code></p>
        <p><code>/wp-content/plugins/</code> <?php _e( 'to', 'shoestrap' ); ?> <code>/plugins/</code></p>
        <p>
          <strong><?php _e( 'After you enable the above option, you have to visit', 'shoestrap' ); ?> <a href="<?php echo $activationurl; ?>"><?php _e( 'this link', 'shoestrap' ); ?></a></strong>.
          <?php _e( 'When you do so, HTML5 Boilerplate\'s .htaccess and the above rewrite rules are copied to your .htaccess file', 'shoestrap' ); ?>
        </p>
        <p><?php _e( 'Please make sure that your', 'shoestrap' ); ?> <code>.htaccess</code> <?php _e( 'file is writable by the webserver before visiting the above link', 'shoestrap' ); ?>.</p>
        <hr />
        
        <?php submit_button(); ?>

      </form>
    </div>
  </div>
  <?php
}
