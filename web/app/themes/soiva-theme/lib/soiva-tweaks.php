<?php
/**
 * Helper functions
 *
 * @package soiva
 */

/**
 * Clean WP-Head
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

add_filter('show_recent_comments_widget_style', '__return_false');
add_filter('use_default_gallery_style', '__return_false');
add_filter('emoji_svg_url', '__return_false');

/**
 * Hide Posts from Admin menu
 */
// add_action('admin_menu', function() { remove_menu_page('edit.php'); });

/**
 * Hide Comments from Admin menu
 */
add_action('admin_menu', function() { remove_menu_page('edit-comments.php'); });


/**
 * Move JS files to footer
 */
function js_to_footer() {
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', 'js_to_footer');

/**
 * Allow SVG
 */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
    return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
    .attachment-266x266, .thumbnail img {
       width: 100% !important;
       height: auto !important;
    }
  </style>';
}
add_action( 'admin_head', 'fix_svg' );

/**
 * Custom ACF Link printing
 */
function soiva_acf_link($arr, $classes = '', $echo = true) {
  if (!empty($arr['url']) && !empty($arr['title'])) :
    $link = '<a href="'.esc_url($arr['url']).'"';

    if ($arr['target']) :
      $link .= ' target="'.esc_attr($arr['target']).'" rel="noopener"';
    endif;

    if ($classes) :
      $link .= ' class="'.esc_attr($classes).'"';
    endif;

    $link .= '>'.esc_html($arr['title']).'</a>';

    if ($echo) :
      echo $link;
    else :
      return $link;
    endif;

  else :
    return false;
  endif;
}

/**
 * Add or remove 'current_page_parent' class from navigation itmes where they should/shouldn't appear
 *
 * TO-DO: Check is this still needed
 */
function custom_active_item_classes($classes = [], $menu_item = false){
  //if( (is_single() || is_archive()) && get_post_type() != 'post'):
  if (is_single() || is_post_type_archive()) :

    global $post;
    $obj = get_post_type_object( $post->post_type );
    if ( $menu_item->url == get_post_type_archive_link($post->post_type) || $menu_item->title == $obj->label ) :
      $classes[] = (!in_array('current_page_parent', $classes) ? 'current_page_parent' : '');
    else :
      $classes = array_diff( $classes, ['current_page_parent'] );
    endif;

  endif;

  return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );

/**
 * Modify TinyMCE editor to remove H1.
 */
function tiny_mce_remove_h1($init) {
  $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Pre=pre';
  return $init;
}

add_filter('tiny_mce_before_init', 'tiny_mce_remove_h1' );

/**
 * Hide ACF UI from WP Admin in staging & production
 */
if (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] !== 'soiva.local') :
  add_filter('acf/settings/show_admin', '__return_false');
endif;

/**
 * Check is constant ICL_LANGUAGE_CODE defined, a.k.a. is Polylang (or WPML) installed.
 * If not, set ICL_LANGUAGE_CODE to 'fi' or 'en'.
 */
if (!defined('ICL_LANGUAGE_CODE')) :
  if (get_locale() === 'fi') :
    define('ICL_LANGUAGE_CODE', 'fi');
  else :
    define('ICL_LANGUAGE_CODE', 'en');
  endif;
endif;

/**
 * ACF Options page
 */
if (function_exists('acf_add_options_page')) :
  if (is_multisite()) :
    acf_add_options_page([
      'page_title' => 'Theme options',
      'post_id' => 'option_' . get_current_blog_id() . '_' . ICL_LANGUAGE_CODE
    ]);
  else :
    acf_add_options_page([
      'page_title' => 'Theme options',
      'post_id' => 'option_' . ICL_LANGUAGE_CODE
    ]);
  endif;
endif;

/**
 * ACF: Disable ACF shortcode
 *
 * @link https://www.advancedcustomfields.com/blog/acf-6-0-3-release-security-changes-to-the-acf-shortcode-and-ui-improvements/
 */

add_action('acf/init', 'soiva_disbale_acf_shortcode');
function soiva_disbale_acf_shortcode() {
  acf_update_setting('enable_shortcode', false);
}
