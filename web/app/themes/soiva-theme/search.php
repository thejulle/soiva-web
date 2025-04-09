<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="container">
        <?php if (have_posts()) : ?>

          <header class="page-header">
            <h1 id="h1" tabindex="-1" class="page-title"><?php printf(__('Search', 'soiva') . ': <span class="search-terms">' . get_search_query() . '</span>'); ?></h1>
          </header>

          <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('templates/content', 'search'); ?>

          <?php endwhile; ?>

        <?php else : ?>

          <?php get_template_part('templates/content', 'none'); ?>

        <?php endif; ?>
      </div>

    </main>
  </div>

<?php
get_footer();
