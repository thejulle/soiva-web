<?php
/**
 * Block: Hero block
 */

$tag_list = get_field('tag_list');
$top_text = get_field('top_text');
$heading = get_field('heading');

?>
<div class="hero alignfull">
  <div class="hero__logo">
    <?php include get_theme_file_path('/assets/images/logo-text.svg'); ?>
  </div>
  <div class="hero__top">
    <div class="container">
      <?php
        if ($tag_list) :
          echo '<ul>';
            foreach ($tag_list as $tag) :
              echo '<li>' . esc_html($tag['tag']) . '</li>';
            endforeach;
          echo '</ul>';
        endif;
      ?>
    </div>
  </div>
  <div class="container">
    <div class="hero__content">
      <?php
        echo $top_text ? '<p class="hero__top-text">' . esc_html($top_text) .  '</p>' : '';

        if ($heading) :
          echo '<h1 id="h1" tabindex="-1">' . esc_html($heading) . '</h1>';
        elseif (!is_admin()) :
          the_title('<h1 id="h1" tabindex="-1">', '</h1>');
        else :
          echo '<h1 id="h1" tabindex="-1">' . esc_html(get_the_title($post_id)) . '</h1>';
        endif;
      ?>
      <div id="about" class="row">
        <div class="col-md-4">
          <?php the_field('description_left'); ?>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-md-5 text-black">
          <?php the_field('description_right'); ?>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </div>
</div>
