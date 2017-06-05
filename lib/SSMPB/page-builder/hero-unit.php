<?php

if ( ! post_password_required() ) {

  if (have_rows('hero_unit')) {

    global $template_args;
    $template_args = array();

    while (have_rows('hero_unit')) {

      the_row();

      if (get_row_layout() == 'one_column') {

        SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/hero-unit/one-column.php', $template_args);

      } elseif (get_row_layout() == 'two_columns') {

        SSMPB\hm_get_template_part( SSMPB_DIR . 'page-builder/hero-unit/two-columns.php', $template_args);

      }

    }

  }

}
