<?php

// Bail if section is set to inactive
if ( get_sub_field('status') == 0 )
  return;

global $template_args;

$template = get_sub_field('template_selection');
$background = get_sub_field('background');
$style = '';

if ( $background['background_options'] == 'Image' && $background['background_image'] != NULL ) {
  $image = $background['background_image'];
  $style = ' style="background-image: url(' . $image['url'] . ');"';
}

if ( $template != NULL ) {

  echo '<section' . SSMPB\section_id_classes() . $style . '>';

    if ( $template == 'template-related-content' ) {

    SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/template-related-content.php', $template_args );

    }

  echo '</section>';

}