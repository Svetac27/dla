<div class="box my-2 flex items-center <?php echo isset($args['progress']) ? 'figure-with-text' : 'figure-with-text-and-progress-bar'; ?>">
    <div>
        <div class="flex items-center gap-6 <?php echo isset($args['progress']) ? 'mb-2' : ''; ?>" >
            <div class="min-w-1/5 text-center">
                <?php $number = isset($args['number']) ? $args['number'] : (isset($args['figure']) ? $args['figure'] : ''); ?>
                <div class="numbers-big w-auto pr-6 inline-block"><span><?php echo $number; ?></span><span class="symbols-small"><?php echo $args['symbol'] ?? 'K'; ?></span></div>
            </div>
            <div class="text-left">
                <div class="tile-text"><?php echo isset($args['text']) ? $args['text'] : ''; ?></div>
            </div>
        </div>
        <?php
            $progress = $args['progress'] ?? [];
            if (gettype($progress) === 'string') {
                $value = $progress;
                $color = isset($args['progress_color']) ? $args['progress_color'] : 'green';
            } else {
                $value = isset($progress[0]) ? $progress[0] : 0; 
                $color = isset($progress[1]) ? $progress[1] : 'green'; 
            }
        ?>
        <?php if (isset($args['progress'])): ?><progress class="<?php echo $color; ?>" value="<?php echo $value; ?>" max="100"></progress><?php endif; ?>
    </div>
</div>