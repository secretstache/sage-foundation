<?php

$args = array(
    'post_type'   =>  'service',
    'status'    =>  'publish',
);

$service_ids = get_sub_field('services_to_show');

$args['post__in'] = $service_ids;
$args['orderby'] = 'post__in';

$post_query = new WP_Query( $args );

?>

<?php SSMPB\maybe_do_section_header(); ?>

<?php if ( $args['post__in'] != NULL &&  $post_query->have_posts() ) { ?>

<div class="row main align-center">

  <div class="small-12 medium-10 column">

    <div class="row small-up-1 medium-up-2 large-up-3">

    <?php while ( $post_query->have_posts() ) { ?>
      <?php $post_query->the_post(); ?>

      <div class="service-item column">

        <h2 class="entry-title">
            <?php the_title(); ?>
        </h2>

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
