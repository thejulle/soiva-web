<?php
/**
 * Remove commenting
 *
 * @package soiva
 */

/**
 * Disable support for comments and trackbacks in post types
 */
function soiva_starter_disable_comments_post_types_support() {

  $post_types = get_post_types();

  foreach ($post_types as $post_type) :
    if (post_type_supports($post_type, 'comments')) :
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    endif;
  endforeach;
}
add_action('admin_init', 'soiva_starter_disable_comments_post_types_support');

/**
 * Close comments on the front-end
 */
add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);

/**
 * Hide existing comments
 *
 * @param array $comments existing comments
 *
 * @return empty array
 */
function soiva_starter_disable_comments_hide_existing_comments($comments) {

    return [];
}
add_filter('comments_array', 'soiva_starter_disable_comments_hide_existing_comments', 10, 2);

/**
 * Remove comments page in menu
 */
function soiva_starter_disable_comments_admin_menu() {

  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'soiva_starter_disable_comments_admin_menu');

/**
 * Redirect any user trying to access comments page
 */
function soiva_starter_disable_comments_admin_menu_redirect()
{

  global $pagenow;

  if ($pagenow === 'edit-comments.php') :
    wp_redirect(admin_url());
    exit;
  endif;
}
add_action('admin_init', 'soiva_starter_disable_comments_admin_menu_redirect');

/**
 * Remove comments metabox from dashboard
 */
function soiva_starter_disable_comments_dashboard()
{

  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'soiva_starter_disable_comments_dashboard');

/**
 * Remove comments links from admin bar
 *
 * @global WP_Admin_Bar $wp_admin_bar the admin bar
 */
function soiva_starter_admin_bar_render()
{

  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'soiva_starter_admin_bar_render');
