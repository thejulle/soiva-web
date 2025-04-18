<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('templates/content', 'page'); ?>

      <?php endwhile; ?>

    </main>
  </div>

<?php
get_footer();
