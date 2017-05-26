<?php

SSMPB\maybe_do_section_header();

$medium_up = get_sub_field('columns_per_row');
$small_up = round($medium_up/2);

if ( have_rows( 'block_grid_columns' ) ) {

	echo '<div class="row grid small-up-' . $small_up . ' medium-up-' . $medium_up . '">';
	
	while ( have_rows( 'block_grid_columns' ) ) {
		the_row();

		echo '<div class="column">';

			SSMPB\do_column( $template_args );

		echo '</div>';

	}

	echo '</div>';
}