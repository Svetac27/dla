<?php
$args = array_merge(
    $attributes,
    array('content' => $content)
);

get_template_part('template-parts/tiles/tile-m4-rich-text', null, $args);
?>