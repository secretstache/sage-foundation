<?php

// Bail if section is set to inactive
if ( get_sub_field('status') == 0 )
  return;

global $column_count;
global $template_args;

$column_count = 2;
$template_args['column_count'] = $column_count;

$column_widths = get_sub_field( 'two_column_width_options' );

$grid_array = explode('_', $column_widths);
$alignment = strtolower( sanitize_title_with_dashes( get_sub_field( 'column_alignment' ) ) );

if ( get_sub_field('column_gutter') == 'Collapse' ) {
  $gutter = ' collapse';
  $template_args['gutter'] = 'collapse';
} else {
  $gutter = '';
}



echo '<section' . SSMPB\section_id_classes() . '>';

SSMPB\maybe_do_section_header();

if ( have_rows( 'two_column_modules' ) ) {

  echo '<div class="row has-2-cols align-' . $alignment . $gutter . '" data-equalizer data-equalize-on="small">';

  $i = 1;
  $pluck = 0;

  while ( have_rows( 'two_column_modules' ) ) {

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
