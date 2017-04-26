<?php

$c_classes = 'industries';

$args = array(
    'post_type'   =>  'industry',
    'status'    =>  'publish',
);

$industry_ids = get_sub_field('industries_to_show');

$args['post__in'] = $industry_ids;
$args['orderby'] = 'post__in';

$post_query = new WP_Query( $args );

?>

<?php SSMPB\maybe_do_section_header(); ?>

<?php if ( $args['post__in'] != NULL && $post_query->have_posts() ) { ?>

  <div class="row align-center">

    <div class="small-12 medium-11 column">

      <div class="row small-up-1 medium-up-2 large-up-3">

      <?php while ( $post_query->have_posts() ) { ?>
        <?php $post_query->the_post(); ?>

        <?php $icon = has_post_thumbnail() == true ? get_the_post_thumbnail() : ''; ?>

        <div class="industry-item column">

        <?php if ( has_post_thumbnail() ) { ?>

          <div class="thumb">

            <?php the_post_thumbnail(); ?>

          </div>

        <?php } ?>

        <h2 class="entry-title"><?php the_title(); ?></h2>

        <?php if ( get_the_content() ) { ?>

          <?php the_content(); ?>

        <?php } ?>

        </div>

      <?php } ?>

      </div>

    </div>

  </div>

  <?php wp_reset_postdata(); ?>

<?php } ?>
