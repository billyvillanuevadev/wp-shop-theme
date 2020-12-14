<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
    </div><!--/ .main-content-wrap -->

    <!-- Footer -->
    <footer id="global-footer">

      <div class="footer-newsletter bg-gray-light section text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h4 class="fw-bold mb-20"><?= ( $subscription_title = get_field('subscription_title', 'options') ) ? $subscription_title : ''; ?></h4>
              <p><?= ( $subscription_description = get_field('subscription_description', 'options') ) ? $subscription_description : ''; ?></p>
              <div class="form-wrap py-3">
                <?php if ( $subscription_form = get_field('subscription_form', 'options') ) : ?>
                  <?= do_shortcode($subscription_form); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div> 
      </div>
  
      <div class="footer-top section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
  
            <div class="col-lg-3 col-md-6 footer-contact mb-10">
              <h3 class="fw-bold fs-md"><?= ( $business_name = get_field('business_name', 'options') ) ? $business_name : ''; ?></h3>
              <p>
                <?= ( $business_address = get_field('business_address', 'options') ) ? $business_address : ''; ?><br><br>
                <?= ( $phone_number = get_field('phone_number', 'options') ) ? '<strong>Phone:</strong> ' . $phone_number . '<br>' : ''; ?>
                <?= ( $email_address = get_field('email_address', 'options') ) ? '<strong>Email:</strong> ' . $email_address . '<br>' : ''; ?>
              </p>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links mb-30">
              <?= xbv_get_menu('footer-1', 'xbv-smooth-scroll', 'chevron-icon'); ?>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links mb-30">
              <?= xbv_get_menu('footer-2', 'our-trainings', 'chevron-icon'); ?>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links mb-30">
              <h4><?= ( $social_footer_title = get_field('social_footer_title', 'options') ) ? $social_footer_title : ''; ?></h4>
              <p><?= ( $social_footer_description = get_field('social_footer_description', 'options') ) ? $social_footer_description : ''; ?></p>
              <div class="social-links mt-3 tc-black fs-lg">
                <?php $socials = xbv_get_socials();?>
                <?php foreach ($socials as $social => $social_url) : ?>
                  <a href="<?=$social_url?>" class="<?=$social?>" target="_blank"><i class="fab fa-<?=$social?>-square"></i></a>
                <?php endforeach; ?>
              </div>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="footer-copyright py-4 bg-black tc-white fs-xs">
        <div class="container">
          <div class="copyright float-left">
            <?= ( $footer_left_text = get_field('footer_left_text', 'options') ) ? $footer_left_text : ''; ?>
          </div>
          <div class="credits float-right">
            <?= ( $footer_right_text = get_field('footer_right_text', 'options') ) ? $footer_right_text : ''; ?>
          </div>
          <div class="clearfix"></div>
        </div>
      </div><!--/ .footer-copyright -->
    </footer>

  </div><!--/ .global-wrapper -->

  <!-- Modals -->
  <div id="modal-product" class="modal fade show xbv-modal-preload" tabindex="-1" role="dialog" aria-labelledby="modal-product-title" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        
        <div class="xbv-modal-loader"></div>
      </div>
    </div>
  </div>

  <!-- Cart Drawer -->
  <div class="xbv-overlay"></div>
  <div class="xbv-drawer">
    <div class="drawer-wrap">
      <div class="drawer-header p-4">
        <div class="drawer-title float-left">
          <h3 class="mb-0"><i class="fas fa-shopping-cart"></i> Your cart</h3>
        </div>
        <a class="xbv-drawer-close icon-link float-right" href="#"><i class="far fa-times-circle"></i></a>
        <div class="clearfix"></div>
      </div>
      <div class="drawer-body p-4 bg-gray-light xbv-modal-preload">
        <div class="cart-items-wrap drawer-content">
          <?php get_template_part( 'template-parts/block', 'drawer' ); ?>
        </div><!--/ .cart-items-wrap -->

        <div class="xbv-modal-loader"></div>
      </div>
      <div class="drawer-footer p-4">
        <div class="cart-subtotal row">
          <div class="col-6"><strong>Subtotal</strong></div>

          <?php $cart_total = WC()->cart->get_cart_total(); ?>
          <div class="col-6 text-right"><strong id="drawer-cart-subtotal"><?=$cart_total?></strong></div>
        </div>
        <a class="btn-default mt-20 w-100 py-3 fs-sm" href="<?=site_url('cart')?>"><i class="fas fa-cash-register"></i> Checkout</a>
      </div>
    </div>
  </div><!--/ .xbv-drawer -->

  <div class="xbv-loader"></div>

  <?php wp_footer(); ?>
</body>
</html>