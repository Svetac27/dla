<?php // print_r($args); ?>

<div class="box flex items-center">
    <?php if (isset($args['image'])): ?>
        <div class="w-1/4 flex items-center text-center px-2">
            <img class="mx-auto max-w-full" src="<?php echo $args['image']; ?>" />
        </div>
    <?php endif; ?>
    <div class="w-full pl-4 text-left">
        <div class="tile-heading"><?php echo $args['title'] ?? ''; ?></div>
        <div class="tile-text"><?php echo $args['text'] ?? ''; ?></div>
    </div>
</div>