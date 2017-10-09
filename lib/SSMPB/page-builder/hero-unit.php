<?php

if ( ! post_password_required() ) {

  global $template_args;
  
  $image = '';
  $style = '';

  if ( get_field('background_options') == 'Image' && get_field('background_image') != NULL ) {
    $image = get_field('background_image');
    $style = ' style="background-image: url(' . $image['url'] . ')"';
  }
  
  echo '<section' . SSMPB\hero_unit_id_classes() . $style . '>';
  
  if ( get_field('background_options') == 'Video' && get_field('background_video') != NULL ) {
  
    $video = get_field('background_video');
  
    echo '<video class="hero-video" autoplay loop>';
      echo '<source src="' . $video['url'] . '" type="video/mp4">';
    echo '</video>';
  
    echo '<div class="overlay"></div>';
  
  }
  
  if ( get_field('hero_unit_layout') == 'one_column') {

    $template_args['column_width'] = '10';

    SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/hero-unit/one-column.php', $template_args);

  } elseif ( get_field('hero_unit_layout') == 'two_columns') {

    $template_args['column_width'] = '6';

    SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/hero-unit/two-columns.php', $template_args);

  }

  echo '</section>';

}
