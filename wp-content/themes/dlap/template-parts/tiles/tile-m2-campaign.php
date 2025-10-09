<?php // print_r($args); ?>


<div class="tile-block tile-campaign box px-4 py-5 items-center" style="background-image: url('<?php echo $args['backgroundUrl'] ?? ''; ?>');">
    <div class="tile-content">
        <h2 class="tile-title"><?php echo $args['title'] ?? ''; ?></h2>
        <span class="tile-description"><?php echo $args['description'] ?? ''; ?></span>
        <?php
            $link = $args['link'] ?? '';
            $is_external = preg_match('#^https?://#', $link);
            if (!$is_external) {
                $link = '/' . ltrim($link, '/');
            }
        ?>
        <a href="<?php echo esc_url($link); ?>"
            class="tile-link"
            <?php if ($is_external) : ?>
                target="_blank" rel="noopener"
            <?php endif; ?>
        >
            Read more
            <?php if ($is_external) : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/link-external.png" alt="external read more" />
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" alt="internal read more" />
            <?php endif; ?>
        </a>
    </div>
</div>
