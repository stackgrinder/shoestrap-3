<?php
/**
 * Clean up wp_head()
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 * Remove self-closing tag and change ''s to "'s on rel_canonical()
 */
function shoestrap_head_cleanup() {
	// Originally from http://wpengineer.com/1438/wordpress-header/
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

	if ( !class_exists( 'WPSEO_Frontend' ) ) {
		remove_action( 'wp_head', 'rel_canonical' );
		add_action( 'wp_head', 'shoestrap_rel_canonical' );
	}
}

/**
 * Clean up language_attributes() used in <html> tag
 *
 * Remove dir="ltr"
 */
function shoestrap_language_attributes() {
	$attributes = array();
	$output = '';

	if ( is_rtl() )
		$attributes[] = 'dir="rtl"';

	$lang = get_bloginfo( 'language' );

	if ( $lang )
		$attributes[] = "lang=\"$lang\"";

	$output = implode( ' ', $attributes );
	$output = apply_filters( 'shoestrap_language_attributes', $output );

	return $output;
}
add_filter( 'language_attributes', 'shoestrap_language_attributes' );

/**
 * Manage output of wp_title()
 */
function shoestrap_wp_title( $title ) {
	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	return $title;
}
add_filter( 'wp_title', 'shoestrap_wp_title', 10 );

/**
 * Add and remove body_class() classes
 */
function shoestrap_body_class( $classes ) {
	// Add post/page slug
	if ( is_single() || is_page() && !is_front_page() )
		$classes[] = basename( get_permalink() );

	// Remove unnecessary classes
	$home_id_class = 'page-id-' . get_option( 'page_on_front' );
	$remove_classes = array( 
		'page-template-default',
		$home_id_class
	);

	$classes = array_diff( $classes, $remove_classes );

	return $classes;
}
add_filter( 'body_class', 'shoestrap_body_class' );

/**
 * Wrap embedded media as suggested by Readability
 *
 * @link https://gist.github.com/965956
 * @link http://www.readability.com/publishers/guidelines#publisher
 */
function shoestrap_embed_wrap( $cache, $url, $attr = '', $post_ID = '' ) {
	return '<div class="entry-content-asset">' . $cache . '</div>';
}
add_filter( 'embed_oembed_html', 'shoestrap_embed_wrap', 10, 4 );

/**
 * Add Bootstrap thumbnail styling to images with captions
 * Use <figure> and <figcaption>
 *
 * @link http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
 */
function shoestrap_caption( $output, $attr, $content ) {
	if ( is_feed() )
		return $output;

	$defaults = array( 
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	);

	$attr = shortcode_atts( $defaults, $attr );

	// If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
	if ( $attr['width'] < 1 || empty( $attr['caption'] ) )
		return $content;

	// Set up the attributes for the caption <figure>
	$attributes  = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="thumbnail wp-caption ' . esc_attr( $attr['align'] ) . '"';
	$attributes .= ' style="width: ' . ( esc_attr( $attr['width'] ) + 10 ) . 'px"';

	$output  = '<figure' . $attributes .'>';
	$output .= do_shortcode( $content );
	$output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
	$output .= '</figure>';

	return $output;
}
add_filter( 'img_caption_shortcode', 'shoestrap_caption', 10, 3 );

/**
 * Fix for empty search queries redirecting to home page
 *
 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
 * @link http://core.trac.wordpress.org/ticket/11330
 */
function shoestrap_request_filter( $query_vars ) {
	if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) )
		$query_vars['s'] = ' ';

	return $query_vars;
}
add_filter( 'request', 'shoestrap_request_filter' );

/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function shoestrap_get_search_form( $form ) {
	$form = '';
	locate_template( '/templates/searchform.php', true, false );
	return $form;
}
add_filter( 'get_search_form', 'shoestrap_get_search_form' );


/**
 * Generate the default pagers.
 */
function shoestrap_pagers() {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1) {
		$nav  = '<nav class="post-nav"><ul class="pager">';
		$nav .= '<li class="previous">' . get_next_posts_link( __( '&larr; Older posts', 'shoestrap' ) ) . '</li>';
		$nav .= '<li class="next">' . get_previous_posts_link( __( 'Newer posts &rarr;', 'shoestrap' ) ) . '</li>';
		$nav .= '</ul></nav>';

		return $nav;
	}
}