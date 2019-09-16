<div class="pt-5 pb-5 col-lg-6 offset-lg-3 mb-5">
  <div class="text-center lead">
    <?php the_field('intro_text'); ?>
  </div>
</div>

<div class="mt-5  row no-gutters">
  <div class="col-lg-5 pt-5 pb-5 text-center d-flex justify-content center align-items-center">

    <div class="col-lg-10 offset-lg-1">
      <h4 class="category-quote"><?php the_field( 'first_product_category_quote' ); ?></h4>
      <p><?php the_field( 'first_product_category_text' ); ?></p>
      <?php $necklaces_link = get_term_link('necklaces', 'product_cat'); ?>
      <a class="shop-link" href="<?php echo esc_url( $necklaces_link ); ?>">SHOP</a>
    </div>

  </div>

  <div class="col-lg-7">
    <img class="img-fluid" src="<?php the_field( 'first_product_category_image' ); ?>" alt="">
  </div>
</div>

<div class=" row no-gutters mb-5">
  <div class="col-lg-7">
    <img class="img-fluid" src="<?php the_field( 'second_product_category_image' ); ?>" alt="">
  </div>

  <div class="col-lg-5 pt-5 pb-5 text-center d-flex justify-content center align-items-center">

    <div class="col-lg-10 offset-lg-1">
      <h4 class="category-quote"><?php the_field( 'second_product_category_quote' ); ?></h4>
      <p><?php the_field( 'second_product_category_text' ); ?></p>
      <?php $bracelets_link = get_term_link('bracelets', 'product_cat'); ?>
      <a class="shop-link" href="<?php echo esc_url( $bracelets_link ); ?>">SHOP</a>
    </div>

  </div>
</div>

<div class="mt-5 mb-5 pt-5 pb-5 col-lg-8 offset-lg-2">
  <div class="text-center pt-5 pb-5">
    <h2><?php the_field( 'quote_text' ); ?></h2>
  </div>
</div>

<div class="mt-5  row no-gutters">
  <div class="col-lg-5 pt-5 pb-5 text-center d-flex justify-content center align-items-center">

    <div class="col-lg-10 offset-lg-1">
      <h4 class="category-quote"><?php the_field( 'third_product_category_quote' ); ?></h4>
      <p><?php the_field( 'third_product_category_text' ); ?></p>
      <a class="shop-link" href="<?php echo get_page_link( get_page_by_path( 'bespoke' ) ); ?>">BESPOKE</a>
    </div>

  </div>

  <div class="col-lg-7">
    <img class="img-fluid" src="<?php the_field( 'third_product_category_image' ); ?>" alt="">
  </div>
</div>

<div class=" mb-5 row no-gutters">
  <div class="col-lg-7">
    <img class="img-fluid" src="<?php the_field( 'fourth_product_category_image' ); ?>" alt="">
  </div>

  <div class="col-lg-5 pt-5 pb-5 text-center d-flex justify-content center align-items-center">

    <div class="col-lg-10 offset-lg-1">
      <h4 class="category-quote"><?php the_field( 'fourth_product_category_quote' ); ?></h4>
      <p><?php the_field( 'fourth_product_category_text' ); ?></p>
      <a class="shop-link" style="font-weight:400;">COMING SOON</a>
    </div>

  </div>
</div>