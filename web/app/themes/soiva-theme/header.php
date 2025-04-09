<?php
/**
 * Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

$theme_path = esc_url(get_bloginfo('template_url'));
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
/*
if ($_SERVER['SERVER_NAME'] === 'www.live-domain.fi' && getenv('WP_ENV') === 'production') :
// LIVE
  ?>
  <?php
else :
  // DEVELOPMENT / STAGING / ETC.
  ?>
  <?php
endif;
*/
?>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php
    /*
      Preload local .woff2 font files
      <link rel="preload" as="font" type="font/woff2" href="<?php echo $theme_path; ?>/dist/fonts/font.woff2" crossorigin>
    */
  ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php
/*
if ($_SERVER['SERVER_NAME'] === 'www.live-domain.fi' && getenv('WP_ENV') === 'production') :
// LIVE
  ?>
  <?php
else :
  // DEVELOPMENT / STAGING / ETC.
  ?>
  <?php
endif;
*/

/**
 * WordPress wp_body_open() with backwards compatibility
 *
 * @link https://developer.wordpress.org/reference/functions/wp_body_open/
 */

if ( function_exists( 'wp_body_open' ) ) {

  wp_body_open();

} else {

  do_action( 'wp_body_open' );

}

?>
<div id="page" class="site">

  <header id="site-header" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
    <a class="skip-to-content screen-reader-text" href="#h1"><?php _e('Skip to content', 'soiva'); ?></a>
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col">
          <a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home" itemprop="headline">
            <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
            <?php include get_theme_file_path('/assets/images/logo.svg'); ?>
          </a>
        </div>
        <div class="col-auto">
          <?php
            if (has_nav_menu('primary')) :
              ?>
                <button id="btn-toggle-menu" aria-expanded="false">
                  <span class="screen-reader-text"><?php _e('Toggle mobile navigation', 'soiva'); ?></span>
                </button>
                <nav id="primary-navigation" class="primary-navigation" aria-label="<?php _e('Primary menu'); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
                  <?php
                    /*
                    <button id="btn-close-menu" aria-expanded="true">
                      <span class="screen-reader-text"><?php _e('Close mobile navigation', 'soiva'); ?></span>
                    </button>
                    */
                  ?>
                  <ul id="primary-navigation__items" class="primary-navigation__items">
                    <?php
                      wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => '',
                        'menu_id'        => 'primary-navigation__items',
                        'menu_class'     => 'primary-navigation__items',
                        'link_before'    => '',
                        'link_after'     => '',
                        'fallback_cb'    => '',
                        'items_wrap'     => '%3$s',
                      ]);
                    ?>
                    <li>
                      <button class="btn-login"><?php include get_theme_file_path('/assets/images/icon-login.svg'); ?> Login</button>
                    </li>
                    <li>
                      <button class="btn-lang-menu"><?php include get_theme_file_path('/assets/images/icon-lang-menu.svg'); ?> <?= strtoupper(ICL_LANGUAGE_CODE); ?></button>
                    </li>
                  </ul>
                </nav>
              <?php
            endif;
          ?>
        </div>
      </div>
    </div>
  </header>

  <div id="content" class="site-content" itemscope itemprop="mainContentOfPage">
