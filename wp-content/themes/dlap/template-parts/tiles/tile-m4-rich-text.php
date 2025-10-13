<?php // print_r($args); ?>


<div class="tile-block tile-rich-text box items-center">
    <div class="tile-header">
         <?php if (!empty($args['image'])): ?>
            <img
                class="tile-icon <?php echo !empty($args['smallerImage']) ? 'smaller-image' : ''; ?>"
                src="<?php echo esc_url($args['image']); ?>"
                alt="info-icon"
            />
        <?php endif; ?>
        <h3 class="tile-title"><?php echo $args['title'] ?? ''; ?></h3>
    </div>
    <div class="tile-background px-4 py-5">
        <div class="tile-content">
            <?php if (!empty($args['bulletColor'])): ?>
                <style>
                    .tile-content ul li::before {
                    color: <?php echo esc_attr($args['bulletColor']); ?>;
                    }
                </style>
                <?php endif; ?>
                    <?php
                        if (!empty($args['richText'])) {
                            echo $args['richText'];
                    }
                ?>
        </div>
    </div>
</div>
