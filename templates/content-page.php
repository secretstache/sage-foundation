<?php if ( get_the_content() ) { ?>

<section class="content-block row-1 row-odd">
  <div class="row align-center">
    <div class="small-12 medium-8 column">

     <?php the_content(); ?>

    </div>
  </div>
</section>

<?php } ?>

<?php SSMPB\do_page_builder(); ?>
