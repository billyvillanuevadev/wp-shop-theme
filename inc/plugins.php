<?php 
/**
 * Plugin Hooks
 */

/**
 * CF7: Replace default text of dropdown/select button
 */
function xbv_wpcf7_form_elements($html) {
  $text = 'Please select';
  $html = str_replace('---', '' . $text . '', $html);
  return $html;
}
add_filter('wpcf7_form_elements', 'xbv_wpcf7_form_elements');

/**
 * ACF: Remove the update notification for ACF Pro
 */
function xbv_acf_remove_update_notif($value) {
 unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
 return $value;
}
add_filter('site_transient_update_plugins', 'xbv_acf_remove_update_notif');