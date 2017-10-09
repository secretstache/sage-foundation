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

$column_widths = get_sub_field( 'three_column_width_options' );
$grid_array = explode('_', $column_widths);
$alignment = strtolower( sanitize_title_with_dashes( get_sub_field( 'column_alignment' ) ) );

$maybe_set_equalizer = $alignment == 'top' ? ' data-equalizer data-equalize-on="small"' : '';
$maybe_set_equalizer_watch = $alignment == 'top' ? '  data-equalizer-watch' : '';

if ( get_sub_field('background_options') == 'Image' && get_sub_field('background_image') != NULL ) {
  $image = get_sub_field('background_image');
  $style = ' style="background-image: url(' . $image['url'] . ')"';
}

echo '<section' . SSMPB\section_id_classes() . $style . '>';

  SSMPB\maybe_do_section_header();

  if ( have_rows( 'three_column_components' ) ) {

    echo '<div class="grid-container">';

      echo '<div class="grid-x grid-margin-x main has-3-cols align-center align-' . $alignment . '"' . $maybe_set_equalizer .'>';

      $i = 1;
      $pluck = 0;

      while ( have_rows( 'three_column_components' ) ) {

        the_row();

          // Pass along unique grid/column width for use on component template
          $template_args['column_width'] = $grid_array[$pluck];

        echo '<div class="cell small-11 medium-' . $grid_array[$pluck] . ' col-' . $i . '"' . $maybe_set_equalizer_watch . '>';

          SSMPB\do_column( $template_args );

        echo '</div>';

        $i++;
        $pluck++;

      }

      echo '</div>';

    echo '</div>';

  }

echo '</section>';
