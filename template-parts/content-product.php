<?php
/**
 * The template for displaying product single post pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php
  $product = wc_get_product( $post->ID );
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-7">
      <?= $product->get_image( 'full', array('class' => 'img-fluid') ); ?>
    </div>
    <div class="col-lg-5">
      <h3 class="prod-name mt-3 mt-lg-0"><?= the_title(); ?></h3>
      <p class="prod-price tc-red"><?= $product->get_price_html(); ?></p>

      <div class="prod-desc mb-20">
        <?= $product->get_description(); ?>
      </div>

      <?php print do_shortcode( '[add_to_cart id="'.$post->ID.'" class="add-to-cart-wrap w-100 py-3 fs-sm" show_price="FALSE" style=""]' ); ?>
    </div>
  </div><!--/ .row -->
</div><!--/ .container-fluid -->