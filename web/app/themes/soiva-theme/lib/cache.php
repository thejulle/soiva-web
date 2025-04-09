<?php
/**
 * Cache hooks and functions
 *
 * @package soiva
 */

/**
 * Return Theme options data transient or save transient data if it doesn't exist
 */
function soiva_get_theme_options_transient() {
  // Check if theme_options transient exist
  if ($data = get_transient('theme_options_' . ICL_LANGUAGE_CODE)) :
    // Transient data found, return it
    return $data;
  else :
    // Transient data not found, get Theme options fields

    // First check if we're on a multisite installation
    if (is_multisite()) :
      $data = get_fields('option_' . get_current_blog_id() . '_' . ICL_LANGUAGE_CODE);
    else :
      $data = get_fields('option_' . ICL_LANGUAGE_CODE);
    endif;

    // Save footer data to transient
    set_transient('theme_options_' . ICL_LANGUAGE_CODE, $data, WEEK_IN_SECONDS);

    // Save return transient data
    return $data;
  endif;
}

/**
 * Delete transients when Theme options page is saved
 */
function soiva_starter_delete_transients() {
  delete_transient('theme_options_' . ICL_LANGUAGE_CODE);
}
add_action('acf/save_post', 'soiva_starter_delete_transients');
