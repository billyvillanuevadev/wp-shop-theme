<?php
/**
 * Template part for displaying the Contact section on the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<div class="section" id="section-contact">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col text-center">
        <?php if( $section_title = get_field('section_title_contact') ) : ?>
          <h2 class="section-title mb-0"><?=$section_title?></h2>
        <?php endif; ?>
        
        <?php if( $section_content = get_field('section_content_contact') ) : ?>
          <p class="mt-20"><?=$section_content;?></p>
        <?php endif; ?>
        <div class="vline bg-black"></div>
      </div>
    </div>

    <div class="row section-content text-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-md-8 offset-md-2">
        <?php if( $contact_form = get_field('contact_form') ) : ?>
          <?php print do_shortcode( $contact_form ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div><!--/ #section-contact -->