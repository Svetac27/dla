
<div class="box">
    <div class="flex items-center mb-2">
        <div class="w-1/5 text-center">
            <div class="numbers-big"><?php echo $args['number'] ?? '00'; ?><span class="symbols-small"><?php echo $args['symbol'] ?? '%'; ?></span></div>
        </div>
        <div class="w-4/5 pl-4 text-left">
            <div class="tile-text"><?php echo $args['text']; ?></div>
        </div>
    </div>
    <?php
        $progress = $args['progress'] ?? [];
        $value = isset($progress[0]) ? $progress[0] : 0; 
        $color = isset($progress[1]) ? $progress[1] : 'green'; 

    ?>
    <progress class="<?php echo $color; ?>" value="<?php echo $value; ?>" max="100"></progress>
</div>