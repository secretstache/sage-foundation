<?php // Hero Unit

global $column_count;
global $template_args;

$column_count = 2;
$template_args['column_count'] = $column_count;
$column_widths = get_field( 'hero_unit_two_column_width_options' );

$grid_array = explode('_', $column_widths);
$alignment = sanitize_title_with_dashes( get_field( 'column_alignment' ) );

if ( have_rows( 'two_column_components' ) ) {

  echo '<div class="grid-container">';

    echo '<div class="grid-x grid-margin-x main has-2-cols align-center align-' . $alignment . '" data-equalizer>';

    $i = 1;
    $pluck = 0;

    while ( have_rows( 'two_column_components' ) ) {

      the_row();

      echo '<div class="cell small-11 medium-' . $grid_array[$pluck] . ' col-' . $i . '" data-equalizer-watch>';

        SSMPB\do_column( $template_args );

      echo '</div>';

      $i++;
      $pluck++;

    }

    echo '</div>';

  echo '</div>';

}

echo '</section>';
