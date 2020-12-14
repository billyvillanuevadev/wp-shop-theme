<?php

/**
 * Get Menu/Navigation
 * 
 * @param {string} $menu_name* slug/key of the Menu to get (@see setup.php - register_nav_menus())
 * @param {string} $ul_class Classes to be added on the <ul> tag. Space separated.
 * @param {string} $li_class Classes to be added on the <li> tag. Space separated.
 * @param {string} $a_class Classes to be added on the <a> tag. Space separated.
 * @param {int} $slice_start The start of the array_slice for the menu
 * @param {int} $slice_total Total number of nav items to return when slicing
 * 
 * @return {string} $menu_list Complete HTML of the navigation menu
 */
function xbv_get_menu($menu_name, $ul_class='', $li_class='', $a_class='', $slice_start=null, $slice_total=null) {
  
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $menu_list = '';
    
    if ( $menu_name == 'footer-1' || $menu_name == 'footer-2' ) {
      $menu_list .= '<h4>'. $menu->name .'</h4>';
    }

    $menu_list .= "\t\t\t\t". '<ul class="'.$ul_class.'">' ."\n";

    if ( !empty($slice_total) ) {
      $menu_items = array_slice($menu_items, $slice_start, $slice_total);
    }

		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
      $url = $menu_item->url;

      if ( ! is_front_page() && ( $menu_name=='menu-1' || $menu_name == 'footer-1' ) ) {
        $url = get_home_url() . $url;
      }

      $icon = '';
      if ( 'chevron-icon'==$li_class ) {
        $icon = '<i class="fas fa-chevron-right"></i> ';
      }

			$menu_list .= "\t\t\t\t\t". '<li class="'.$li_class.'">'.$icon.'<a class="'.$menu_class.' '.$a_class.'" href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
	} else {
		$menu_list = '<!-- no list defined -->';
  }
  
	return $menu_list;
}

/**
 * Get the social links from the options page fields
 * 
 * @return {array} $site_social key: social media name, val: social media links
 */
function xbv_get_socials() {
  $site_social = array();

  if (!empty( $site_social_FB = get_field('facebook_url', 'option') )) {
    $site_social['facebook'] = $site_social_FB;
  }
  if (!empty( $site_social_TW = get_field('twitter_url', 'option') )) {
    $site_social['twitter'] = $site_social_TW;
  }
  if (!empty( $site_social_IG = get_field('instagram_url', 'option') )) {
    $site_social['instagram'] = $site_social_IG;
  }
  if (!empty( $site_social_YT = get_field('youtube_url', 'option') )) {
    $site_social['youtube'] = $site_social_YT;
  }
  if (!empty( $site_social_SC = get_field('snapchat_url', 'option') )) {
    $site_social['snapchat'] = $site_social_SC;
  }

  return $site_social;
}

/**
 * Get custom posts
 * 
 * @param {string} $post_type post type of posts to  get
 * @param {int} $numberposts the number of posts to get
 * 
 * @return {array} $posts an array of posts
 */
function xbv_get_posts( $post_type = 'post', $numberposts = -1 ) {

  $args = array(
    'post_type'   => $post_type,
    'numberposts' => $numberposts,
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
  );
  $posts = get_posts( $args );

  return $posts;
}