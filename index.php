<?php
get_template_part( 'templates/page', 'header' );

if ( have_posts() ) :
  get_template_part('templates/content', get_post_format());
endif;