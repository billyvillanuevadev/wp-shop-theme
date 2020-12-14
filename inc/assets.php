<?php
/**
 * Enqueue scripts and styles and Add custom image sizes.
 */

/**
 * Enqueue styles
 */
function xbv_styles() {
  // Fonts
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap', array(), null );
  wp_enqueue_style( 'font-awesome-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', array(), null );

  // CSS
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), null );
  wp_enqueue_style( 'lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css', array(), null );
  wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), null );

  // main css
  wp_enqueue_style( 'main', get_theme_file_uri('assets/styles/main.css'), array(), rand(10,1000) );  

  // style.css for theme info
	wp_enqueue_style( 'xbv-style', get_stylesheet_uri(), array(), null );
	wp_style_add_data( 'xbv-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'xbv_styles' );

/**
 * Add integrity and crossorigin properties to cdn stylesheets
 */
function add_style_attributes( $html, $handle ) {
  if ( 'font-awesome-5' === $handle ) {
    return str_replace( "media='all'", "media='all' integrity='sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==' crossorigin='anonymous'", $html );
  }

  if ( 'bootstrap-css' === $handle ) {
    return str_replace( "media='all'", "media='all' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'", $html );
  }

  if ( 'lightbox-css' === $handle ) {
    return str_replace( "media='all'", "media='all' integrity='sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==' crossorigin='anonymous'", $html );
  }

  return $html;
}
add_filter( 'style_loader_tag', 'add_style_attributes', 10, 2 );

/**
 * Enqueue scripts
 */
function xbv_scripts() {
  // JS libraries
  wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null );
  wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), null );
  wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array(), null );
  wp_enqueue_script( 'lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array(), null );
  wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null );

  // Main JS File
  wp_enqueue_script( 'main', get_theme_file_uri('assets/scripts/main.js'), array(), rand(10,1000) );  
}
add_action( 'wp_enqueue_scripts', 'xbv_scripts' );

/**
 * Add integrity and crossorigin properties to cdn scripts
 */
function add_script_attributes( $html, $handle ) {
  if ( 'jquery' === $handle ) {
    return str_replace( "id", "integrity='sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==' crossorigin='anonymous' id", $html );
  }

  if ( 'popper' === $handle ) {
    return str_replace( "id", "integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous' id", $html );
  }

  if ( 'bootstrap' === $handle ) {
    return str_replace( "id", "integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous' id", $html );
  }

  if ( 'lightbox' === $handle ) {
    return str_replace( "id", "integrity='sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==' crossorigin='anonymous' id", $html );
  }

  return $html;
}
add_filter( 'script_loader_tag', 'add_script_attributes', 10, 2 );

/**
 * Add Custom Image sizes
 */
add_image_size( 'thumbnail-common', 768, 512, true );