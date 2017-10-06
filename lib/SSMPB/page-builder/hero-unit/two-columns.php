<?php // Hero Unit

global $column_count;
global $template_args;

$column_count = 2;
$template_args['column_count'] = $column_count;
$template_args['section_type'] = 'hero_unit';
$column_widths = get_sub_field( 'two_column_width_options' );
$grid_array = explode('_', $column_widths);
$alignment = strtolower( sanitize_title_with_dashes( get_sub_field( 'column_alignment' ) ) );
$image = '';
$style = '';

if ( get_sub_field('column_gutter') == 'Collapse' ) {
  $gutter = ' collapse';
  $template_args['gutter'] = 'collapse';
} else {
  $gutter = '';
}

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

if ( have_rows( 'two_column_components' ) ) {

  echo '<div class="grid-container">';

    echo '<div class="grid-x grid-margin-x main has-2-cols align-' . $alignment . $gutter . '" data-equalizer>';

    $i = 1;
    $pluck = 0;

    while ( have_rows( 'two_column_components' ) ) {

      the_row();

      // Pass along unique grid/column width for use on component template
      $template_args['column_width'] = $grid_array[$pluck];

      echo '<div class="cell small-12 medium-' . $grid_array[$pluck] . ' col-' . $i . '" data-equalizer-watch>';

        SSMPB\do_column( $template_args );

      echo '</div>';

      $i++;
      $pluck++;

    }

    echo '</div>';

  echo '</div>';

}

echo '</section>';
