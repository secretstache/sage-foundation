<?php

add_action('admin_init', 'ssm_remove_post_type_support');
/**
*  Remove Editor Support on Pages (Replaced with ACF Page Builder)
*/
function ssm_remove_post_type_support() {
  remove_post_type_support( 'page', 'editor' );
}

add_action( 'admin_init', 'remove_dashboard_meta' );
/**
 *  Remove default dashboards
 */
function remove_dashboard_meta() {
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
  remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' );
  remove_meta_box( 'wpe_dify_news_feed', 'dashboard', 'normal' );
}

// Remove default welcome panel
remove_action( 'welcome_panel', 'wp_welcome_panel' );

add_shortcode('year', 'year_shortcode');
/**
 *  Current Year as shortcode
 */
function year_shortcode() {
  $year = date('Y');
  return $year;
}

// Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );

function wrap_gform_cdata_open( $content = '' ) {
  if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
    return $content;
  }
  $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
  return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );

function wrap_gform_cdata_close( $content = '' ) {
  if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
  return $content;
  }
  $content = ' }, false );';
  return $content;
}
