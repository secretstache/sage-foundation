<?php

global $template_args;
global $tpl_component;

$c_classes[] = 'video';

if ( $template_args['source'] == 'tpl' ) {

  $iframe = $tpl_component['video_link'];

} else {

  $iframe = get_sub_field('video_link');

}

preg_match('/src="(.+?)"/', $iframe, $matches);

$src = $matches[1];
$params = array();

if ( strpos( $iframe, 'vimeo' ) !== false ) {

  $params = array(
    'byline'    => 0,
    'title'     => 0,
    'portrait'  => 0,
    'quality'   => '1080p',
  );

  $c_classes[] = 'vimeo';

} elseif ( strpos( $iframe, 'youtube' ) !== false ) {

  $params = array(
    'rel'             => 0,
    'showinfo'        => 0,
    'modestbranding'  => 1,
    'vq'              => 'highres',
  );

  $c_classes[] = 'youtube';

}

$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

    <div class="embed-container widescreen">

    <?php echo $iframe; ?>

    </div>

</div>
