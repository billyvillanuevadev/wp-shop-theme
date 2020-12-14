<?php

/**
 * Change wp_query vars on specific post types archive
 */
function custom_posts_per_page($query) {
  if ( is_post_type_archive('brands') ) {
    if (!empty($query->query['post_type'])) {
      if ( $query->query['post_type'] == 'brands' && $query->is_archive && !isset($query->query['fields']) ) {
        $query->set('posts_per_page', -1);
        $query->set('post_parent', 0);
      }
    }
  }
}
add_action('pre_get_posts', 'custom_posts_per_page');

/**
 * Add a Custom Options Page
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Website Settings',
		'menu_title'	=> 'Website Settings',
		'menu_slug' 	=> 'website-settings'
	));
}

/** 
 * Hide/Show Admin Menu Items 
 * */
function xbv_remove_default_post_type() {
  // Hide the wp default post post-type
  remove_menu_page('edit.php');
  
  // Hide Other admin pages
  remove_menu_page('edit-comments.php');
  remove_menu_page('appearance.php');
  // remove_menu_page('edit.php?post_type=acf-field-group');
}
add_action('admin_menu','xbv_remove_default_post_type');

/** 
 * Change Admin Logo
 */
function xbv_login_logo() { 
  $logo = get_field('acf_website_logo', 'option');
  if (!empty($logo)) {
    print '<style type="text/css"> body.login div#login h1 a { background-image: url('.$logo['url'].'); height: 80px; width: 100%; background-size: 250px;}</style>';
  }
} 
add_action( 'login_enqueue_scripts', 'xbv_login_logo' );

/**
 * Redirect product single page to homepage
 */
function redirect_shop() {
  $home_shop_url = get_site_url() . '#section-shop';
  $queried_post_type = get_query_var('post_type');
  $slug = get_post_field('post_name');

  if ( ( is_page() && 'shop' == $slug ) ) { //(is_single() && 'product' ==  $queried_post_type) || 
    wp_redirect( $home_shop_url, 301 ); exit;
  }
}
add_action( 'template_redirect', 'redirect_shop' );