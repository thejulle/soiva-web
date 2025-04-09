<?php
/**
 * Register custom post types and taxonomies from '/lib/post-types' folder
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */

$post_types = glob(__DIR__ . '/post-types/*.php');

foreach ($post_types as $post_type) :
  require($post_type);
endforeach;
