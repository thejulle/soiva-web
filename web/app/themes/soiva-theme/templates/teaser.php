<?php
/**
 * Template part: Teaser content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$bg_img = wp_get_attachment_image(get_post_thumbnail_id(), 'medium_large');
?>

<div class="teasers__teaser teasers__teaser--<?= esc_html($post->post_type); ?>">
  <a href="<?php the_permalink(); ?>" class="teasers__teaser__img" tabindex="-1" aria-hidden="true">
    <span class="screen-reader-text"><?php the_title(); ?></span>
    <?= $bg_img; ?>
  </a>
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</div>
