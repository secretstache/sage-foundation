<?php

$column_count = $template_args[ 'column_count' ];
$c_classes = 'gallery';

$images = get_sub_field('image_gallery');
$count = count($images);

?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

  <div class="row gallery-wrap align-top collapse">



  </div>

</div>
