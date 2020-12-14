jQuery(function($){
  console.log('code by Billy Villanueva');

  /**
   * Make the header stick at the top on scroll
   */
  function stickyHeader() {
    if ($(this).scrollTop() > 1){
      $('.xbv-sticky-header').addClass("sticky");
    } else {
      $('.xbv-sticky-header').removeClass("sticky");
    }
  }

  /**
   * Document ready
   */
  $(document).ready(function(){

    /**
     * Initialize AOS plugin
     * @see AOS - Animate-On-Scroll Library
     */
    AOS.init();

    /**
     * Make the header stick at the top on scroll
     * @see stickyHeader()
     */
    stickyHeader();
    $(window).scroll(function() {
      stickyHeader();
    });

    /**
     * Add Smooth Scrolling effect on anchor tags
     */
    $(".home .xbv-smooth-scroll a").on('click', function(event) {
      if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
  
        var fixed_header_height = 0;
        var scroll_top = ( $(hash).offset().top + fixed_header_height );
        var scroll_speed = 600; // Scroll animation speed in miliseconds
        $('html, body').animate({
          scrollTop: scroll_top
        }, scroll_speed);
      }
    });

    /**
     * Navbar - Toggle/close mobile navbar after clicking a nav-link
     */
    $('.navbar-nav .nav-link, .cart-toggler').on('click', function(){ 
      $('.navbar-collapse').collapse('hide');
    });

    /**
     * Drawer Navigation - Toggle drawer
     */
    $('.xbv-drawer-toggler').on('click', function(e) {
      e.preventDefault();
      // Add class to open the drawer menu
      $('body').toggleClass('xbv-drawer-open', 'normal');
    });
    $('.xbv-overlay, .xbv-drawer-close').on('click', function(e) {
      e.preventDefault();
      // Remove class to close the drawer menu
      $('body').removeClass('xbv-drawer-open', 'normal');
    });

  }); // document.ready
}); // jQuery

/**
 * xbv preloader
 * @desc On window load, remove the preloader/loading screen
 */ 
window.addEventListener('load', function () {
  var xbv_body = document.body; 
  xbv_body.style.overflow = "hidden";
  xbv_body.className = document.body.className.replace("xbv-preload","");
  setTimeout(function() {
    xbv_body.style.overflow = "visible";
  }, 600);
});