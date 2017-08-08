<?php

$c_classes = 'testimonials';

$args = array(
    'post_type'   =>  'testimonial',
    'status'    =>  'publish',
);

$testimonial_ids = get_sub_field('testimonials_to_show');

$args['post__in'] = $testimonial_ids;
$args['orderby'] = 'post__in';

$post_query = new WP_Query( $args );

?>

<?php if ( $args['post__in'] != NULL && $post_query->have_posts() ) { ?>

<div class="row main align-top">
  <div class="small-12 column">
    <ul class="testimonials-slider">

    <?php while ( $post_query->have_posts() ) { ?>
      <?php $post_query->the_post(); ?>

      <h2 class="entry-title">
          <?php the_title(); ?>
      </h2>

    <?php } ?>

    </ul>
  </div>
</div>

<?php wp_reset_postdata(); ?>

<?php } ?>
