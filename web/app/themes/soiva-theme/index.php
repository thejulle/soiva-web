<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="container">
        <?php if (have_posts()) : ?>

          <?php if (is_home() && !is_front_page()) : ?>
            <header>
              <h1 id="h1" tabindex="-1"><?php single_post_title(); ?></h1>
            </header>
          <?php endif; ?>

          <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('templates/teaser', $post->post_type); ?>

          <?php endwhile; ?>

        <?php else : ?>

          <?php get_template_part('templates/content', 'none'); ?>

        <?php endif; ?>
      </div>
    </main>
  </div>

<?php
get_footer();
