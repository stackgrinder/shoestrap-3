<?php do_action( 'shoestrap_pre_entry_meta' ); ?>
<p class="byline author vcard"><?php echo __( 'By', 'shoestrap' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
<div class="row-fluid">
  <div class="span4">
    <i class="time-icon icon-time-alt"></i>
    <time class="updated" datetime="<?php echo get_the_time( 'c' ); ?>" pubdate><?php echo get_the_date(); ?></time>
  </div>
  <div class="span4">
    <?php if ( has_tag() ) { ?>
      <i class="icon-tags"></i>
      <?php the_tags(''); ?>
    <?php } ?>
  </div>
  <div class="span4">
    <?php if ( get_comments_number() >= 1 ) { ?>
      <i class="icon-comment"></i>
      <?php comments_number(); ?>
    <?php } ?>
  </div>
</div>
<?php do_action( 'shoestrap_after_entry_meta' );