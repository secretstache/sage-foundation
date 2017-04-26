<?php

$column_count = $template_args[ 'column_count' ];
$c_classes = 'gallery';

$images = get_sub_field('image_gallery');
$count = count($images);

if ( $count == 3 ) {
  $width_attr = '33';
  $size = 'gallery_medium';
} elseif ( $count == 2 ) {
  $width_attr = '50';
  $size = 'gallery_medium';
} elseif ( $count == 1 ) {
  $width_attr = '100';
  $size = 'gallery_large';
}

?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

  <div class="row gallery-wrap align-top collapse">

  <?php if ( $count == 4 ) {

    get_template_part('lib/SSMPB/page-builder/components/image-gallery-templates/four-images');

  } else { ?>

    <?php $functionality = get_sub_field('on_click_functionality'); ?>

    <div class="small-12 column">

    <?php foreach ( $images as $image ) { ?>

      <div class="wrap item-<?php echo $width_attr; ?>">

        <?php echo SSMPB\do_simple_gallery_image($image, $size, $functionality); ?>

      </div>

    <?php } ?>

    </div>

  <?php } ?>

  </div>

</div>
