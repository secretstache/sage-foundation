<?php

if ( ! post_password_required() ) {

  if (have_rows('content_blocks')) {

    global $template_args;
    $template_args = array();

    while (have_rows('content_blocks')) {

      the_row();

      if (get_row_layout() == 'template') {

          SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/sections/template.php', $template_args);

      } elseif (get_row_layout() == 'one_column') {

          SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/sections/one-column.php', $template_args);

      } elseif (get_row_layout() == 'two_columns') {

          SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/sections/two-columns.php', $template_args);

      } elseif (get_row_layout() == 'three_columns') {

          SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/sections/three-columns.php', $template_args);

      } elseif (get_row_layout() == 'four_columns') {

          SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/sections/four-columns.php', $template_args);

      }

    }

  }

}
