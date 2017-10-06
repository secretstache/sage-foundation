<?php while (have_posts()) : the_post(); ?>
  <?php $post_type = get_post_type(); ?>
  <article <?php post_class(); ?>>

    <div class="grid-container">
      <div class="grid-x grid-margin-x align-center header-wrap">
        <div class="cell small-12 medium-10">
          <header class="<?php echo $post_type; ?>-header page-title">
            <h1 class="headline"><?php the_title(); ?></h1>
            <?php if ( $subheadline = get_field('single_subheadline') ) { ?>
            <h2 class="subheadline"><?php echo $subheadline; ?></h2>
            <?php } ?>
          </header>
        </div>
      </div>
    </div>

    <?php if ( get_the_content() ) { ?>
      <section class="content-block row-1 row-odd">
        <div class="grid-container">
          <div class="grid-x grid-maargin-x align-center">
            <div class="cell small-12 medium-8">
            <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>
    <?php } ?>

    <?php SSMPB\do_page_builder(); ?>

  </article>
<?php endwhile; ?>

