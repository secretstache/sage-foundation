<?php

// Bail if section is set to inactive
if ( get_sub_field('status') == 0 )
  return;

global $template_args;

if ( have_rows('template') ) {

  echo '<section' . SSMPB\section_id_classes() . '>';

  while ( have_rows('template') ) {

    the_row();

    if ( get_row_layout() == 'hero_unit' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/hero-unit-template.php', $template_args ) ;

    } elseif ( get_row_layout() == 'services' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/services-template.php', $template_args ) ;

    } elseif ( get_row_layout() == 'projects' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/projects-template.php', $template_args ) ;

    } elseif ( get_row_layout() == 'industries' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/industries-template.php', $template_args ) ;

    } elseif ( get_row_layout() == 'testimonials' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/testimonials-template.php', $template_args ) ;

    } elseif ( get_row_layout() == 'team' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/templates/team-template.php', $template_args ) ;

    }

  }

  echo '</section>';
}
