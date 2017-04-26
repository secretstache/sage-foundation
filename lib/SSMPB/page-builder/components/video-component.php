<?php

$c_classes[] = 'video';

$container_class = '';

if ( get_sub_field('display_as_full_width') == TRUE ) {
  $container_class = 'flex-video';
} else {
  $container_class = 'fixed-width';
}

?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

  <?php if ( get_sub_field('display_as_full_width') == FALSE ) { ?>

  <div class="video-container">

  <?php } ?>

    <div class="flex">

    <?php the_sub_field('video_link'); ?>

    </div>

  <?php if ( get_sub_field('display_as_full_width') == FALSE ) { ?>

  </div>

  <?php } ?>

</div>
