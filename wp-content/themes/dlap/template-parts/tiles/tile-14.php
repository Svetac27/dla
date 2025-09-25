<?php // print_r($args); ?>

<div class="box tile-dropdown items-center flex ">
    <div class="w-full relative">
        <div class="tile-title w-full">
            <?php echo $args['title'] ?? ''; ?>
        </div>
    </div>
    <?php $isExternalLink = isset($args['is_external_link']) && $args['is_external_link'] == true; ?>
    <?php if (isset($args['link'])): ?>
    <a href="<?php echo $args['link']; ?>" <?php echo $isExternalLink ? 'target="_blank"' : '';?>>
        <i class="text-4 icon-link-external opacity-50"></i>
    </a>
    <?php endif; ?>
</div>