<?php SSMPB\do_hero_unit(); ?>

<?php if ( get_the_content() ) { ?>

<section class="content-block row-1 row-odd">
  <div class="grid-container">
  <div class="grid-x grid-margin-x align-center">
    <div class="cell small-12 medium-8">

     <?php the_content(); ?>

    </div>
  </div>
  </div>
</section>

<?php } ?>

<?php SSMPB\do_page_builder(); ?>
