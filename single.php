<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

<div class="container section">
  <?php 
    if ( have_posts() ) :
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', get_post_type() );
      endwhile;
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
  ?>
</div>

<?php get_footer(); ?>
