<?php get_template_part('templates/page', 'header'); ?>

<section class="content-block search">
  <div class="grid-container">  
    <div class="grid-x grid-x-margin align-center">
	    <?php if (have_posts()) { ?>
			<div class="cell small-11 medium-12">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'search'); ?>
        <?php endwhile; ?>
			</div>
			<div class="cell small-11 medium-12">
				<?php the_posts_navigation(); ?>
			</div>
      <?php } else { ?>
      <div class="cell small-11 medium-12">
        <div class="component alert">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
