<?php

$args = array(
    'post_type'   =>  'post',
    'status'    =>  'publish',
);

$post_ids = get_sub_field('posts_to_show');

$args['post__in'] = $post_ids;
$args['orderby'] = 'post__in';

$post_query = new WP_Query( $args );

?>

<?php SSMPB\maybe_do_section_header(); ?>

<?php if ( $args['post__in'] != NULL &&  $post_query->have_posts() ) { ?>

<div class="grid-container">

  <div class="grid-x main align-center">

    <div class="cell small-12 medium-10">

      <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">

      <?php while ( $post_query->have_posts() ) { ?>
        <?php $post_query->the_post(); ?>

        <div class="cell post-item">

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

</div>

<?php wp_reset_postdata(); ?>

<?php } ?>



