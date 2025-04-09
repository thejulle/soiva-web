<?php
/**
 * General Gutenberg editor settings
 *
 * @package soiva
 */

 /**
  * Register support for Gutenberg wide blocks in your theme
  */
function soiva_gutenberg_align_wide() {
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'soiva_gutenberg_align_wide');

// TSEKKAA NÄMÄ: https://developer.wordpress.org/block-editor/developers/themes/theme-support/
// add_theme_support('responsive-embeds');

/**
 * Remove color and font-size settings from blocks
 */
add_theme_support('editor-color-palette', []);
add_theme_support('disable-custom-colors');
add_theme_support('editor-font-sizes', []);
add_theme_support('disable-custom-font-sizes');

/**
 * Inline styles to Gutenberg editor (theme's styles + make WP Blocks wider)
 */
add_theme_support('editor-styles');
add_editor_style('dist/styles/editor-inline.css');

/**
 * Set explicitly allowed blocks (all others are disallowed)
 *
 * Notice that you need to manually add any custom block or plugins'
 * blocks here to appear on Gutenberg. This is to keep the control on what
 * is or is not allowed.
 *
 * @param bool|array $allowed_block_types list of block names or true for all
 * @param WP_Post $post the current post object
 *
 * @return array $allowed_block_types list of block names
 */
function soiva_gutenberg_allowed_blocks($allowed_block_types, $post) {

  $blocks = [];

   /**
   * Text
   */
  $blocks[] = 'core/paragraph';
  $blocks[] = 'core/heading';
  $blocks[] = 'core/list';
  $blocks[] = 'core/list-item';
  $blocks[] = 'core/quote';
  // $blocks[] = 'core/freeform'; // Classic
  // $blocks[] = 'core/code';
  // $blocks[] = 'core/pullquote';
  // $blocks[] = 'core/table';
  // $blocks[] = 'core/verse';

  /**
   * Media
   */
  $blocks[] = 'core/image';
  // $blocks[] = 'core/gallery';
  // $blocks[] = 'core/cover';
  $blocks[] = 'core/file';
  // $blocks[] = 'core/media-text';
  $blocks[] = 'core/video';

  /**
   * Design
   */
  $blocks[] = 'core/buttons';
  $blocks[] = 'core/button';
  // $blocks[] = 'core/columns';
  // $blocks[] = 'core/group';
  $blocks[] = 'core/separator';
  $blocks[] = 'core/spacer';

  /**
   * Widgets
   */
  $blocks[] = 'core/shortcode';

  /**
   * Theme
   */
  // $blocks[] = 'core/query';

  /**
   * Embeds
   */
  $blocks[] = 'core/embed';

  /**
   * Reusable blocks
   */
  // $blocks[] = 'core/block';

  /**
   * ACF blocks
   */

  $blocks[] = 'acf/hero';
  $blocks[] = 'acf/contact';
  $blocks[] = 'acf/products';

  return $blocks;

}
add_filter('allowed_block_types_all', 'soiva_gutenberg_allowed_blocks', 10, 2);

/**
 * Add 'Custom blocks' category
 */
function soiva_add_custom_blocks_category($block_categories, $block_editor_context) {
  return array_merge(
    $block_categories,
    [
      [
        'slug' => 'custom-blocks',
        'title' => __('Soiva Blocks', 'soiva'),
        'icon'  => null,
      ],
    ]
  );
}
add_filter('block_categories_all', 'soiva_add_custom_blocks_category', 10, 2);

