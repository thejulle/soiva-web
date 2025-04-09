<?php
/**
 * Hide users' identities
 *
 * @package soiva
 */

/**
 * Rename users to sitename (only front-end)
 *
 * @param string $name the name of the author
 *
 * @return string name of the author
 */
function soiva_starter_rename_authors($name) {

  if (is_admin()) {
    return $name;
  }

  return get_bloginfo('name');
}
add_filter('the_author', 'soiva_starter_rename_authors', 100);
add_filter('the_modified_author', 'soiva_starter_rename_authors', 100);

/**
 * Link user to front page
 *
 * @param string $url link to author archive
 *
 * @return string link to site url
 */
function soiva_starter_author_link_to_front_page($url) {

  return get_site_url();
}
add_filter('get_the_author_link', 'soiva_starter_author_link_to_front_page', 100);

/**
 * Disable users from REST API
 *
 * @param array $endpoints registered routes
 *
 * @return array registered routes
 */
function soiva_starter_disable_user_endpoints($endpoints) {
  // hide endpoints if user is not logged in
  if (!is_user_logged_in()) :

    // disable list of users
    if (isset($endpoints['/wp/v2/users'])) :
        unset($endpoints['/wp/v2/users']);
    endif;

    // disable single user
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) :
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    endif;

  endif;

  return $endpoints;
}
add_filter('rest_endpoints', 'soiva_starter_disable_user_endpoints', 1000);
