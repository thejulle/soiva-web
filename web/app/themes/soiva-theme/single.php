<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="container">
        <?php while (have_posts()) : the_post(); ?>

          <?php get_template_part('templates/content', $post->post_type); ?>

          <?php
          // if comments are open or we have at least one comment, load up the comment template
          /*
          if (comments_open() || get_comments_number()) :
            comments_template();
          endif;
          */
          ?>

        <?php endwhile; ?>
      </div>
    </main>
  </div>

<?php
get_footer();
