<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="container">
      <?php if (have_posts()) : ?>

        <header class="page-header">
          <?php
            if (is_post_type_archive()) :
              echo '<h1 id="h1" tabindex="-1">' . post_type_archive_title('', false) . '</h1>';
            else :
              echo '<h1 id="h1" tabindex="-1">' . single_tag_title('', false) . '</h1>';
            endif;

            the_archive_description('<div class="taxonomy-description">', '</div>');
          ?>
        </header>

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
