<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class( 'xbv-preload' ); ?> data-spy="scroll" data-target="#navbar-scroller">
  <div id="page-top" class="global-wrapper">
    <?php wp_body_open(); ?>

    <!-- Header -->
    <header id="global-header" class="xbv-sticky-header">
      <div class="xbv-sticky-header-inner">

        <nav class="navbar navbar-expand-lg navbar-dark container">
          <div class="section-logo navbar-brand mr-auto">
            <div class="logo-grunge">
              <a href="<?= get_site_url(); ?>" class="logo">Suiko</a>
              
              <span class="top"></span>
              <span class="bottom"></span>
              <span class="left"></span>
              <span class="right"></span>
            </div>
          </div>
          <div class="collapse navbar-collapse xbv-smooth-scroll" id="navbar-scroller">
            <?= xbv_get_menu('menu-1', 'navbar-nav ml-auto', 'nav-item', 'nav-link'); ?>
          </div>

          <div class="icons-absolute">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-scroller" aria-controls="navbar-scroller" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <?php if ( !is_page( 'cart' ) && !is_checkout() && !is_cart() ) : ?>
              <a class="xbv-drawer-toggler cart-toggler icon-cart" role="button">
                <i class="fas fa-shopping-cart"></i>
              </a>
            <?php endif; ?>
          </div>
        </nav>

      </div><!--/ .xbv-sticky-header-inner -->
    </header>

    <!-- Hero Banner -->
    <?php if( $video = get_field('video') ) : ?>
      <div class="xbv-video-header">
        <div class="overlay"></div>

        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
          <source src="<?=$video['url']?>" type="<?=$video['mime_type']?>">
        </video>

        <div class="container h-100">
          <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
              <?php if( $section_title_hero = get_field('section_title_hero') ) : ?>
                <h1 class="header-title"><?=$section_title_hero?></h1>
              <?php endif; ?>

              <?php if( $section_subtitle_hero = get_field('section_subtitle_hero') ) : ?>
                <p class="lead mb-0"><?=$section_subtitle_hero?></p>
              <?php endif; ?>
              
              <?php if( $call_to_action_hero = get_field('call_to_action_hero') ) : ?>
                <div class="xbv-smooth-scroll mt-30">
                  <a class="btn-outline-white" href="<?=$call_to_action_hero['url']?>"><?=$call_to_action_hero['title']?></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div><!--/ .xbv-video-header -->

    <?php else: ?>
      <div class="xbv-image-banner-header bg-black text-white mb-60" style="background-image: none;">
        <!-- <div class="overlay"></div> -->
        <div class="container">
          <h1 class="page-title text-center"><?php the_title(); ?></h1>
        </div>
      </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div id="main-content-post-<?= the_ID() ?>" class="main-content-wrapper">