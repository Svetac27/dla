<div class="box flex items-center <?php echo isset($args['progress']) ? 'tile-info' : 'figure-with-text-and-progress-bar'; ?>">
    <table class="w-full">
        <tr class="items-center gap-6 <?php echo isset($args['progress']) ? 'mb-2' : ''; ?>" >
            <td colspan="2" class="w-4/5 text-left">
                <div class="tile-text"><?php echo isset($args['text']) ? $args['text'] : ''; ?> <span class="currency"><?php echo isset($args['small_text']) ? $args['small_text'] : ''; ?></span></div>

                <?php if (isset($args['progress'])): ?>
                    <?php
                        $progress = $args['progress'];
                        $value = $args['progress'] ?? '';
                        $color = isset($args['progress_color']) ? colorClasses($args['progress_color']) : 'green';
                    ?>
                    <progress class="mt-2 <?php echo $color; ?>" value="<?php echo $value; ?>" max="100"></progress>
                <?php endif; ?>
            </td>
            <td colspan="1" class="min-w-1/5 text-right">
                <?php $number = isset($args['number']) ? $args['number'] : (isset($args['figure']) ? $args['figure'] : ''); ?>
                <div class="numbers-big w-auto pl-4 inline-block">
                    <span><?php echo $number; ?></span><span class="symbols-small"><?php echo $args['symbol'] ?? ''; ?></span>
                </div>
            </td>
        </tr>
    </table>
</div>