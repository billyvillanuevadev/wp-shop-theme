<?php
/**
 * Template part for displaying cart drawer content for the main navigation cart icon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<?php $cart_items = WC()->cart->get_cart(); ?>

<div class="drawer-empty <?= ( empty($cart_items) ) ? '' : 'd-none'; ?>">
  <p>Your cart is currently empty</p>
</div>

<?php if ( !empty($cart_items) ) : ?>
  <div class="cart-items">
    <?php foreach($cart_items as $cart_item => $cart_val) : ?>
      <?php
        $cart_prod_ID = $cart_val['data']->get_id();
        $cart_product_obj =  wc_get_product( $cart_prod_ID );
        $price = get_post_meta($cart_val['product_id'] , '_price', true);
      ?>
      <div class="cart-item">
        <div class="layout-thumb-side-desc">
          <div class="layout-thumb prod-image">
            <?= $cart_product_obj->get_image('thumbnail', array('class' => 'prod-img')); ?>
          </div>
          <div class="layout-desc prod-desction">
            <div class="prod-name fs-sm-md mb-1"><strong><?=$cart_product_obj->get_title()?></strong></div>
            <div class="prod-price">Price: <span class="text-red">$<?= $price ?></span></div>
            <div class="prod-qua">Quantity: <?=$cart_val['quantity']?></div>
            <div class="prod-sub">Subtotal: <?=($cart_val['quantity'] * $price)?></div>
          </div>

          <?php 
            $cart_item_key = WC()->cart->generate_cart_id( $cart_prod_ID );
            $in_cart = WC()->cart->find_product_in_cart( $cart_item_key );
          ?>
          <?php if ( $in_cart ) : 
            $cart_item_remove_url = wc_get_cart_remove_url( $cart_item_key ); ?>
            <a class="prod-remove icon-link" href="#" data-prodID="<?=$cart_prod_ID;?>" data-removeurl="<?php echo esc_url( $cart_item_remove_url ); ?>"><i class="fas fa-minus-circle"></i></a>
          <?php endif; ?>
          
        </div><!--/ .layout-thumb-side-desc -->
      </div><!--/ .cart-item -->
    <?php endforeach; ?>
  </div><!--/ .cart-items -->
<?php endif; ?>