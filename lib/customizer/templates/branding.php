<?php

function shoestrap_branding() {
  if ( get_theme_mod( 'shoestrap_extra_branding' ) == 1 ) { ?>
    <div class="container-fluid logo-wrapper">
      <div class="logo container">
        <div class="row-fluid">
          <div class="span8">
            <a class="brand-logo" href="<?php echo home_url(); ?>/">
              <h1><?php if ( function_exists( 'shoestrap_logo' ) ) { shoestrap_logo(); } ?></h1>
            </a>
          </div>
          <?php if ( has_action( 'shoestrap_branding_branding_right' ) ) { do_action( 'shoestrap_branding_branding_right' ); } ?>
        </div>
      </div>
    </div>
  <?php }
}
add_action( 'shoestrap_branding', 'shoestrap_branding' );
