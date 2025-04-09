<?php
/**
 * Register: Assets
 *
 * Enqueue scripts and stylesheets for theme.
 * Append content into <head> or footer.
 * Include favicons.
 *
 * @package soiva
 */

/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', function() {

  // main css
  wp_enqueue_style(
    'soiva_starter-style',
    get_template_directory_uri() . '/dist/styles/main.css',
    [],
    filemtime(get_theme_file_path() . '/dist/styles/main.css')
  );

  // register main js
  wp_register_script(
    'soiva_starter-js',
    get_template_directory_uri() . '/dist/scripts/main.js',
    [],
    filemtime(get_theme_file_path() . '/dist/scripts/main.js'),
    true
  );

  // register script for block
  // wp_register_script(
  //   'example-block-script-handle',
  //   get_template_directory_uri() . '/dist/scripts/block-example.js',
  //   ['soiva_starter-js'],
  //   filemtime(get_theme_file_path() . '/dist/scripts/block-example.js')
  //   true
  // );

  // Localize script for ajax stuff
  // global $wp_query;
  // wp_localize_script('soiva_starter-js', 'ppJsParams', [
  //   'language' => ICL_LANGUAGE_CODE,
  //  ]);

  // Enqueue main js
  wp_enqueue_script('soiva_starter-js');

  // remove gutenberg default stylesheets
  wp_deregister_style('wp-block-library-theme');
  wp_dequeue_style('wp-block-library');

  // comments
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

});

/**
 * Enqueue styles for Gutenberg Editor
 */
add_action('enqueue_block_editor_assets', function() {

  // editor styles
  wp_enqueue_style(
    'soiva_starter-editor-styles',
    get_stylesheet_directory_uri() . '/dist/styles/editor.css',
    [],
    filemtime(get_theme_file_path() . '/dist/styles/editor.css')
  );

  // editor scripts
  wp_enqueue_script(
    'soiva_starter-editor-gutenberg-scripts',
    get_stylesheet_directory_uri() . '/dist/scripts/editor.js',
    ['wp-i18n', 'wp-blocks', 'wp-dom-ready'],
    filemtime(get_theme_file_path() . '/dist/scripts/editor.js'),
    true
  );

  // overwrite Core block styles with empty styles
  wp_deregister_style('wp-block-library');
  wp_register_style('wp-block-library', '');

  // overwrite Core theme styles with empty styles
  wp_deregister_style('wp-block-library-theme');
  wp_register_style('wp-block-library-theme', '');

}, 10);

/**
 * Enqueue scripts and styles for admin
 */
add_action('admin_enqueue_scripts', function() {

  // admin.css
  wp_enqueue_style(
    'soiva_starter-admin-css',
    get_stylesheet_directory_uri() . '/dist/styles/admin.css',
    [],
    filemtime(get_theme_file_path() . '/dist/styles/admin.css')
  );
});

/**
 * Enqueue styles for Classic Editor
 */
/*add_action('admin_init', function() {

  add_editor_style('dist/styles/editor-classic.css');

});*/

/**
 * Append to <head>
 */
/*add_action('wp_head', function() {

  // replace class no-js with js in html tag
  echo "<script>(function(d){d.className = d.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

});*/

/**
 * Append to footer
 */
add_action('wp_footer', function() {

});
