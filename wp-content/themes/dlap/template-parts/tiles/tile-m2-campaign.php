<?php // print_r($args); ?>


<div class="box px-4 py-5 items-center">
    <div class="tile-title"><?php echo $args['title'] ?? ''; ?></div>
    <div class="tile-description"><?php echo $args['description'] ?? ''; ?></div>
    <div class="tile-link"><?php echo $args['link'] ?? ''; ?></div>
    <div class="tile-link"><?php echo $args['background'] ?? ''; ?></div>
</div>
