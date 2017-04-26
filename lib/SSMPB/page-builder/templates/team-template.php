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

  <div class="row align-center">

    <div class="small-12 medium-11 column">

      <div class="row small-up-1 medium-up-3">

      <?php while ( $post_query->have_posts() ) { ?>
        <?php $post_query->the_post(); ?>

        <?php $headshot = has_post_thumbnail() == true ? get_the_post_thumbnail() : ''; ?>
        <?php $name_array = explode( ' ', get_the_title() ); ?>
        <?php $first_name = $name_array[0]; ?>
        <?php $email = get_field('email_address'); ?>
        <?php $phone = get_field('phone_number'); ?>
        <?php $stripped_phone = preg_replace('/\D+/', '', $phone); ?>
        <?php $pinterest = get_field('pinterest_profile'); ?>

        <div class="member column">
          <?php if ( $headshot ) { ?>
          <div class="photo">
            <?php the_post_thumbnail(); ?>
          </div>
          <?php } ?>
          <div class="header">
            <p class="name"><?php echo $first_name; ?></p>
            <?php if ( $position = get_field('position') ) { ?>
            <p class="position"><?php echo $position; ?></p>
            <?php } ?>
          <?php if ( $email || $phone || $pinterest ) { ?>
          <ul class="contact-info">
            <?php if ( $email ) { ?>
            <li><a href="mailto:<?php echo $email; ?>" class="icon-mail"></a></li>
            <?php } ?>
            <?php if ( $phone ) { ?>
            <li><a href="tel:<?php echo $stripped_phone; ?>"" class="icon-phone"></a></li>
            <?php } ?>
            <?php if ( $pinterest ) { ?>
            <li><a href="<?php echo $pinterest; ?>" class="icon-pinterest"></a></li>
            <?php } ?>
          </ul>
          <?php } ?>
          </div>
          <div class="excerpt">
            <p><b><?php echo the_title(); ?></b>  <?php echo get_the_content(); ?></p>
          </div>
        </div>

      <?php } ?>

      </div>

    </div>

  </div>

  <?php wp_reset_postdata(); ?>

<?php } ?>
