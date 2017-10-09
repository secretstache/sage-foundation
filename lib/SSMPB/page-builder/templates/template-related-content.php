<?php

$related_content = get_sub_field('related_content_template');

global $template_args;
global $tpl_component;
global $tpl_header;

$tpl_header = get_sub_field('template_header');
$template_args['source'] = 'tpl';

$args = array(
    'post_type'   =>  'post',
    'status'    =>  'publish',
);

if ( $related_content['latest_or_curated'] == 'Curated' ) {
  $post_ids = $related_content['posts_to_show'];
  $args['post__in'] = $post_ids;
  $args['orderby'] = 'post__in';
} else {
  $args['posts_per_page'] = $related_content['number_of_posts_to_show'];
}

$post_query = new WP_Query( $args );

?>

<?php SSMPB\maybe_do_section_header(); ?>

<?php if ( $post_query->have_posts() ) { ?>

<div class="grid-container">

  <div class="grid-x main align-center">

    <div class="cell small-11 medium-10">

      <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3 align-center">

      <?php while ( $post_query->have_posts() ) { ?>
        <?php $post_query->the_post(); ?>

        <div class="cell post-item">

          <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>

            <?php the_excerpt(); ?>

        </div>

      <?php } ?>

      </div>

    </div>

  </div>

</div>

<?php wp_reset_postdata(); ?>

<?php } ?>

<?php unset($template_args['source']); ?>