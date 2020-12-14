<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header();
?>
<div id="section-content" <?php post_class(); ?>>
  <div class="container">
    <div class="row">
      <div class="col-12 col-12 col-lg-8 ml-auto mr-auto text-center">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'xbv' ); ?></h1>
      </div>
    </div>
  </div>
</div><!--/ #section-content -->
<?php
get_footer();
