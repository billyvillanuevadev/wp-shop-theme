<?php

/**
 * Register script files and variables
 */
function xbv_ajax_scripts() {  
  //* For Ajax / Load more
  global $wp_query; 
  wp_register_script( 'xbv_ajax', get_stylesheet_directory_uri() . '/assets/scripts/ajax.js', array('jquery'), rand(10,1000), 1 );
 
  // Variables for Load more
  wp_localize_script( 'xbv_ajax', 'xbv_default_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php' // WordPress AJAX
  ) );

  // Variables for Load more
  wp_localize_script( 'xbv_ajax', 'xbv_loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    'posts' => json_encode( $wp_query->query_vars ), // Loop variables
    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    'max_page' => $wp_query->max_num_pages
  ) );

  wp_enqueue_script( 'xbv_ajax' );
  //* End Ajax / Load more
}
add_action( 'wp_enqueue_scripts', 'xbv_ajax_scripts' );

/**
 * Ajax Handler: Modal product function
 */
function xbv_modalpost_ajax_handler() {
  global $post;

	$post_id = $_POST['post_id'];
  $post = get_post($post_id);
  setup_postdata($post); 
  
  get_template_part( 'template-parts/content', get_post_type() );  
  
  wp_reset_postdata();
  die;
}
add_action('wp_ajax_modalpost', 'xbv_modalpost_ajax_handler');
add_action('wp_ajax_nopriv_modalpost', 'xbv_modalpost_ajax_handler');

/**
 * Ajax Handler: Cart Drawer Items
 */
function xbv_drawercart_ajax_handler() {  
  ob_start();
    get_template_part( 'template-parts/block', 'drawer' );
  $cart_items_html = ob_get_contents();
  ob_end_clean();

  $cart_subtotal = WC()->cart->get_cart_total();
  
  $data = array(
    'cart_items_html' => $cart_items_html,
    'cart_subtotal' => $cart_subtotal
  );

  print json_encode($data);
  die();
}
add_action('wp_ajax_drawercart', 'xbv_drawercart_ajax_handler');
add_action('wp_ajax_nopriv_drawercart', 'xbv_drawercart_ajax_handler');

/**
 * Ajax Handler: Remove 
 */
function xbv_remove_cart_item_ajax_handler() {
  if ( !empty( $id = $_POST['product_id'] ) ) {

    $cart_id = WC()->cart->generate_cart_id($id);
    $cart_item_id = WC()->cart->find_product_in_cart($cart_id);

    if($cart_item_id){
      // Remove item in the cart
      WC()->cart->set_quantity($cart_item_id, 0);

      // Get the new subtotal
      $cart_subtotal = WC()->cart->get_cart_total();
      print $cart_subtotal; die();
    }
  }

  return false;
}
add_action('wp_ajax_remove_cart_item', 'xbv_remove_cart_item_ajax_handler');
add_action('wp_ajax_nopriv_remove_cart_item', 'xbv_remove_cart_item_ajax_handler');

/**
 * Ajax Handler: Load more function
 */
function xbv_loadmore_ajax_handler() {
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	query_posts( $args );

	if( have_posts() ) :
		while( have_posts() ): the_post();
			get_template_part( 'template-parts/archive/content', get_post_type() );
		endwhile;
	endif;
  die;
}
add_action('wp_ajax_loadmore', 'xbv_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'xbv_loadmore_ajax_handler');