<?php

if ( ! post_password_required() ) {

  if (have_rows('content_blocks')) {

    global $s_i;
    global $template_args;
    $template_args = array();

    if (get_the_content()) {
        $s_i = 2;
    } else {
        $s_i = 1;
    }

    while (have_rows('content_blocks')) {

      the_row();

      $template_args['section_position'] = $s_i;

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

      $s_i++;

    }

  }

}
