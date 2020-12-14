jQuery(function($){
  /**
   * Product Modal
   * @desc Pull data and content from single product post
   */
  $('.modal-post-trigger').click(function(e) {
    e.preventDefault();
    
    // initialize variables
    var modal_id = '#modal-product',
        modal = $(modal_id),
        post_id = $(this).data('postid'),
        data = {
          'action': 'modalpost',
          'post_id': post_id
        };

    // open the modal first
    modal.modal('show'); 

    $.ajax({
			url : xbv_default_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
        // empty the content of the modal
        modal.find('.modal-body').empty();
			},
			success : function( res ){
				if( res ) {
          // remove preloader
          modal.removeClass('xbv-modal-preload');

          // add html response in Modal body
          $(res).hide().appendTo(modal_id + ' .modal-body').fadeIn();
				}
			}
		});
  });

  /**
   * Product Modal
   * @desc Add the preloader back to the modal after closing it
   */
  $('#modal-product').on('hidden.bs.modal', function(e) {
    $(this).addClass('xbv-modal-preload');
  });

  /**
   * Cart Drawer - Update
   * @desc Update cart drawer items everytime it is opened
   */
  $('.cart-toggler').on('click', function(){ 
    // initialize variables
    var cart_content = $('.cart-items-wrap.drawer-content'),
        cart_subtotal_cont = $('#drawer-cart-subtotal'),
        drawer_body = $('.drawer-body');

    $.ajax({
			url : xbv_default_params.ajaxurl,
			data : { 'action': 'drawercart' },
      type : 'GET',
      dataType: 'json',
			beforeSend : function ( xhr ) {
        // empty the cart drawer content
        cart_content.empty();
        cart_subtotal_cont.empty();
        drawer_body.addClass('xbv-modal-preload');
			},
			success : function( res ) {
        // remove preloader
        drawer_body.removeClass('xbv-modal-preload');

				if( res ) {
          // Add html response in Modal body with fade-in effect
          $(res.cart_items_html).hide().appendTo(cart_content).fadeIn();
          $(res.cart_subtotal).hide().appendTo(cart_subtotal_cont).fadeIn();
				}
			}
		});
  });

  /**
   * Cart Drawer - Remove Item
   * @desc Remove cart item through the cart drawer menu remove buttons
   */
  $(document).on('click', '.prod-remove', function(e) {
    e.preventDefault();

    // initialize variables
    var prodid = $(this).data('prodid'),
        cart_subtotal_cont = $('#drawer-cart-subtotal'),
        cart_item_div = $(this).parents('.cart-item');

    $.ajax({
      url: xbv_default_params.ajaxurl,
      type: 'POST',
      data: {
        'action' : 'remove_cart_item', 
        'product_id' : prodid
      },
      beforeSend : function ( xhr ) {
        // Fade out the cart item
        cart_item_div.fadeOut();
        cart_subtotal_cont.empty();
			},
      success: function (res) {
        if (res) {
          // Remove the cart item element
          cart_item_div.remove();
          $(res).hide().appendTo(cart_subtotal_cont).fadeIn();

          // Show the empty cart message if there are no more cart-items left
          if ( $('.drawer-body .cart-items .cart-item').length <= 0 ) {
            $('.drawer-body .drawer-empty').removeClass('d-none');
          }
        }
      }
    });
  }); 
});