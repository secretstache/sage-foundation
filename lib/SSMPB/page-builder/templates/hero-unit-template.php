<?php

$image = get_sub_field('hero_background_image');
$style = $image = get_sub_field('hero_background_image') ? ' style="background-image: url(' . $image['url'] . ');"' : '';

?>

<div class="background-image"<?php echo $style; ?>>

  <div class="row align-center">

    <div class="small-12 medium-10 column">

      <header class="hero-header">

        <?php $title = get_sub_field('use_page_title') == TRUE ? get_the_title() : get_sub_field('hero_custom_headline'); ?>

        <h1 class="hero-headline"><?php echo $title; ?></h1>

        <?php if ( $subheadline = get_sub_field('hero_subheadline') ) { ?>

        <h2 class="hero-subheadline"><?php echo $subheadline; ?></h2>

        <?php } ?>

        <?php if ( $buttons = get_sub_field('buttons') ) { ?>

        <p class="buttons">

        <?php foreach ( $buttons as $button ) { ?>

        <?php $class = 0 == $i % 2 ? 'outline' : 'white'; ?>
        <?php $target = $button['target'] == 'New Tab' ? '_blank' : '_self'; ?>

          <a class="button button-<?php echo $class; ?>" href="<?php echo $button['url']; ?>" target="<?php echo $target; ?>"><?php echo $button['label']; ?></a>

        <?php $i++; ?>

        <?php } ?>

      </p>

      <?php } ?>

      </header>

    </div>

  </div>

</div>
