<?php
/** 
 * Add Custom Post types
 */

/** 
 * FAQs CPT
 */
function post_type_faqs() {
  $supports = array(
    'title', // post title
    'editor',
    'revisions', // post revisions
    'page-attributes',
  );
  $labels = array(
    'name' => _x('FAQs', 'plural'),
    'singular_name' => _x('FAQ', 'singular'),
    'menu_name' => _x('FAQs', 'admin menu'),
    'name_admin_bar' => _x('FAQs', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New FAQs'),
    'new_item' => __('New FAQs'),
    'edit_item' => __('Edit FAQs'),
    'view_item' => __('View FAQs'),
    'all_items' => __('All FAQs'),
    'search_items' => __('Search FAQs'),
    'not_found' => __('No FAQs found.'),
  );
  $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'menu_icon' => 'dashicons-admin-comments',
    'public' => true,
    'publicly_queryable'  => false,
    'query_var' => true,
    'rewrite' => array('slug' => 'faqs'),
    'has_archive' => false,
    'hierarchical' => false,
  );
  register_post_type('faqs', $args);
}
add_action('init', 'post_type_faqs');