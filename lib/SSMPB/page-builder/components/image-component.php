<?php

$c_classes = 'image';
$image = get_sub_field('image');
// $image_link = get_field('image_link', $image['ID']);

$gutter = $template_args['gutter'];
$column_count = $template_args['column_count'];

?>

<?php if ( $gutter == 'collapse') { ?>

  <div<?php echo SSMPB\component_id_classes( $c_classes ); ?> style="background: url(<?php echo $image['url']; ?>);">

    <?php if ( $image_link ) { ?>

    <a href="<?php echo $image_link; ?>"></a>

    <?php } ?>

  </div>

<?php } else { ?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

  <?php if ( $image_link ) { ?>

  <a href="<?php echo $image_link; ?>">

  <?php } ?>

  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php if ( $image_link ) { ?>

  </a>

  <?php } ?>

</div>

<?php } ?>
