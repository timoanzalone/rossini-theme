<div class="pt-5">

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="bespoke_slogan text-center mt-5 mb-5">
          <h1 class="bespoke-slogan"><?php the_field('bespoke_slogan'); ?></h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 offset-md-2">
        <!-- First bespoke text section -->
        <section class="row mb-5">
          <div class="col-md-6 pt-5">
            <div class="col-lg-8 offset-lg-2 pt-5">
              <p class="bespoke-section-title"><?php the_field( 'first_bespoke_title' ); ?><br><?php the_field( 'first_handwritten_title' ); ?></p>
              <p class="bespoke-text"><?php the_field( 'first_bespoke_text' ); ?></p>
            </div>
          </div>

          <div class="col-md-6 pt-5">
            <img class="img-fluid rellax img-bespoke-left-box" src="<?php the_field( 'first_bespoke_image' ); ?>" data-rellax-speed="1"
    data-rellax-percentage="0.5"></img>
          </div>
        </section>

        <!-- Bespoke quote section -->
        <section class="row mb-5 mt-5">
          <div class="col-md-6">
            <img class="img-fluid rellax" src="<?php the_field( 'second_bespoke_image' ); ?>" data-rellax-speed="1"
    data-rellax-percentage="0.5"></img>
          </div>

          <div class="col-md-6 off-white pt-5">
            <p class="bespoke-quote"><?php the_field( 'bespoke_quote' ); ?></p>
            <p class="bespoke-quote-autor"><?php the_field( 'bespoke_quote_author' ); ?></p>
          </div>
        </section>

        <!-- Second bespoke text section -->
        <section class="row mb-5">

          <div class="col-md-6">
            <div class="col-lg-8 offset-lg-2 pt-5">
              <p class="bespoke-section-title"><?php the_field( 'second_bespoke_title' ); ?><br><?php the_field( 'second_handwritten_title' ); ?></p>
              <p class="bespoke-text"><?php the_field( 'second_bespoke_text' ); ?></p>
            </div>
          </div>

          <div class="col-md-6">
            <img class="img-fluid rellax img-bespoke-left-box"
              src="<?php the_field( 'third_bespoke_image' ); ?>" data-rellax-speed="1"
    data-rellax-percentage="0.5"></img>
          </div>
        </section>

        <!-- Bespoke inquiries section -->
        <section class="row pb-5">
          <div class="col-lg-12 pb-5">

            <img class="img-fluid rellax mt-5 mx-auto d-block" src="<?php the_field( 'fourth_bespoke_image' ); ?>"
              alt="" data-rellax-speed="1"
    data-rellax-percentage="0.5">

            <div class="vertical-line mx-auto d-block mt-5 mb-5"></div>

            <div class="text-center bespoke-title mt-4 mb-4">Bespoke Enquiries</div>

            <div class="col-lg-8 offset-lg-2">
              <p><?php the_field( 'enquiry_bespoke_text' ); ?></p>
            </div>

            <a class="email-link text-center d-block mx-auto" href="mailto:#"><?php the_field( 'bespoke_email' ); ?></a>

          </div>
        </section>
      </div>
    </div>

  </div>
</div>

<script>
  // Also can pass in optional settings block
  var rellax = new Rellax('.rellax', {
    wrapper: null,
    round: true,
    vertical: true,
    horizontal: false
  });
</script>