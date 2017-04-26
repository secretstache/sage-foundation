<?php while (have_posts()) : the_post(); ?>
  <?php $post_type = get_post_type(); ?>
  <article <?php post_class(); ?>>

    <div class="row align-center header-wrap">
      <div class="small-12 medium-10 column">
        <header class="<?php echo $post_type; ?>-header page-title">
          <h1 class="headline"><?php the_title(); ?></h1>
          <?php if ( $subheadline = get_field('single_subheadline') ) { ?>
          <h2 class="subheadline"><?php echo $subheadline; ?></h2>
          <?php } ?>
        </header>
      </div>
    </div>

    <?php if ( get_the_content() ) { ?>
      <section class="content-block row-1 row-odd">
        <div class="row align-center">
          <div class="small-12 medium-8 column">

           <?php the_content(); ?>

          </div>
        </div>
      </section>
    <?php } ?>

    <?php SSMPB\do_page_builder(); ?>

  </article>
<?php endwhile; ?>

