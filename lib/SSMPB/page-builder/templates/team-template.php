<?php

$c_classes = 'team';

$args = array(
    'post_type'   =>  'team',
    'status'      =>  'publish',
);

$team_ids = get_sub_field('team_members_to_show');

$args['post__in'] = $team_ids;
$args['orderby'] = 'post__in';

$post_query = new WP_Query( $args );

?>

<?php SSMPB\maybe_do_section_header(); ?>

<?php if ( $args['post__in'] != NULL && $post_query->have_posts() ) { ?>

  <div class="row main align-center">

    <div class="small-12 medium-11 column">

      <div class="row small-up-1 medium-up-3">

      <?php while ( $post_query->have_posts() ) { ?>
        <?php $post_query->the_post(); ?>

        <h2 class="entry-title">
            <?php the_title(); ?>
        </h2>

      <?php } ?>

      </div>

    </div>

  </div>

  <?php wp_reset_postdata(); ?>

<?php } ?>
