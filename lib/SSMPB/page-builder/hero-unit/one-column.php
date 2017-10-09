<?php // HERO UNIT

global $column_count;
global $template_args;

$column_count = 1;
$template_args['column_count'] = $column_count;
$column_width = get_field( 'hero_unit_one_column_width_options' );

if ( have_rows( 'one_column_components' ) ) {

  echo '<div class="grid-container">';

    echo '<div class="grid-x grid-margin-x main has-1-col align-center">';

      while ( have_rows( 'one_column_components' ) ) {

        the_row();

        echo '<div class="cell small-11 medium-' . $column_width . '">';

          SSMPB\do_column( $template_args );

        echo '</div>';

      }

    echo '</div>';

  echo '</div>';

}
