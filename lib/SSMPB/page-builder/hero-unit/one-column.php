<?php // HERO UNIT

global $column_count;
global $template_args;

$column_count = 1;
$template_args['section_type'] = 'hero_unit';
$column_width = get_sub_field('one_column_width_options');
$image = '';
$style = '';

if ( get_sub_field('background_options') == 'Image' && get_sub_field('background_image') != NULL ) {
  $image = get_sub_field('background_image');
  $style = ' style="background-image: url(' . $image['url'] . ')"';
}

echo '<section' . SSMPB\hero_unit_id_classes() . $style . '>';

if ( get_sub_field('background_options') == 'Video' && get_sub_field('background_video') != NULL ) {

  $video = get_sub_field('background_video');

  echo '<video class="hero-video" autoplay loop>';
    echo '<source src="' . $video['url'] . '" type="video/mp4">';
  echo '</video>';

  echo '<div class="overlay"></div>';

}


if ( have_rows( 'one_column_components' ) ) {

  echo '<div class="grid-container">';

    echo '<div class="grid-x grid-margin-x main has-1-col align-center align-middle">';

      while ( have_rows( 'one_column_components' ) ) {

        the_row();

        $template_args['column_width'] = $column_width;

        echo '<div class="cell small-12 medium-' . $column_width . '">';

          SSMPB\do_column( $template_args );

        echo '</div>';

      }

    echo '</div>';

  echo '</div>';

}

echo '</section>';
