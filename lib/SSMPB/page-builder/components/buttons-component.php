<?php

$c_classes = 'buttons';
$buttons = get_sub_field( 'buttons' );
$layout_option = get_sub_field( 'layout_options' );

echo '<div' . SSMPB\component_id_classes( $c_classes ) . '>';

if ( $buttons ) {

  $button_count = count( $buttons );
  $percentage = 100/$button_count;

  foreach( $buttons as $button ) {

    $target = $button['target'] == 'New Tab' ? '_blank' : '_self';
    if ( $layout_option == 'Default') {
      $style = $button['style'] == 'Outline' ? ' button-outline' : ' button-fill';
      $width = '';
    } else {
      $style = ' button-maximize';
      $width = ' style="width: ' . $percentage . '%"';
    }

    echo '<a class="button' . $style .'" href="' . $button['url'] . '" target="' . $target . '"' . $width . '>' . $button['label'] . '</a>';

  }

}

echo '</div>';
