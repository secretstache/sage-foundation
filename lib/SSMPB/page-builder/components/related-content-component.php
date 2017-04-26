<?php

$c_classes = 'related';

$args = array(
    'post_type'		=>	'post',
    'status'		=>	'publish',
);

if ( get_sub_field( 'latest_or_curated' ) == 'Curated' ) {

    $content_ids = get_sub_field('content_to_show');

    $args['post__in'] = $content_ids;
    $args['orderby'] = 'post__in';

} elseif ( get_sub_field( 'latest_or_curated' ) == 'Latest' ) {

    $posts_per_page = get_sub_field( 'number_of_posts_to_show' );

    $args['posts_per_page'] = $posts_per_page;
    $args['orderby'] = 'date';

}

$post_query = new WP_Query( $args );

?>

<?php if ( $post_query->have_posts() ) { ?>

    <div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

        <?php while ( $post_query->have_posts() ) { ?>
            <?php $post_query->the_post(); ?>

            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <p class="date"><?php echo get_the_date(); ?></p>

        <?php } ?>

    </div>

    <?php wp_reset_postdata(); ?>

<?php } ?>