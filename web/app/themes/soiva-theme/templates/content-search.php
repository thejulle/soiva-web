<?php
/**
 * Template part: Search results
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<div <?php post_class('entry'); ?>>
  <header class="entry__header">
    <?php the_title(sprintf('<h2 class="entry__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'); ?>

    <?php if (get_post_type() == 'post') : ?>
    <div class="entry__meta">
      <?php soiva_starter_posted_on(); ?>
    </div>
    <?php endif; ?>
  </header>

  <div class="entry__summary">
    <?php the_excerpt(); ?>
  </div>

  <footer class="entry__footer">
    <?php soiva_starter_entry_footer(); ?>
  </footer>
</div>
