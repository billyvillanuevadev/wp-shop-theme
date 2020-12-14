<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php if (!empty( get_the_content() )) : ?>
  <div id="section-content" <?php post_class(); ?>>
    <div class="container">
      <div class="row">
        <div class="col-12 col-12 col-lg-8 ml-auto mr-auto">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div><!--/ #content -->
<?php endif; ?>