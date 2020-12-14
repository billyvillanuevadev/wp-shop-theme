<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<?php if (!empty( get_the_content() )) : ?>
  <div id="section-content" <?php post_class(); ?>>
    <div class="container">
      <div class="row">
        <div class="col-12 col-12 col-lg-8 ml-auto mr-auto">
          <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'xbv' ); ?></h1>
        </div>
      </div>
    </div>
  </div><!--/ #content -->
<?php endif; ?>