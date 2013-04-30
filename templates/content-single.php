<?php while ( have_posts() ) : the_post(); ?>
  <?php do_action( 'shoestrap_single_content' ); ?>
<?php endwhile;