<form action="<?= esc_url(site_url()); ?>" method="get">
  <label for="search-form__input" class="screen-reader-text"><?php _e('Search', 'soiva'); ?></label>
  <input type="search" name="s" id="search-form__input" value="<?php the_search_query(); ?>" placeholder="<?php _e('Search', 'soiva'); ?>">
</form>
