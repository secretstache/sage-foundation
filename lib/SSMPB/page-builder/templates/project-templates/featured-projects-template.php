<?php

$project_ids = get_sub_field('projects_to_show');

$args = array(
    'post_type'   =>  'project',
    'status'      =>  'publish',
    'post__in'    =>   $project_ids,
    'orderby'     =>   'post__in'
);

$post_query = new WP_Query( $args );

?>

<?php if ( get_sub_field('button_label') && get_sub_field('button_url') ) { ?>

  <div class="row collapse align-center">
    <div class="small-12 column">
      <div class="banner">
        <a href="<?php echo get_sub_field('button_url'); ?>"><?php echo get_sub_field('button_label'); ?></a>
      </div>
    </div>
  </div>

<?php } ?>

<?php if ( $args['post__in'] != NULL && $post_query->have_posts() ) { ?>

  <div class="row small-up-2 medium-up-3 large-up-6">

  <?php while ( $post_query->have_posts() ) { ?>
  <?php $post_query->the_post(); ?>

  <div class="thumb column">
    <a href="<?php the_permalink(); ?>">
      <?php $client_logo = get_field('client_dark_logo'); ?>
      <img src="<?php echo $client_logo['url']; ?>" alt="<?php the_title(); ?>" />
    </a>
  </div>

  <?php } ?>

  </div>

  <?php wp_reset_postdata(); ?>

<?php } ?>
