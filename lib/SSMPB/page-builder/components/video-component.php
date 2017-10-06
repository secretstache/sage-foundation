<?php

$c_classes[] = 'video';

$iframe = get_sub_field('video_link');
$video_url = get_sub_field('video_link', false, false);
$player = '';

preg_match('/src="(.+?)"/', $iframe, $matches);

$src = $matches[1];
$params = array();

if ( strpos($video_url, 'vimeo') !== false ) {
  $params = array(
    'byline'    => 0,
    'title'     => 0,
    'portrait'  => 0
  );

  $player = ' vimeo';

} elseif ( strpos($video_url, 'youtube') !== false ) {
  $params = array(
    'rel'               => 0,
    'showinfo'          => 0,
    'modestbranding'    => 0,
    'vq'                => 'highres'
  );

  $player = ' youtube';
}

$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// add extra attributes to iframe html
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>

<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

    <div class="flex-video<?php echo $player; ?>">

    <?php echo $iframe; ?>

    </div>

</div>
