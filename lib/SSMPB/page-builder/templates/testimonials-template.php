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

<div class="row align-top">
  <div class="small-12 column">
    <ul class="testimonials-slider">

    <?php while ( $post_query->have_posts() ) { ?>
      <?php $post_query->the_post(); ?>

      <?php if ( get_field('override_default_background_image') == TRUE  && $image = get_field('testimonial_background_image')) { ?>
          <?php $background_image = $image['url']; ?>
      <?php } else { ?>
          <?php $default_image = get_field('default_testimonial_background_image', 'options'); ?>
          <?php $background_image = $default_image['url']; ?>
      <?php } ?>

      <li style="background-image: url(<?php echo $background_image; ?>)">
        <div class="testimonials-item">
          <?php if ( has_post_thumbnail() ) { ?>
          <div class="testimonials-thumb">
            <?php the_post_thumbnail(); ?>
          </div>
          <?php } ?>
          <blockquote class="testimonials-text">
            "<?php echo get_the_content(); ?>"
            <cite class="testimonials-author"><?php the_title(); ?></cite>
            <?php if ( $reference = get_field('reference') ) { ?>
            <div class="testimonials-position"><?php echo $reference; ?></div>
            <?php } ?>
          </blockquote>
        </div>
      </li>

    <?php } ?>

    </ul>
  </div>
</div>

<?php wp_reset_postdata(); ?>

<?php } ?>
