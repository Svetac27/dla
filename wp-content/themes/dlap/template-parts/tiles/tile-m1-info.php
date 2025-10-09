<?php // print_r($args); ?>


<div class="tile-block tile-info box px-4 py-5 items-center" style="background-image: url('<?php echo $args['backgroundUrl'] ?? ''; ?>');">
    <div class="tile-content">
        <img class="tile-icon <?php echo $args['smallerImage'] ?? false ? 'smaller-image' : ''; ?>" src="<?php echo $args['image'] ?? ''; ?>" alt="info-icon" />
        <h3 class="tile-title"><?php echo $args['title'] ?? ''; ?></h3>
        <span class="tile-description"><?php echo $args['description'] ?? ''; ?></span>
    </div>
</div>
