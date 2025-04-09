<?php
/**
 * Theme setup
 *
 * @package soiva
 */
function soiva_starter_setup() {
  /**
   *  Make theme available for translation
   *
   * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
   */
  load_theme_textdomain('soiva', get_template_directory() . '/lang');

  /**
   * Enable plugins to manage the document title
   *
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Title_Tag
   */
  add_theme_support('title-tag');

  /**
   * Register wp_nav_menu() menus
   *
   * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
   */
  register_nav_menus([
    'primary' => __('Primary menu', 'soiva'),
    'footer' => __('Footer menu', 'soiva')
  ]);

  /**
   * Enable post thumbnails
   *
   * @link https://codex.wordpress.org/Post_Thumbnails
   * @link https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
   * @link https://developer.wordpress.org/reference/functions/add_image_size/
   */
  add_theme_support('post-thumbnails');
  // add_image_size('160x160', 160, 160, true);

  /**
   * Enable excerpt field for pages
   */
  // add_post_type_support('page', 'excerpt');

  /**
   * Enable post formats
   *
   * @link https://wordpress.org/support/article/post-formats/
   */
  //add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  /**
   * Enable HTML5 markup support
   *
   * @link https://developer.wordpress.org/reference/functions/add_theme_support/#HTML5
   */
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
}
add_action('after_setup_theme', 'soiva_starter_setup');
