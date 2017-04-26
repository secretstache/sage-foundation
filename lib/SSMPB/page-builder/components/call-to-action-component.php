<?php

$c_classes = 'call-to-action';

?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

    <?php if ( $headline = get_sub_field('headline') ) { ?>

        <h1 class="cta-headline"><?php echo $headline; ?></h1>

    <?php } ?>

    <?php if ( $subheadline = get_sub_field('subheadline') ) { ?>

        <h2 class="cta-subheadline"><?php echo $subheadline; ?></h2>

    <?php } ?>

    <?php if ( get_sub_field('button_text') && get_sub_field('button_url') ) { ?>

        <?php $target = ( get_sub_field('link_target') == 1 ) ? '_blank' : '_self'; ?>

        <a class="button" target="<?php echo $target; ?>" href="<?php echo get_sub_field('button_url'); ?>"><?php echo get_sub_field('button_text'); ?></a>

    <?php } ?>


</div>