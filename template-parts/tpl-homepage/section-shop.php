<?php
/**
 * Template part for displaying shop section of the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<div class="section" id="section-shop">
  <div class="container" data-aos="fade-up">

    <?php if ( $section_title = get_field('section_title_products') ) : ?>
      <div class="row">
        <div class="col text-center">
          <h2 class="section-title mb-0 "><?=$section_title?></h2>
          <div class="vline bg-black text-center"></div>
        </div>
      </div>
    <?php endif; ?>

    <div class="row section-content text-center" data-aos="fade-up" data-aos-delay="100">

      <?php if ( $products = xbv_get_posts('product') ) : ?>
        <?php foreach ( $products as $post ) :
          setup_postdata($post); 
          $product = wc_get_product( $post->ID );
          ?>

          <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-5">
            <div class="tile mb-10">
              <div class="image-zoom-box">
                <a class="image-zoom-sizer modal-post-trigger" href="#" data-postid="<?= the_ID(); ?>">
                  <?php $product_img_id = $product->get_image_id(); ?>
                  <div class="image-div" style="background-image: url(<?=wp_get_attachment_url($product_img_id)?>);"></div>
                </a>
              </div>
            </div>
            <div class="tile-caption text-center pt-3">
              <h3 class="tile-title fs-sm-md"><?= the_title(); ?></h3>
              <p class="tile-short-desc price tc-red"><?= $product->get_price_html(); ?></p>
            </div>
            <div class="tile-buttons">
              <a class="btn-default modal-post-trigger" href="#" data-postid="<?= the_ID(); ?>"><i class="fa fa-search"></i> View Product</a>
            </div>
          </div><!--/ .col -->

        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

    </div><!--/ .row.section-content -->
  </div><!--/ .container -->
</div><!--/ #section-portfolio -->