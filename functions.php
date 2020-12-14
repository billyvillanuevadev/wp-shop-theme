<?php
/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * WP Setup and theme supports
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Enqueue scripts and styles and Add custom image sizes.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Ajax functions
 */
require get_template_directory() . '/inc/xbv-ajax.php';

/**
 * Customize wordpress
 */
require get_template_directory() . '/inc/customize.php';

/** 
 * Add Custom Post types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Function library
 */
require get_template_directory() . '/inc/xbv-functions.php';

/** 
 * Changes/tweaks for installed plugins
 */
require get_template_directory() . '/inc/plugins.php';