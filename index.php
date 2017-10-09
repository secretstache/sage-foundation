<?php get_template_part('templates/page', 'header'); ?>

<section class="content-block">
  <div class="grid-container"> 
    <div class="grid-x grid-x-margin align-center">
      
    <?php if ( have_posts() ) { ?>
      
      <div class="cell small-11 medium-12">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
      </div>
  
      <?php if ( has_multiple_pages() == TRUE ) { ?>
        <div class="cell small-11 medium-12">
          <?php the_posts_navigation(); ?>
        </div>
		  <?php } ?>
  
    <?php } else { ?>

			<div class="small-11 medium-12 column">
				<div class="component alert">
					<?php _e('Sorry, no results were found.', 'sage'); ?>
				</div>
			</div>

    <?php } ?>
    
    </div>
  </div>
</section>
