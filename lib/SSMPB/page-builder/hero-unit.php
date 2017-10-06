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

  } else {

    echo '<section class="hero-unit">';
      echo '<div class="grid-container">';
        echo '<div class="grid-x grid-margin-x align-center">';
          echo '<div class="cell small-12">';
            echo '<header class="component align-center">';
              echo '<h1 class="headline">' . get_the_title() . '</h1>';
            echo '</header>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    echo '</section>';

  }

}
