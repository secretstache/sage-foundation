<?php

// Bail if section is set to inactive
if ( get_sub_field('status') == 0 )
  return;

global $column_count;
global $template_args;

$column_count = 3;

$template_args = array(
  'column_count' => $column_count
);

if ( get_sub_field('column_gutter') == 'Collapse' ) {
  $gutter = ' collapse';
  $template_args['gutter'] = 'collapse';
} else {
  $gutter = '';
}

$column_widths = get_sub_field( 'three_column_width_options' );
$grid_array = explode('_', $column_widths);
$alignment = strtolower( sanitize_title_with_dashes( get_sub_field( 'column_alignment' ) ) );

if ( get_sub_field('background_options') == 'Image' && get_sub_field('background_image') != NULL ) {
  $image = get_sub_field('background_image');
  $style = ' style="background-image: url(' . $image['url'] . ')"';
}

echo '<section' . SSMPB\section_id_classes() . $style . '>';

if ( get_sub_field('background_options') == 'Video' && get_sub_field('background_video') != NULL ) {

  $video = get_sub_field('background_video');

  echo '<video class="hero-video" autoplay loop>';
    echo '<source src="' . $video['url'] . '" type="video/mp4">';
  echo '</video>';

  echo '<div class="overlay"></div>';

}

SSMPB\maybe_do_section_header();

if ( have_rows( 'three_column_components' ) ) {

  echo '<div class="row has-3-cols align-' . $alignment . $gutter . '" data-equalizer>';

  $i = 1;
  $pluck = 0;

  while ( have_rows( 'three_column_components' ) ) {

    the_row();

      // Pass along unique grid/column width for use on component template
      $template_args['column_width'] = $grid_array[$pluck];

    echo '<div class="small-12 medium-' . $grid_array[$pluck] . ' column col-' . $i . '" data-equalizer-watch>';

      SSMPB\do_column( $template_args );

    echo '</div>';

    $i++;
    $pluck++;

  }

  echo '</div>';

}

echo '</section>';
