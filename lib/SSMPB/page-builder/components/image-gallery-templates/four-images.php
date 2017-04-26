<?php $functionality = get_sub_field('on_click_functionality'); ?>

<?php if ( get_sub_field('gallery_layout') == 'large_image_left' ) { ?>

  <div class="small-12 medium-6 column col-1">
    <div class="wrap item-50-100">
      <?php echo SSMPB\do_complex_gallery_image(0, 'gallery_medium', $functionality); ?>
    </div>
  </div>
  <div class="small-12 medium-6 column col-2">
    <div class="wrap item-25-50-l">
      <?php echo SSMPB\do_complex_gallery_image(1, 'gallery_medium', $functionality); ?>
    </div>
    <div class="wrap item-25-50-r">
      <?php echo SSMPB\do_complex_gallery_image(2, 'gallery_medium', $functionality); ?>
    </div>
    <div class="wrap item-50-50">
      <?php echo SSMPB\do_complex_gallery_image(3, 'gallery_small', $functionality); ?>
    </div>
  </div>


  <?php } elseif ( get_sub_field('gallery_layout') == 'large_image_right' ) { ?>


  <div class="small-12 medium-6 column col-1">
    <div class="wrap item-50-50">
      <?php echo SSMPB\do_complex_gallery_image(0, 'gallery_small', $functionality); ?>
    </div>
    <div class="wrap item-25-50-l">
      <?php echo SSMPB\do_complex_gallery_image(1, 'gallery_medium', $functionality); ?>
    </div>
    <div class="wrap item-25-50-r">
      <?php echo SSMPB\do_complex_gallery_image(2, 'gallery_medium', $functionality); ?>
    </div>
  </div>

  <div class="small-12 medium-6 column col-2">
    <div class="wrap item-50-100">
      <?php echo SSMPB\do_complex_gallery_image(3, 'gallery_medium', $functionality); ?>
    </div>
  </div>

  <?php } ?>
