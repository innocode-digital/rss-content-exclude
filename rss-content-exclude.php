<?php
/**
 * Plugin Name: Divi RSS Content Exclude
 * Description: Exclude from RSS feed Divi builder sections with class "RSS-NoFollow".
 * Version: 1.1.0
 * Author: Innocode
 * Author URI: https://innocode.com
 * Tested up to: 5.6.2
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

add_filter( 'et_module_shortcode_output', function ( $output, $render_slug, $shortcode ) {
	if ( ! is_feed() ) {
		return $output;
	}

    /**
     * @var ET_Builder_Element $shortcode
     */
    if (
        ! empty( $shortcode->classname ) &&
        is_array( $shortcode->classname ) &&
        in_array( 'RSS-NoFollow', $shortcode->classname )
    ) {
        $output = '';
    }

	return $output;
}, 10, 3 );
