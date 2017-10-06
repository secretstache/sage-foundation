<?php

SSMPB\maybe_do_section_header();

$medium_up = get_sub_field('columns_per_row');
$small_up = round($medium_up/2);

if ( have_rows( 'block_grid_columns' ) ) {

	echo '<div class="grid-container">';

		echo '<div class="grid-x grid-margin-x main small-up-' . $small_up . ' medium-up-' . $medium_up . '">';
		
		while ( have_rows( 'block_grid_columns' ) ) {
			the_row();

			echo '<div class="cell">';

				SSMPB\do_column( $template_args );

			echo '</div>';

		}

		echo '</div>';

	echo '</div>';
}