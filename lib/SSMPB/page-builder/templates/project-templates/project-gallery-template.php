<?php

if ( get_sub_field('project_sort_order') == 'By Title') {
  $orderby = 'title';
  $order = 'ASC';

} else {
  $orderby = 'date';
  $order = 'DESC';
}

$args = array(
    'post_type'       =>  'project',
    'status'          =>  'publish',
    'posts_per_page'  =>  -1,
    'orderby'         =>  $orderby,
    'order'           =>  $order
);


$post_query = new WP_Query( $args );

?>

<?php SSMPB\maybe_do_section_header(); ?>

<?php if ( $post_query->have_posts() ) { ?>

<div class="row collapse align-top">

  <div class="small-12 column">

  <div class="filter">
    <div class="filter-inner">
      <a href="#" class="all-work">All Work</a>
      <ul class="menu vertical medium-horizontal dropdown" data-dropdown-menu>
        <li><a href="#">Client</a>
          <ul class="menu" data-filter="client">
            <li><a href="#" class="active">All</a></li>
            <?php $clients = get_terms(array('taxonomy' => 'client', 'orderby' => 'name', 'order' => 'ASC')); ?>
            <?php foreach ( $clients as $client ) { ?>
            <li><a href="#"><?php echo $client->name; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="#">industry</a>
          <ul class="menu" data-filter="industry">
            <li><a href="#" class="active">All</a></li>
            <?php $industries = get_posts(array('post_type' => 'industry', 'status' => 'publish', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1)); ?>
            <?php foreach ( $industries as $post ) { ?>
              <?php setup_postdata( $post ); ?>
            <li><a href="#"><?php the_title(); ?></a></li>
            <?php } ?>
            <?php wp_reset_postdata();?>
          </ul>
        </li>
        <li><a href="#">medium</a>
          <ul class="menu" data-filter="medium">
            <li><a href="#" class="active">All</a></li>
            <?php $mediums = get_terms(array('taxonomy' => 'medium', 'orderby' => 'name', 'order' => 'ASC')); ?>
            <?php foreach ( $mediums as $medium ) { ?>
            <li><a href="#"><?php echo $medium->name; ?></a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>

    <div class="row small-up-1 medium-up-2 large-up-4 projects collapse">

    <?php while ( $post_query->have_posts() ) { ?>
      <?php $post_query->the_post(); ?>
      <?php $id = get_the_id(); ?>

      <?php

      $clients = get_the_terms($id, 'client');
      $mediums = get_the_terms($id, 'medium');
      $industry = get_field('industry');
      $client_terms = array();
      $medium_terms = array();
      $data = array();

      foreach ( $clients as $client ) {
        $client_terms[] = $client->name;
      }

      foreach ( $mediums as $medium ) {
        $medium_terms[] = $medium->name;
      }

      $data['client'] = implode(', ', $client_terms);
      $data['industry'] = $industry->post_title;
      $data['medium'] = implode(', ', $medium_terms);

      ?>

      <div class="column">
        <div class="project-item" data-client="<?php echo $data['client']; ?>"  data-industry="<?php echo $data['industry']; ?>" data-medium="<?php echo $data['medium']; ?>">
          <?php the_post_thumbnail('project_catalog'); ?>
          <div class="project-logo">
            <a href="<?php the_permalink(); ?>" class="project-link"></a>
            <?php $client_logo = get_field('client_white_logo'); ?>
            <img src="<?php echo $client_logo['url']; ?>" alt="<?php echo $client_logo['alt']; ?>">
            <a href="<?php the_permalink(); ?>" class="button button-outline">See work</a>
          </div>
        </div>
      </div>

    <?php } ?>

    </div>

  </div>

</div>

<?php wp_reset_postdata(); ?>

<?php } ?>
