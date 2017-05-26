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

if ( get_sub_field('background_options') == 'Video' && get_sub_field('background_video') != NULL ) {

  $video = get_sub_field('background_video');

  echo '<video class="hero-video" autoplay loop>';
    echo '<source src="' . $video['url'] . '" type="video/mp4">';
  echo '</video>';

  echo '<div class="overlay"></div>';

}

if ( have_rows( 'full_width_components' ) ) {

  echo '<div class="row has-one-column align-center">';

    while ( have_rows( 'full_width_components' ) ) {

      the_row();

      $template_args['column_width'] = $column_width;

      echo '<div class="small-12 medium-' . $column_width . ' column">';

        SSMPB\do_column( $template_args );

      echo '</div>';

    }

  echo '</div>';

}

echo '</section>';
