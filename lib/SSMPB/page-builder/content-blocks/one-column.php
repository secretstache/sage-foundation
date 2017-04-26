<?php

// Bail if section is set to inactive
if ( get_sub_field('status') == 0 )
  return;

global $column_count;
global $template_args;

$column_count = 1;

$column_width = get_sub_field('one_column_width_options');

if ( get_sub_field('background_options') == 'Image' && get_sub_field('background_image') != NULL ) {
  $image = get_sub_field('background_image');
  $style = ' style="background-image: url(' . $image['url'] . ')"';
}

echo '<section' . SSMPB\section_id_classes() . $style . '>';

// SSMPB\maybe_do_section_header();

if ( have_rows( 'full_width_modules' ) ) {

  echo '<div class="row has-one-column align-center collapse">';

    while ( have_rows( 'full_width_modules' ) ) {

      the_row();

      $template_args['column_width'] = $column_width;

      echo '<div class="small-12 medium-' . $column_width . ' column">';

        SSMPB\do_column( $template_args );

      echo '</div>';

    }

  echo '</div>';

}

echo '</section>';
