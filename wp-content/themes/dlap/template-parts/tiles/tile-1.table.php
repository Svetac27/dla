<div class="figure-with-text box tile-background flex items-center <?php echo isset($args['progress']) ? 'figure-with-text' : 'figure-with-text-and-progress-bar'; ?>">
    <table class="w-full">
        <tr class="flex items-center gap-5">
            <td class="w-1/4 text-left">
                <?php $number = isset($args['number']) ? $args['number'] : (isset($args['figure']) ? $args['figure'] : ''); ?>
                <div class="numbers-big w-auto inline-block <?php echo $args['symbol'] ? 'number' : 'text'; ?>">
                    <span class="number-data text-[36px]" ><?php echo $number; ?></span><span class="symbols-small"><?php echo $args['symbol'] ?? 'K'; ?></span>
                </div>
            </td>
            <td class="w-3/4 text-left">
                <div class="tile-text"><?php echo isset($args['text']) ? $args['text'] : ''; ?> <span class="currency"><?php echo isset($args['small_text']) ? $args['small_text'] : ''; ?></span></div>
            </td>
        </tr>
        <?php
            $progress = $args['progress'] ?? [];
            if (gettype($progress) === 'string' || gettype($progress) === 'integer') {
                $value = $args['progress'];
                $color = isset($args['progress_color']) ? colorClasses($args['progress_color']) : 'green';
            } else {
                $value = isset($progress[0]) ? $progress[0] : 0;
                $color = isset($progress[1]) ? $progress[1] : 'green';
            }
        ?>
        <?php if (isset($args['progress']) && $value > 0): ?>
            <tr>
                <td colspan="3" class="w-full pt-2"><progress class="<?php echo $color; ?>" value="<?php echo $value; ?>" max="100"></progress></td>
            </tr>
        <?php endif; ?>
    </table>
</div>