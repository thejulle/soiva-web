<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <div class="error-404 not-found">
        <div class="container">
          <h1 id="h1" tabindex="-1" class="entry-title"><?php _e('404: Page not found', 'soiva'); ?></h1>
          <div class="entry-content">
            <p><?php _e('404: Page not found description', 'soiva'); ?></p>
            <div class="search-404 search-form">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>

<?php
get_footer();
