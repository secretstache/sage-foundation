<?php if ( is_page_template('landing-page.php') ) { ?>

<header class="site-header">
  <div class="row align-middle align-center">
    <div class="brand shrink column">

    <?php if ( $icon = get_field('brand_icon', 'options') ) { ?>
      <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="brand-icon">
    <?php } ?>
    
    <?php if ( $word_mark = get_field('brand_word_mark', 'options') ) { ?>
      <img src="<?php echo $word_mark['url']; ?>" alt="<?php echo $word_mark['alt']; ?>" class="brand-word-mark">
    <?php } else { ?>

      <p class="site-title">

        <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
  
      </p>

    <?php } ?>

    </div>
  </div>
</header>

<?php } else { ?>

<div class="off-canvas right" id="offCanvas" data-toggler=".is-active">
  <?php wp_nav_menu( array( 'menu' => 'primary_navigation', 'items_wrap' => '<ul class="vertical menu">%3$s</ul>', 'walker' => new Foundation_Nav_Walker )); ?>
  <button class="button off-canvas-close" data-toggle="offCanvas"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/x.svg" alt="" class="editable"></button>
</div>

<header class="site-header">
  <div class="row collapse align-middle align-justify">
    <div class="brand column shrink">
      <a href="<?php echo home_url('/'); ?>" class="logo">
        <?php if ( $icon = get_field('brand_icon', 'options') ) { ?>
        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="logo-pic">
        <?php } ?>
        <?php if ( $word_mark = get_field('brand_word_mark', 'options') ) { ?>
        <img src="<?php echo $word_mark['url']; ?>" alt="<?php echo $word_mark['alt']; ?>" class="company-name">
        <?php } else { ?>

          <?php echo get_bloginfo('name'); ?>

        <?php } ?>

      </a>
    </div>
    <nav class="primary-navigation column shrink">
      <?php wp_nav_menu( array( 'menu' => 'primary_navigation', 'items_wrap' => '<ul class="medium-horizontal menu show-for-medium dropdown" data-dropdown-menu>%3$s</ul>', 'walker' => new Foundation_Nav_Walker )); ?>
      <button class="hamburger hide-for-medium" type="button" data-toggle="offCanvas" aria-expanded="false" aria-controls="offCanvas">
        <span class="hamburger-line hamburger-line1"></span>
        <span class="hamburger-line hamburger-line2"></span>
        <span class="hamburger-line hamburger-line3"></span>
      </button>
    </nav>
  </div>
</header>

<?php } ?>
