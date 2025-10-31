<?php
$args = array_merge(
    $attributes,
    array('content' => $content)
);

get_template_part('template-parts/tiles/tile-v1-rich-text', null, $args);
?>