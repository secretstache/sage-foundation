<?php

global $post;
global $template_args;

$c_classes = 'module-header';
$section_position = $template_args[ 'section_position' ];
$component_position = $template_args[ 'component_position' ];
$column_count = $template_args[ 'column_count' ];

if ( $column_count == 1 && $section_position == 1 && $component_position == 1 ) {
  $headline_tag_open = '<h1 class="headline">';
  $headline_tag_close = '</h1>';
  $subheadline_tag_open = '<h2 class="subheadline">';
  $subheadline_tag_close = '</h2>';
} else {
  $headline_tag_open = '<h2 class="headline">';
  $headline_tag_close = '</h2>';
  $subheadline_tag_open = '<h3 class="subheadline">';
  $subheadline_tag_close = '</h3>';
}

echo '<header' . SSMPB\component_id_classes( $c_classes ) . '>';

  if ( $headline = get_sub_field('headline') ) {

    echo $headline_tag_open . $headline . $headline_tag_close;

  }

  if ( $subheadline = get_sub_field('subheadline') ) {

    echo $subheadline_tag_open . $subheadline . $subheadline_tag_close;

  }

echo '</header>';
