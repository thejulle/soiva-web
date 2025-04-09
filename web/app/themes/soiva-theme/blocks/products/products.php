<?php
/**
 * Block: Products
 */

$image = get_field('image');
?>

<div id="products" class="products alignfull">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6 text-orange">
        <p class="products__top-text"><?php the_field('top_text'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9 text-orange">
        <h2><?php the_field('heading') ;?></h2>
      </div>
    </div>
    <div class="row align-items-end">
      <div class="col-lg-4 products__form">
        <p>Sales will start in May.<br><a href="#contact" class="btn">Contact for presales</a></p>
        <div>
          <label for="products-email">Subscribe for SOIVAzine</label><br>
          <input id="products-email" name="email" type="email" placeholder="Email">
        </div>
      </div>
      <div class="col-lg-8">
        <?= wp_get_attachment_image(get_field('image'), 'full', false, ['class' => 'products__image']); ?>
      </div>
    </div>
  </div>
</div>
