<?php
/**
 * Custom post type: Example
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */

 /*
function soiva_post_type_example() {

  $args = [
    'label'                 => __('Examples', 'soiva'),
    'description'           => __('Examples', 'soiva'),
    'supports'              => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'],
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'menu_icon'             => 'dashicons-media-text', // https://developer.wordpress.org/resource/dashicons/
    'show_in_rest'          => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'taxonomies'            => ['category'],
    'publicly_queryable'    => true,
    'rewrite'               => ['slug' => 'example', 'with_front' => false],
    'capability_type'       => 'page'
  ];

  register_post_type('example', $args);

}
add_action('init', 'soiva_post_type_example', 0);
*/
