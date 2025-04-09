<?php
/**
 * Template part: Generic content template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<div <?php post_class('entry'); ?>>
  <header class="entry__header">

    <?php the_title('<h1 id="h1" tabindex="-1">', '</h1>'); ?>

    <div class="entry__meta">
      <?php soiva_starter_posted_on(); ?>
    </div>

  </header>

  <div class="entry__content">
    <?php the_content(); ?>
  </div>

  <footer class="entry__footer">
    <?php soiva_starter_entry_footer(); ?>
  </footer>
</div>
