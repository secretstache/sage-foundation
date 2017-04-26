<?php

if ( have_rows( 'components' ) ) {

  global $c_i;
  global $template_args;

  $c_i = 1;

  while ( have_rows( 'components' ) ) {

    the_row();

    $template_args['component_position'] = $c_i;

    if ( get_row_layout() == 'header' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/header-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'text_editor' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/text-editor-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'headline' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/headline-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'image' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/image-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'image_gallery' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/image-gallery-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'video' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/video-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'form' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/form-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'html_editor' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/html-editor-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'related_content' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/related-content-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'buttons' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/buttons-component.php', $template_args ) ;

    } elseif ( get_row_layout() == 'business_information' ) {

      SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/components/business-info-component.php', $template_args ) ;

    }

    $c_i++;

  }

}
