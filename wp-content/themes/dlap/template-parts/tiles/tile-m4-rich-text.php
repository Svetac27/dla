<?php // Updated to use InnerBlocks content ?>

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
    <div class="blured-background px-4 py-5">
        <div class="blured-content">
            <?php if (!empty($args['bulletColor'])): ?>
                <style>
                    .blured-content ul li::before {
                        color: <?php echo esc_attr($args['bulletColor']); ?>;
                    }
                </style>
            <?php endif; ?>
            <?php
                if (!empty($args['content'])) {
                    echo $args['content'];
                } elseif (!empty($args['innerBlocks'])) {
                    echo $args['innerBlocks'];
                }
            ?>
        </div>
    </div>
</div>