<?php


function ssm_get_primary_category() {
  global $post;

  $id = get_the_ID();
  $cat_count = count( get_the_category( $id ) );

  if ( class_exists( 'WPSEO_Primary_Term' ) && $cat_count > 1 ) {
    $primary = new WPSEO_Primary_Term('category', $id);
    $primary_cat_id = $primary->get_primary_term();
    $primary_category = get_category( $primary_cat_id );

  } else {

    $categories = get_the_category();
    $primary_category = $categories[0];

  }

  return $primary_category;

}