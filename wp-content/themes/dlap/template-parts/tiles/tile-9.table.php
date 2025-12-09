<?php
    $has_items = false;
    if (isset($args['items'])) {
        $items = $args['items'];
        if (function_exists('is_countable')) {
            $has_items = is_countable($items) ? count($items) > 0 : !empty($items);
        } else {
            if (is_array($items)) {
                $has_items = count($items) > 0;
            } elseif ($items instanceof Countable) {
                $has_items = count($items) > 0;
            } else {
                $has_items = !empty($items);
            }
        }
    }
?>

<div class="figure-with-text-and-collapsible tile-background box tile-dropdown block
    <?php echo isset($args['is_opened']) && $args['is_opened'] == true ? 'opened' : 'closed'; ?>">
    <div class="items-center w-full min-h-17 justify-between flex cursor-pointer" onclick="toggleDropdown(event)">
    <div class="items-center w-full min-h-17 justify-between flex cursor-pointer" onclick="toggleDropdown(event)">
        <table class="w-full">
        <table class="w-full">
            <tr>
            <tr>
                <?php $figure = $args['figure'] ?? ($args['number'] ?? ''); ?>
                <?php $figure = $args['figure'] ?? ($args['number'] ?? ''); ?>


                <?php if (strlen($figure) > 0 || isset($args['title'])): ?>
                <?php if (strlen($figure) > 0 || isset($args['title'])): ?>
                <td class="tile-main-content flex flex-col <?php echo isset($args['text']) ? 'w-1/5' : 'w-full'; ?> text-left">
                <td class="tile-main-content flex flex-col <?php echo isset($args['text']) ? 'w-1/5' : 'w-full'; ?> text-left">
                    <?php $titleClass = 'tile-title'; ?>
                    <?php $titleClass = 'tile-title'; ?>
                    <?php if (strlen($figure) > 0): ?>
                    <?php if (strlen($figure) > 0): ?>
                        <?php $titleClass = 'tile-text'; ?>
                        <?php $titleClass = 'tile-text'; ?>
                        <div class="numbers-big"><?php echo $figure; ?><span class="symbols-big"><?php echo $args['symbol'] ?? ''; ?></span></div>
                        <div class="numbers-big"><?php echo $figure; ?><span class="symbols-big"><?php echo $args['symbol'] ?? ''; ?></span></div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if (isset($args['title'])): ?>
                    <?php if (isset($args['title'])): ?>
                        <span class="<?php echo $titleClass; ?> w-full"><?php echo $args['title'] ?? ''; ?></span>
                        <span class="<?php echo $titleClass; ?> w-full"><?php echo $args['title'] ?? ''; ?></span>
                    <?php endif; ?>
                    <?php endif; ?>
                </td>
                </td>
                <?php endif; ?>
                <?php endif; ?>
                <?php if (isset($args['text'])): ?>
                <?php if (isset($args['text'])): ?>
                <td class="w-4/5 text-left px-4">
                <td class="w-4/5 text-left px-4">
                    <div class="tile-text"><?php echo $args['text'] ?? ''; ?></div>
                    <div class="tile-text"><?php echo $args['text'] ?? ''; ?></div>
                </td>
                </td>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ((isset($args['items']) && !empty($args['items'])) || (isset($args['collapsible']) && !empty($args['collapsible']))) : ?>
                <?php if ((isset($args['items']) && !empty($args['items'])) || (isset($args['collapsible']) && !empty($args['collapsible']))) : ?>
                    <td class="w-6 pl-2">
                    <td class="w-6 pl-2">
                        <span class="toggle whitespace-nowrap">
                        <span class="toggle whitespace-nowrap">
                            <i class="inline-block caret icon-chevron-down opacity-50 mr-[-5px]"></i>
                            <i class="inline-block caret icon-chevron-down opacity-50 mr-[-5px]"></i>
                        </span>
                        </span>
                    </td>
                    </td>
                <?php endif; ?>
                <?php endif; ?>
            </tr>
            </tr>
        </table>
        </table>
    </div>
    </div>
    <div class="tile-dropdown-option overflow-hidden text-14px">
    <?php if ((isset($args['items']) && !empty($args['items'])) || (isset($args['collapsible']) && !empty($args['collapsible']))) : ?>
            <?php if (isset($args['items']) && count($args['items']) > 0) : ?>
        <div class="tile-dropdown-option overflow-hidden text-14px">
                <ul class="leading-loose pt-5 list-disc px-7">
                <?php if (isset($args['items']) && count($args['items']) > 0) : ?>
                    <?php foreach($args['items'] as $item): ?>
                    <ul class="leading-loose pt-5 list-disc px-7">
                        <li><?php echo $item; ?></li>
                        <?php foreach($args['items'] as $item): ?>
                    <?php endforeach; ?>
                            <li><?php echo $item; ?></li>
                </ul>
                        <?php endforeach; ?>
            <?php endif; ?>
                    </ul>
            <?php if (isset($args['collapsible']) && count($args['collapsible']) > 0 && !empty($args['collapsible'])) : ?>
                <?php endif; ?>
                <ul class="pt-5 pb-3 grid gap-8px">
                <?php if (isset($args['collapsible']) && count($args['collapsible']) > 0 && !empty($args['collapsible'])) : ?>
                    <?php foreach ($args['collapsible'] as $item): ?>
                    <ul class="pt-5 pb-3 grid gap-8px">
                        <li class="">
                        <?php foreach ($args['collapsible'] as $item): ?>
                            <?php if (isset($item['figure_on_right']) && $item['figure_on_right'] ==  true): ?>
                            <li class="">
                                <div class="flex items-center justify-between">
                                <?php if (isset($item['figure_on_right']) && $item['figure_on_right'] ==  true): ?>
                                    <div class="leading-loose w-3/4">
                                    <div class="flex items-center justify-between">
                                        <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                        <div class="leading-loose w-3/4">
                                        <progress class="my-5px <?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                            <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                    </div>
                                            <progress class="my-5px <?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                    <div class="numbers-small w-auto min-w-21 w-1/4 pl-4 text-right">
                                        </div>
                                        <?php echo $item['figure'] ?? ''; ?><span class="symbols-small"><?php echo $item['symbol'] ?? ''; ?></span>
                                        <div class="numbers-small w-auto min-w-21 w-1/4 pl-4 text-right">
                                    </div>
                                            <?php echo $item['figure'] ?? ''; ?><span class="symbols-small"><?php echo $item['symbol'] ?? ''; ?></span>
                                </div>
                                        </div>
                            <?php else : ?>
                                <div class="flex">
                                    <div class="numbers-small min-w-21 w-1/4 text-right pr-4">
                                        <?php echo $item['figure'] ?? ''; ?><span class="symbols-small"><?php echo $item['symbol'] ?? ''; ?></span>
                                    </div>
                                    </div>
                                    <div class="leading-loose w-3/4">
                                <?php else : ?>
                                        <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                    <div class="flex">
                                        <progress class="my-5px <?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                        <div class="numbers-small min-w-21 w-1/4 text-right pr-4">
                                            <?php echo $item['figure'] ?? ''; ?><span class="symbols-small"><?php echo $item['symbol'] ?? ''; ?></span>
                                        </div>
                                        <div class="leading-loose w-3/4">
                                            <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                            <progress class="my-5px <?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            </li>
                        </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </ul>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
</div>