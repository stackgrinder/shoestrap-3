<?php

function shoestrap_primary_navbar_searchbox() {
 
  $show_searchbox = get_theme_mod( 'shoestrap_p_navbar_searchbox' );
  if ( $show_searchbox == '1' ) { ?>
    <ul class="pull-right nav nav-collapse"><li>
    <?php do_action('shoestrap_pre_searchform'); ?>
    <form role="search" method="get" id="searchform" class="form-search navbar-search" action="<?php echo home_url('/'); ?>">
      <label class="hide" for="s"><?php _e('Search for:', 'shoestrap'); ?></label>
      <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php _e('Search', 'shoestrap'); ?> <?php bloginfo('name'); ?>">
    </form>
    <?php do_action('shoestrap_after_searchform'); ?>
    </li></ul>
    <?php
  }
}
add_action( 'shoestrap_nav_top_right', 'shoestrap_primary_navbar_searchbox', 11 );
