<?php
/*
 * Plugin Name: RSS Content Exclude
 * Description: Exclude from rss feed Divi builder sections with class "RSS-NoFollow"
 * Author:      Innocode AS
 * Author URI:  https://innocode.no
 * Version:     1.1
 */

add_filter( 'et_module_shortcode_output', function ( $output, $render_slug, $this_shortcode ) {
	if ( is_feed() ) {
		/**
		 * @var $this_shortcode ET_Builder_Element
		 */
		$classes = isset( $this_shortcode->classname ) ? $this_shortcode->classname : [];
		if ( $classes && in_array( 'RSS-NoFollow', $classes ) ) {
			$output = '';
		}
	}


	return $output;
}, 10, 3 );
