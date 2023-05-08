<?php
/**
 * Template Name: Homepage Template
 */

get_header(); ?>



<main id="skip-content">
  

  <section id="featured-topic" class="py-5">
    <div class="container">
      <h3 class="mb-5 text-center "><?php echo esc_html(get_theme_mod('smart_cleaning_featured_category_title','')); ?></h3>
      <div class="row">
        <?php
          $smart_cleaning_featured_cat1 = get_theme_mod('smart_cleaning_featured_category_1','');
          if($smart_cleaning_featured_cat1){
            $smart_cleaning_page_query4 = new WP_Query(array( 'category_name' => esc_html($smart_cleaning_featured_cat1,'handyman-cleaning-service')));
            while( $smart_cleaning_page_query4->have_posts() ) : $smart_cleaning_page_query4->the_post(); ?>
              <div class="col-lg-6 col-md-4">
                <div class="featured-imagebox mb-4">
                  <div class="row">
                    <div class="col-lg-5 col-md-12 align-self-center">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="col-lg-7 col-md-12 align-self-center">
                      <h4 class="mt-2"><?php the_title(); ?></h4>
                      <p><?php $handyman_cleaning_service_excerpt = get_the_excerpt(); echo esc_html( smart_cleaning_string_limit_words( $handyman_cleaning_service_excerpt, 15 )); ?></p>
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','handyman-cleaning-service'); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

 

  <!-- <section id="content-section" class="container">
    <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
    ?>
  </section> -->
</main>

<?php get_footer(); ?>
