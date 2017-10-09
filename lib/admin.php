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


add_filter( 'wpseo_metabox_prio', 'ssm_filter_yoast_seo_metabox' );
/**
 * Filter Yoast SEO Metabox Priority
 * TODO: Move to Framework
 */
function ssm_filter_yoast_seo_metabox() {
  return 'low';
}

add_action( 'admin_menu', 'ssm_admin_menu' );
/**
 *  Add LIB menu item
 */
function ssm_admin_menu() {
  add_menu_page(
    __( 'Secret Stache', 'ssm' ), // page_title
    'Secret Stache', // menu_title
    'manage_options', // capability
    'ssm', // menu_slug
    '', // function
    'dashicons-layout', // icon
    5 // position
  );
}

add_action( 'init', 'ssm_move_cpts_to_admin_menu', 25 );
/**
 *  Move various menu items into LIB menu
 */
function ssm_move_cpts_to_admin_menu() {

  global $wp_post_types;

  if ( post_type_exists('insert_cpt') ) {
    $wp_post_types['insert_cpt']->show_in_menu = 'ssm';
  }

}

if( function_exists('acf_add_options_page') ) {

  // Create options page and assign it to the LIB menu
  acf_add_options_sub_page(array(
    'page_title'  => 'Brand Settings',
    'menu_title'  => 'Brand Settings',
    'parent_slug'   => 'ssm',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Documentation',
    'menu_title'  => 'Documentation',
    'parent_slug'   => 'ssm',
  ));

}

add_filter('acf/format_value/type=text', 'ssm_format_value', 10, 3);
add_filter('acf/format_value/type=textarea', 'ssm_format_value', 10, 3);
/**
 *  Filter text inputs and check for shortcode
 */
function ssm_format_value( $value, $post_id, $field ) {

  // run do_shortcode on all textarea values
  $value = do_shortcode($value);

  // return
  return $value;
}

add_filter( 'admin_body_class', 'is_front_admin_body_class' );
/**
 *  Filter the admin body classes if is_front
 */
function is_front_admin_body_class( $classes ) {

  global $post;

  $current_id = $post->ID;
  $front_page_id = get_option( 'page_on_front' );

  if ( $current_id == $front_page_id ) {
    return $classes = 'is-front';
  }

}