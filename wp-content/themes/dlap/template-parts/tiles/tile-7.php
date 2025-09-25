<?php 
$figure = $args['figure'] ?? ($args['number'] ?? '')
?>
<?php if (isset($args['link']) && !empty($args['link'])): ?>
    <a href="<?php echo $args['link'] ?? ''; ?>" class="figure-with-title box items-center w-full flex items-center relative">
<?php else: ?>
    <div class="figure-with-title box items-center w-full flex items-center relative">
<?php endif; ?>
    <div class="w-full h-full ">
        <div class="numbers-big w-full">
            <?php echo $figure; ?><span class="symbols-big"><?php echo $args['symbol'] ?? '+'; ?></span>
        </div>
        <div class="tile-text w-full">
            <?php echo $args['title'] ?? ($args['text'] ?? ''); ?>
        </div>

        <?php if (isset($args['link']) && !empty($args['link'])): ?>
            <span class="absolute bottom-0 right-0">
                <i class="icon-arrow-right opacity-50"></i> 
            </span>
        <?php endif; ?>
    </div>
<?php if (isset($args['link']) && !empty($args['link'])): ?>
    </a>
<?php else: ?>
    </div>
<?php endif; ?>