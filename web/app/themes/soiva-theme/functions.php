<?php
/**
 * Functions and definitions
 *
 * @package soiva
 */

/**
 * Include features
 */
require_once 'lib/assets.php';                 // register assets
require_once 'lib/cache.php';                  // cache hooks and functions
require_once 'lib/gutenberg-settings.php';     // block editor settings
require_once 'blocks/init.php';                // init custom blocks
require_once 'lib/hide-users.php';             // hide users' identities
require_once 'lib/meta-tags.php';              // meta tags
require_once 'lib/remove-commenting.php';      // remove commenting
require_once 'lib/soiva-tweaks.php';           // helper functions
require_once 'lib/post-types.php';             // custom post types & taxonomies
require_once 'lib/setup.php';                  // general WP settings
