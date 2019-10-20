<div class="pt-5 pb-5 col-lg-6 offset-lg-3 mb-5">
  <div class="text-center lead">
    <?php the_field('intro_text'); ?>
  </div>
</div>

<div class="pt-5">
  <h2 class="text-center"><?php echo __("Discover Horizons", "rossini");?></h2>
  <?php echo do_shortcode("[wcps id='2979']"); ?>
</div>

<div class="mt-5 mb-5 row">
  <div class="col-lg-10 offset-lg-1">
    <div class="row mb-5">
      <div class="col-lg-6 pt-5 pb-5 d-flex justify-content center align-items-center">
    
        <div class="col-lg-6 offset-lg-3">
          <h4 class="category-quote"><?php the_field( 'first_product_category_quote' ); ?></h4>
          <p><?php the_field( 'first_product_category_text' ); ?></p>
          <?php $necklaces_link = get_term_link('necklaces', 'product_cat'); ?>
          <a class="shop-link" href="<?php echo esc_url( $necklaces_link ); ?>">SHOP</a>
        </div>
    
      </div>
    
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php the_field( 'first_product_category_image' ); ?>" alt="">
      </div>
    </div>
    
    <div class="row mb-5">
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php the_field( 'second_product_category_image' ); ?>" alt="">
      </div>
    
      <div class="col-lg-6 pt-5 pb-5 d-flex justify-content center align-items-center">
    
        <div class="col-lg-6 offset-lg-3">
          <h4 class="category-quote"><?php the_field( 'second_product_category_quote' ); ?></h4>
          <p><?php the_field( 'second_product_category_text' ); ?></p>
          <?php $bracelets_link = get_term_link('bracelets', 'product_cat'); ?>
          <a class="shop-link" href="<?php echo esc_url( $bracelets_link ); ?>">SHOP</a>
        </div>
    
      </div>
    </div>
    
    <div class="row mb-5">
      <div class="col-lg-6 pt-5 pb-5 d-flex justify-content center align-items-center">
    
        <div class="col-lg-6 offset-lg-3">
          <h4 class="category-quote"><?php the_field( 'third_product_category_quote' ); ?></h4>
          <p><?php the_field( 'third_product_category_text' ); ?></p>
          <a class="shop-link" href="<?php echo get_page_link( get_page_by_path( 'bespoke' ) ); ?>">BESPOKE</a>
        </div>
    
      </div>
    
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php the_field( 'third_product_category_image' ); ?>" alt="">
      </div>
    </div>
    
    <div class=" mb-5 row">
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php the_field( 'fourth_product_category_image' ); ?>" alt="">
      </div>
    
      <div class="col-lg-6 pt-5 pb-5 d-flex justify-content center align-items-center">
    
        <div class="col-lg-6 offset-lg-3">
          <h4 class="category-quote"><?php the_field( 'fourth_product_category_quote' ); ?></h4>
          <p><?php the_field( 'fourth_product_category_text' ); ?></p>
          <a class="shop-link" style="font-weight:400;">COMING SOON</a>
        </div>
    
      </div>
    </div>
  </div>
</div>