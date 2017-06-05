<?php

global $post;
global $template_args;

$c_classes = 'hero-header';

echo '<header' . SSMPB\component_id_classes( $c_classes ) . '>';

  if ( get_sub_field('use_page_title_for_headline') == FALSE && get_sub_field('custom_hero_headline') ) {
    $headline = get_sub_field('custom_hero_headline');
  } else {
    $headline = get_the_title();
  }

  echo '<h1 class="headline">' . $headline . '</h1>';

  if ( $subheadline = get_sub_field('hero_subheadline') ) {
    echo '<h2 class="subheadline">' . $subheadline . '</h2>';
  }

echo '</header>';
