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

add_filter( 'wpseo_metabox_prio', 'ssm_filter_yoast_seo_metabox' );
/**
 * Filter Yoast SEO Metabox Priority
 * TODO: Move to Framework
 */
function ssm_filter_yoast_seo_metabox() {
  return 'low';
}

// TODO: Move to Framework
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

  if ( post_type_exists('testimonial') ) {
    $wp_post_types['testimonial']->show_in_menu = 'ssm';
  }
  if ( post_type_exists('code-snippet') ) {
    $wp_post_types['code-snippet']->show_in_menu = 'ssm';
  }
  if ( post_type_exists('pricing-table') ) {
    $wp_post_types['pricing-table']->show_in_menu = 'ssm';
  }

}

if( function_exists('acf_add_options_page') ) {

  // Create options page and assign it to the LIB menu
  acf_add_options_sub_page(array(
    'page_title'  => 'Brand Settings',
    'menu_title'  => 'Brand Settings',
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

add_action( 'wp_head', 'ssm_do_facebook_pixel', 99);
/**
 * Dynamically Adds the Facebook Pixel
 *
 */
function ssm_do_facebook_pixel() {

if ( $fb_id = get_field('facebook_account_id', 'options') ) {

  global $post;

  $fb_standard_event = '';
  $value = '';

  if ( get_field('facebook_standard_event') != NULL && get_field('facebook_standard_event') == 'purchase' ) {

    if ( $value ) {

      $fb_standard_event = 'fbq("track", "Purchase", {"value": "' . $value . '" , "currency" : "USD"});';

    } else {

      $fb_standard_event = 'fbq("track", "Purchase");';

    }

  } elseif ( get_field('facebook_standard_event') != NULL ) {

    $fb_standard_event = get_field('facebook_standard_event');

  }

  ?>

  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','https://connect.facebook.net/en_US/fbevents.js');

  fbq("init", "<?php echo $fb_id; ?>");
  fbq("track", "PageView");
  <?php echo $fb_standard_event; ?>

  </script>

  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=<?php echo $fb_id; ?>&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

  <?php } ?>

<?php }