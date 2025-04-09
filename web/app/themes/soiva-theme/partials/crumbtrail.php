<?php
/**
 * Crumbtrail
 */

$ancestors = [];

if (is_page()) :
  // Use array_reverse for items to be printed in correct order
  $ancestors = array_reverse(get_post_ancestors($post->ID));

elseif (is_singular('cpt-name')) :
  // Page ID for post type that has a "fake" archive page
  // $ancestors[] = function_exists('pll_get_post') ? pll_get_post(123) : 123;

endif;

if (!is_front_page()) :
  ?>
  <nav class="crumbtrail" aria-label="<?php _e('Crumbtrail', 'soiva'); ?>">
    <ol>
      <li>
        <a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      </li>
      <?php
        // Post types that have real archive pages
        if (is_singular(['cpt-name'])) :
          $post_type_object = get_post_type_object($post->post_type);
          ?>
            <li>
              <a href="<?= esc_url(get_post_type_archive_link($post->post_type)); ?>"><?= esc_html(__($post_type_object->label, 'soiva')); ?></a>
            </li>
          <?php
        else :
          foreach ($ancestors as $ancestor) :
            ?>
              <li>
                <a href="<?= esc_url(get_permalink($ancestor)); ?>"><?= esc_html(get_the_title($ancestor)); ?></a>
              </li>
            <?php
          endforeach;
        endif;
      ?>
      <li aria-hidden="true">
        <?= esc_html($post->post_title); ?>
      </li>
    </ol>
  </nav>
  <?php
endif;
