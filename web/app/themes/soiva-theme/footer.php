<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

 // Fetch data from theme options transient
$footer_data = soiva_get_theme_options_transient();
?>

  </div><!-- #content -->

  <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="container">
      <a class="site-footer__logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home" itemprop="headline">
        <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
        <?php include get_theme_file_path('/assets/images/logo-footer.svg'); ?>
      </a>
      <div class="row justify-content-between">
        <div class="col-md-4 col-lg-3">
          <p>SOIVA delivers effortless, personalized background music and professional audio automation. Our solutions enable businesses and broadcasters to access curated, rich soundscapes with minimal effort on their part.</p>
          <p class="text-gray-alt">Soiva Technology oy<br>Vat ID: FI34870215</p>
        </div>
        <div class="col-md-6 col-lg-3 col-xl-4">
          <?php
            if (has_nav_menu('primary')) :
              ?>
                <nav id="footer-navigation" class="footer-navigation" aria-label="<?php _e('Footer menu', 'soiva'); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
                  <ul>
                    <?php
                      wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => '',
                        'menu_id'        => 'footer-navigation__items',
                        'menu_class'     => 'footer-navigation__items',
                        'link_before'    => '',
                        'link_after'     => '',
                        'fallback_cb'    => '',
                        'items_wrap'     => '%3$s',
                      ]);
                    ?>
                    <li>
                      <button class="btn-login"><?php include get_theme_file_path('/assets/images/icon-login.svg'); ?> Login</button>
                    </li>
                  </ul>
                </nav>
              <?php
            endif;
          ?>
        </div>
        <div class="col-md-5 col-lg-4 col-xl-3">
          <h2>Get In The Soiva® Loop</h2>
        </div>
      </div>
    </div>
    <div class="site-footer__bottom">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col">
            <?php include get_theme_file_path('/assets/images/logo-footer-bottom.svg'); ?>
          </div>
          <div class="col-auto text-center text-gray">
            <span>&copy; 2025 Soiva Technology</span>
          </div>
          <div class="col text-right">
            <?php include get_theme_file_path('/assets/images/logo-dj-online.svg'); ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
