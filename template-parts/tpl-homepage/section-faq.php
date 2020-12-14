<?php
/**
 * Template part for displaying the FAQ section of the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<div id="section-faq" class="section bg-gray-light">
  <div class="container" data-aos="fade-up">

    <?php if ( $section_title = get_field('section_title_faq') ) : ?>
      <div class="row">
        <div class="col text-center">
          <h2 class="section-title mb-0"><?=$section_title?></h2>
          <div class="vline bg-black"></div>
        </div>
      </div>
    <?php endif; ?>
    
    <div class="row section-content">
      <div class="col">
        <?php if ( $faqs = get_field('faqs') ) : ?>
          <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
            <?php for ( $x=1; $x < count($faqs); $x++ ) : 
              $post = $faqs[$x];
              setup_postdata($post); ?>
              
              <li class="mb-20">
                <a data-toggle="collapse" class="fs-sm-md <?=($x != 1) ? 'collapsed' : '';?>" href="#faq-item-<?=$x?>" aria-expanded="<?=($x != 1) ? 'false' : 'true';?>"><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i> <?php the_title(); ?></a>
                <div id="faq-item-<?=$x?>" class="collapse <?=($x != 1) ? '' : 'show';?>" data-parent=".faq-list">
                  <div class="mt-10">
                    <?php print get_the_content(); ?>
                  </div>
                </div>
              </li>

            <?php endfor; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
        <?php endif; ?>
        
      </div><!--/ .col -->
    </div><!--/ .section-content .row -->

  </div>
</div><!-- section-faq -->