<?php

add_action( 'admin_init', 'shoestrap_dev_mode_register_options', 11 );
function shoestrap_dev_mode_register_options() {
  // creates our settings in the options table
  register_setting( 'shoestrap_advanced', 'shoestrap_dev_mode' );
  register_setting( 'shoestrap_advanced', 'shoestrap_minimize_css' );
  register_setting( 'shoestrap_advanced', 'shoestrap_advanced_compiler' );

  register_setting( 'shoestrap_advanced', 'shoestrap_root_relative_urls' );
  register_setting( 'shoestrap_advanced', 'shoestrap_rewrite_urls' );

  register_setting( 'shoestrap_advanced', 'shoestrap_customizer_caching' );
  register_setting( 'shoestrap_advanced', 'shoestrap_load_scripts_on_header' );

  register_setting( 'shoestrap_advanced', 'shoestrap_override_js_version' );
}

add_action( 'shoestrap_admin_content', 'shoestrap_dev_mode_toggle', 15 );
function shoestrap_dev_mode_toggle() {
  $shoestrap_dev_mode = get_option( 'shoestrap_dev_mode' );
  $advanced           = get_option( 'shoestrap_advanced_compiler' );
  $customizer_caching = get_option( 'shoestrap_customizer_caching' );
  $header_scripts     = get_option( 'shoestrap_load_scripts_on_header' );
  
  $override_js        = get_option( 'shoestrap_override_js_version' );

  $current_url        = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $customizeurl       = add_query_arg( 'url', urlencode( $current_url ), wp_customize_url() );
  if ( get_option( 'shoestrap_dev_mode' ) != 1 ) {
    $disabled         = 'disabled';
  } else {
    $disabled         = '';
  }
  $root_relative_urls = get_option( 'shoestrap_root_relative_urls' );
  $rewrite_urls       = get_option( 'shoestrap_rewrite_urls' );
  
  $submit_text        = __( 'Save', 'shoestrap' );
  $activationurl      = admin_url( 'themes.php?page=theme_activation_options' );
  
  ?>
  <div class="postbox">
    <h3 class="hndle" style="padding: 7px 10px;"><span><?php _e( 'Advanced Theme Options', 'shoestrap' ); ?></span></h3>
    <div class="inside">

      <form method="post" action="options.php">
          <?php settings_fields( 'shoestrap_advanced' ); ?>

        <h4><?php _e( 'Enable Developer Mode', 'shoestrap' ); ?></h4>
        <input id="shoestrap_dev_mode" name="shoestrap_dev_mode" type="checkbox" value="1" <?php checked('1', get_option('shoestrap_dev_mode')); ?> />
        <label class="description" for="shoestrap_dev_mode">
          <?php _e( 'Enable Developer Mode', 'shoestrap' ); ?>
        </label>
        <p><?php _e( 'When you enable the developer mode, the LESS compiler will detect any changes to your less files and re-compile the css files accordingly.', 'shoestrap' ); ?></p>
        <p><strong><span style="color: #cc0000"><?php _e( 'CAUTION:', 'shoestrap' ); ?></span> <?php _e( 'The options below should NOT be used unless you understand what they are doing and are willing to experiment!', 'shoestrap' ); ?></strong></p>
        <p><?php _e( 'In Production sites this option should be turned OFF or else your site may become slow.', 'shoestrap' ); ?></p>
        
        <p><?php _e( 'The actual compiling is done using leafo\'s ', 'shoestrap' ); ?><a href="leafo.net/lessphp/"><?php _e( 'PHP-LESS compiler', 'shoestrap' ); ?></a></p>
        <p><?php _e( 'Before enabling this option, please make sure that you webserver can write to the', 'shoestrap' ); ?>
        <code>assets/css/app.css</code> <?php _e( 'and', 'shoestrap' ); ?> <code>assets/css/responsive.css</code> <?php _e( 'files', 'shoestrap' ); ?></p>
        <p><strong><span style="color: #cc0000"><?php _e( 'CAUTION:', 'shoestrap' ); ?></span> <?php _e( 'If the above files are not writable by your webserver, you will might receive a fatal PHP error', 'shoestrap' ); ?></strong></p>
        <p><?php _e( 'If that happens don\'t panic, just FTP to your site and MAKE SURE they are writable.', 'shoestrap' ); ?></p>
        <p><?php _e( 'Once you enable the developer mode, you will also be able to select to minimize your css files, as well as enable the', 'shoestrap' ); ?> <strong><?php _e( 'Advanced Customizer', 'shoestrap' ); ?></strong></p>
        
        <hr />

        <div class="shoestrap_minimize_toggling">
          <?php if ( get_option( 'shoestrap_dev_mode' ) != 1 ) { ?>
            <style>
              div.shoestrap_minimize_toggling{
                opacity: 0.5;
              }
            </style>
          <?php } ?>
          <input id="shoestrap_minimize_css" name="shoestrap_minimize_css" <?php echo $disabled; ?> type="checkbox" value="1" <?php checked('1', get_option('shoestrap_minimize_css')); ?> />
          <label class="description" for="shoestrap_minimize_css">
            <?php _e( 'Minimize CSS', 'shoestrap' ); ?>
          </label>
          <p>
            <?php _e( 'In Production sites this option should be turned ON. Stylesheets will then be minimized. Keep in mind that stylesheets will only be re-compiled when there has been a change in their corresponding less files. So in order for the minification to take effect, you\'ll have to open and then save the less files again.', 'shoestrap' ); ?>
          </p>
        </div>

        <div class="shoestrap_cache_toggling">
          <?php if ( get_option( 'shoestrap_dev_mode' ) != 1 ) { ?>
            <style>
              div.shoestrap_cache_toggling{
                opacity: 0.5;
              }
            </style>
          <?php } ?>
          <input id="shoestrap_customizer_caching" name="shoestrap_customizer_caching" <?php echo $disabled; ?> type="checkbox" value="1" <?php checked('1', get_option('shoestrap_customizer_caching')); ?> />
          <label class="description" for="shoestrap_customizer_caching">
            <?php _e( 'Disable the customizer caching', 'shoestrap' ); ?>
          </label>
          <p>
            <?php _e( 'In Production sites this option should be turned OFF.', 'shoestrap' ); ?>
          </p>
        </div>

        <div class="shoestrap_cache_toggling">
          <?php if ( get_option( 'shoestrap_dev_mode' ) != 1 ) { ?>
            <style>
              div.shoestrap_cache_toggling{
                opacity: 0.5;
              }
            </style>
          <?php } ?>
          <input id="shoestrap_load_scripts_on_header" name="shoestrap_load_scripts_on_header" <?php echo $disabled; ?> type="checkbox" value="1" <?php checked('1', get_option('shoestrap_load_scripts_on_header')); ?> />
          <label class="description" for="shoestrap_load_scripts_on_header">
            <?php _e( 'Load scripts on the <strong>head</strong> instead of the <strong>footer</strong> of the document', 'shoestrap' ); ?>
          </label>
          <p>
            <?php _e( 'In Production sites this option should be turned OFF.', 'shoestrap' ); ?>
            <?php _e( 'However, in some cases you might want to enable this.', 'shoestrap' ); ?>
            <?php _e( 'For example if you write inline jquery scripts in your posts, this must be turned ON.', 'shoestrap' ); ?>)
          </p>
        </div>

        <div class="shoestrap_override_js_version">
          <?php if ( get_option( 'shoestrap_dev_mode' ) != 1 ) { ?>
            <style>
              div.shoestrap_override_js_version{
                opacity: 0.5;
              }
            </style>
          <?php } ?>
          <input id="shoestrap_override_js_version" name="shoestrap_override_js_version" <?php echo $disabled; ?> type="checkbox" value="1" <?php checked('1', get_option('shoestrap_override_js_version')); ?> />
          <label class="description" for="shoestrap_override_js_version">
            <?php _e( 'Use latest version of jQuery', 'shoestrap' ); ?>
          </label>
          <p>
            <?php _e( 'This is by default turned OFF because of conflicts with BuddyPress and some other plugins', 'shoestrap' ); ?>
            <?php _e( 'If you enable this please make sure that all your front-end plugins are compatible with the latest jQuery.', 'shoestrap' ); ?>
          </p>
        </div>

        <div class="shoestrap_advanced_compiler">
          <?php if ( get_option( 'shoestrap_dev_mode' ) != 1 ) { ?>
            <style>
              div.shoestrap_advanced_compiler{
                opacity: 0.5;
              }
            </style>
          <?php } ?>
          <hr />
      
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
        
        <hr />

        <h4><?php _e( 'Enable Root Relative URLs', 'shoestrap' ); ?></h4>
        <input id="shoestrap_root_relative_urls" name="shoestrap_root_relative_urls" type="checkbox" value="1" <?php checked('1', get_option('shoestrap_root_relative_urls')); ?> />
        <label class="description" for="shoestrap_root_relative_urls">
          <?php _e( 'Enable Root Relative URLs', 'shoestrap' ); ?>
        </label>
        <p><?php _e( 'Return URLs such as', 'shoestrap' ); ?> <code>/assets/css/app-responsive.css</code> <?php _e( 'instead of', 'shoestrap' ); ?> <code>http://example.com/assets/css/app-responsive.css</code></p>
        <p>
          <strong><?php _e( 'After you enable the above option, you have to visit', 'shoestrap' ); ?> <a href="<?php echo $activationurl; ?>"><?php _e( 'this link', 'shoestrap' ); ?></a></strong>
          <?php _e( 'to write the appropriate changes to your .htaccess file', 'shoestrap' ); ?>
        </p>
        <p>
          <?php _e( 'Please note that if you decide to de-activate this option you will have to manually revert the changes to your .htaccess file. It is therefore recommended that you keep a backup of this file BEFORE applying your changes.', 'shoestrap' ); ?>
        </p>
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
        <p>
          <?php _e( 'Please note that if you decide to de-activate this option you will have to manually revert the changes to your .htaccess file. It is therefore recommended that you keep a backup of this file BEFORE applying your changes.', 'shoestrap' ); ?>
        </p>
        <hr />


        <?php submit_button(); ?>
        
      </form>
    </div>
  </div>
  <?php
}

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
    if ( !defined( 'SHOESTRAP_COMPILER_WRITABLE_ERROR' ) ) {
      if ( !is_writable( $file ) )
        define( 'SHOESTRAP_COMPILER_WRITABLE_ERROR', true );
    }
  }

  if ( 'SHOESTRAP_COMPILER_WRITABLE_ERROR' == true ) {
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
/*
 * If developer mode is enabled, add the admin notice
 */
$shoestrap_dev_mode = get_option( 'shoestrap_dev_mode' );
if ( $shoestrap_dev_mode == 1 )
  add_action( 'admin_notices', 'shoestrap_check_files_permissions' );
