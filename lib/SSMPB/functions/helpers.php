<?php

namespace SSMPB;

function do_page_builder( ) {
    \get_template_part( 'lib/SSMPB/page-builder/content-blocks');
}

function maybe_do_section_header() {

  global $post;
  global $template_args;
  $section_position = $template_args[ 'section_position' ];

  if ( $section_position == 1 ) {
    $headline_tag_open = '<h1 class="headline">';
    $headline_tag_close = '</h1>';
    $subheadline_tag_open = '<h2 class="subheadline">';
    $subheadline_tag_close = '</h2>';
  } else {
    $headline_tag_open = '<h2 class="headline">';
    $headline_tag_close = '</h2>';
    $subheadline_tag_open = '<h3 class="subheadline">';
    $subheadline_tag_close = '</h3>';
  }

  if ( get_sub_field('include_content_block_header') == TRUE ) {

    $html = '<div class="row align-center header-wrap">';
      $html .= '<div class="small-12 medium-10 column">';
        $html .= '<header class="section-header">';
          if ( $headline = get_sub_field('section_headline') ) {
            $html .= $headline_tag_open . $headline . $headline_tag_close;
          }
          if ( $subheadline = get_sub_field('section_subheadline') ) {
            $html .= $subheadline_tag_open . $subheadline . $subheadline_tag_close;
          }
        $html .= '</header>';
      $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }
}

function section_id_classes( $s_classes = '' ) {

  global $s_i;

  $even_odd = 0 == $s_i % 2 ? 'even' : 'odd';

  $inline_classes = get_sub_field('html_classes');

  $section_id_classes = '';

  if ( $html_id = get_sub_field('html_id') ) {
    $html_id = sanitize_html_class(strtolower($html_id));
    $section_id_classes .= ' id="' . $html_id . '" class="content-block row-' . $s_i . ' row-' . $even_odd;
  } else {
    $section_id_classes .= ' class="content-block row-' . $s_i . ' row-' . $even_odd;
  }

  if ( get_sub_field('background_color') != 'none' ) {
    $section_id_classes .= ' ' . sanitize_html_class( get_sub_field('background_color') );
  }

  // if ( get_sub_field('background_options') == 'Image' && get_sub_field('background_image') != NULL ) {
  //   $section_id_classes .= ' has-bg-image';
  // }

  if ( get_sub_field('template') == 'Hero Unit' ) {
    $section_id_classes .= ' hero-unit';
  }

  if ( have_rows('template') ) {
    while ( have_rows('template') ) {
      the_row();

      if ( get_row_index() > 1 )
        return;

      $template = get_row();
      $template = $template['acf_fc_layout'];

      if ( $template == 'projects' ) {
        $template = get_sub_field('project_options');
      } else {
        $template = strtolower($template);
      }

      $template = str_replace('_', '-', $template);

      $section_id_classes .= ' ' . $template;

      if ( $template == 'services' ) {
        $section_id_classes .= ' bg-gray-light';
      }

      if ( $template == 'testimonials' || $template == 'hero-unit' ) {
        $section_id_classes .= ' bg-image';
      }

    }
  }

  if ( $s_classes != NULL ) {
    $s_classes = \SSMCore\Helpers\sanitize_html_classes($s_classes);
    $section_id_classes .= ' ' . $s_classes;

  }

  if ( $inline_classes != NULL ) {
    $section_id_classes .= ' ' . $inline_classes;
  }

  $section_id_classes .= '"';

  return $section_id_classes;

}

function component_id_classes( $c_classes = '' ) {

  global $c_i;

  $even_odd = 0 == $c_i % 2 ? 'even' : 'odd';

  $inline_classes = get_sub_field('html_classes');

  $component_id_classes = '';

  if ( $html_id = get_sub_field('html_id') ) {
    $html_id = sanitize_html_class(strtolower($html_id));
    $component_id_classes .= ' id="' . $html_id . '" class="component stack-order-' . $c_i . ' stack-order-' . $even_odd;
  } else {
    $component_id_classes .= ' class="component stack-order-' . $c_i . ' stack-order-' . $even_odd;
  }

  if ( $bottom_border = get_sub_field('bottom_border') ) {
    $component_id_classes .= ' ' . sanitize_html_class( $bottom_border );
  }

  if ( $alignment = get_sub_field('alignment') ) {
    $component_id_classes .= ' ' . sanitize_html_class( $alignment );
  }

  if ( $c_classes != NULL ) {
    $c_classes = \SSMCore\Helpers\sanitize_html_classes($c_classes);
    $component_id_classes .= ' ' . $c_classes;

  }

  if ( $inline_classes != NULL ) {
    $component_id_classes .= ' ' . $inline_classes;
  }

  $component_id_classes .= '"';

  return $component_id_classes;

}

function column_id_classes( $col_classes = '' ) {

  $inline_classes = get_sub_field('html_classes');

  $column_id_classes = '';

  if ( $html_id = get_sub_field('html_id') ) {
    $html_id = sanitize_html_class(strtolower($html_id));
    $column_id_classes .= ' id="' . $html_id . '" class="inner';
  } else {
    $column_id_classes .= ' class="inner';
  }

  if ( get_sub_field('background_color') != 'none' ) {
    $column_id_classes .= ' ' . sanitize_html_class( get_sub_field('background_color') );
  }

  if ( have_rows('components') ) {
    while ( have_rows('components') ) {
      the_row();

      $component = get_row();
      $component = $component['acf_fc_layout'];

      if ( $component  == 'image' ) {
        $column_id_classes .= ' has-image';
      }
    }
  }

  if ( $col_classes != NULL ) {
      $col_classes = \SSMCore\Helpers\sanitize_html_classes($col_classes);
      $column_id_classes .= ' ' . $col_classes;

  }

  if ( $inline_classes != NULL ) {
      $column_id_classes .= ' ' . $inline_classes;
  }

  $column_id_classes .= '"';

    return $column_id_classes;

}

function do_column( $template_args = array() ) {

  echo '<div' . column_id_classes( $col_classes ) . '>';

    hm_get_template_part( SSMPB_DIR . 'page-builder/components.php', $template_args );

  echo '</div>';

}

/**
 * Like get_template_part() but lets you pass args to the template file
 * Args are available in the tempalte as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
function hm_get_template_part( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_func('get_id', $value);
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}

add_filter('acf/fields/flexible_content/layout_title/name=content_blocks', __NAMESPACE__ . '\\content_block_title', 10, 4);
/**
 * Update The Flexible Content Label
 * @since 1.0.0
 */
function content_block_title( $title, $field, $layout, $i ) {

    if ( get_row_layout() == 'template' ) {

      if ( have_rows('template') ) {
        while ( have_rows('template') ) {
        the_row();

        if ( get_row_index() > 1 )
        return;

        $template = get_row();
        $template = $template['acf_fc_layout'];
        $template = str_replace('_', ' ', $template);
        $template = ucwords( $template );

        }
      }

      $label = $template . ' Section';

    } else {

      if ( get_sub_field('section_label') ) {

        $label = get_sub_field('section_label');

      } else {

        $label = $title . ' Section';

      }

    }

    if ( get_sub_field('status') == 0 ) {
        $new_title = '<span style="color:red; font-weight:bold;">Inactive</span> - ' . $label;
    } else {
        $new_title = $label;
    }

    return $new_title;

}

add_action('wp_head', __NAMESPACE__ . '\\do_inline_css', 99);
/**
 * Injects inline CSS into the head
 * @since 1.0.0
 */
function do_inline_css() {

  global $post;
  $styles = array();

  if ( $global_styles = get_field('global_inline_styles', 'options') ) {
    $styles[] = $global_styles;
  }

  if ( $page_styles = get_field('page_inline_styles') ) {
    $styles[] = $page_styles;
  }

  foreach ( $styles as $style ) :
    $output .= $style;
  endforeach;

  if ( $output != '' ) {
    echo '<style id="inline-css">' . $output . '</style>';
  }

}

function do_simple_gallery_image( $image, $size = 'gallery_medium', $functionality = 'modal' ) {

  global $post;

  $src = $image['sizes'][$size];
  $data = '';
  $url = '';


  if ( $functionality == 'link') {
    $url = get_field('image_link', $image['ID']);
    $data = '';

  } elseif ( $functionality == 'modal') {
    $url = $image['url'];
    $data = ' data-fancybox="gallery"';
  }

  if ( $functionality != 'none' ) {
    $html = '<a href="' . $url . '"' . $data .'>';
      $html .= '<div class="overlay">';
  }

  if ( $functionality == 'link' ) {
    $html .= '<div class="overlay-content">';
      $html .= '<h2>' . $image['title'] . '</h2>';
      $html .= '<p>' . $image['description'] . '</p>';
      $html .= '<button class="button button-outline">See Work</button>';
    $html .= '</div>';
  }

  if ( $functionality != 'none') {
    $html .= '</div>';
      // <!-- end .overlay -->
  }

    $html .= '<img class="gallery-item" src="' . $src . '" alt="' .$image['alt'] . '" />';

  if ( $functionality != 'none' ) {
    $html .= '</a>';
  }

  return $html;


}

function do_complex_gallery_image( $id, $size = 'gallery_medium', $functionality = 'modal' ) {

  global $post;

  $images = get_sub_field('image_gallery');
  $data = '';
  $url = '';

  if ( $functionality == 'link') {
    $url = get_field('image_link', $images[$id]['ID']);
    $data = '';

  } elseif ( $functionality == 'modal') {
    $url = $images[$id]['url'];
    $data = ' data-fancybox="gallery"';
  }

  if ( $functionality != 'none' ) {
    $html = '<a href="' . $url . '"' . $data .'>';
      $html .= '<div class="overlay">';
  }

  if ( $functionality == 'link' ) {
    $html .= '<div class="overlay-content">';
      $html .= '<h2>' . $images[$id]['title'] . '</h2>';
      $html .= '<p>' . $images[$id]['description'] . '</p>';
      $html .= '<button class="button button-outline">See Work</button>';
    $html .= '</div>';
  }

  if ( $functionality != 'none') {
    $html .= '</div>';
      // <!-- end .overlay -->
  }

    $html .= '<img class="gallery-item" src="' . $images[$id]['sizes'][$size] . '" alt="' .$images[$id]['alt'] . '" />';

  if ( $functionality != 'none' ) {
    $html .= '</a>';
  }

  return $html;

}


add_action('admin_notices', __NAMESPACE__ . '\\ssmpb_notices');
/**
 * Conditionally shows message if URL contains ssmpb=save_reminder
 * @since 1.0.0
 */
function ssmpb_notices() {
  if ( isset($_GET["ssmpb"]) && trim($_GET["ssmpb"]) == 'save_reminder' ) {

    global $post;

    $post_type = get_post_type();

    echo '<div class="notice notice-warning is-dismissible">';
      echo '<p>After you save this new ' . $post_type . ' item, you will need to reload the last page to retreive it.</p>';
    echo '</div>';

  }
}
