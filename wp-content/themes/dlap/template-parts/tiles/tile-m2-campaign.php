<?php // print_r($args); ?>


<div class="tile-block tile-campaign box px-4 py-5 items-center" style="background-image: url('<?php echo $args['backgroundUrl'] ?? ''; ?>');">
    <div class="tile-content">
        <h2 class="tile-title"><?php echo $args['title'] ?? ''; ?></h2>
        <span class="tile-description"><?php echo $args['description'] ?? ''; ?></span>
        <a href="<?php echo $args['link'] ?? ''; ?>" class="tile-link">
            Read more
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/link-external.png" alt="read more" />
        </a>
    </div>
</div>
