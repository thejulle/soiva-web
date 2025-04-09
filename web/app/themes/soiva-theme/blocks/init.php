<?php
/**
 * Register blocks according to subfolders' 'block.json' files
 */

function soiva_register_acf_blocks() {
  // get all directories inside this directory
  $blocks = glob(__DIR__ . '/*', GLOB_ONLYDIR);

  foreach ($blocks as $block) :
    $block_path = explode('/', $block);

    // register block if folder isn't named 'example'
    if (end($block_path) !== 'example') :
      register_block_type($block);
    endif;
  endforeach;
}

add_action('init', 'soiva_register_acf_blocks', 5);
