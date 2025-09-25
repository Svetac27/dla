<?php

/* remove: for testing only */
// $args = [
//     'number' => 90,
//     'symbol' => '+',
//     'text' => 'Offices'
// ];
 
?>

<div class="box items-center w-full">
    <div class="w-full h-full relative">
        <div class="numbers-big w-full">
            <?php echo $args['number'] ?? '00'; ?><span class="symbols-big"><?php echo $args['symbol'] ?? '+'; ?></span>
        </div>
        <div class="tile-text w-full">
            <?php echo $args['text'] ?? ''; ?>
        </div>

        <a href="<?php echo $args['link'] ?? ''; ?>" class="absolute bottom-0 right-0"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
    </div>
</div>