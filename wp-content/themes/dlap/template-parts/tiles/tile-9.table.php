<div class="figure-with-text-and-collapsible tile-background box tile-dropdown block <?php echo isset($args['is_opened']) && $args['is_opened'] == true ? 'opened' : 'closed'; ?>">
    <div class="items-center w-full min-h-17 justify-between flex cursor-pointer" onclick="toggleDropdown(event)">
        <table class="w-full">
            <tr>
                <?php $figure = $args['figure'] ?? ($args['number'] ?? ''); ?>

                <?php if (strlen($figure) > 0 || isset($args['title'])): ?>
                <td class="<?php echo isset($args['text']) ? 'w-1/5' : 'w-full'; ?> text-left">
                    <?php $titleClass = 'tile-title'; ?>
                    <?php if (strlen($figure) > 0): ?>
                        <?php $titleClass = 'tile-text'; ?>
                        <div class="numbers-big"><?php echo $figure; ?><span class="symbols-big"><?php echo $args['symbol'] ?? ''; ?></span></div>
                    <?php endif; ?>
                    <?php if (isset($args['title'])): ?>
                        <span class="<?php echo $titleClass; ?> w-full"><?php echo $args['title'] ?? ''; ?></span>
                    <?php endif; ?>
                </td>
                <?php endif; ?>
                <?php if (isset($args['text'])): ?>
                <td class="w-4/5 text-left px-4">
                    <div class="tile-text"><?php echo $args['text'] ?? ''; ?></div>
                </td>
                <?php endif; ?>
                <?php if ((isset($args['items']) && !empty($args['items'])) || (isset($args['collapsible']) && !empty($args['collapsible']))) : ?>
                    <td class="w-6 pl-2">
                        <span class="toggle whitespace-nowrap">
                            <i class="inline-block caret icon-chevron-down opacity-50"></i>
                        </span>
                    </td>
                <?php endif; ?>
            </tr>
        </table>
    </div>
    <div class="tile-dropdown-option overflow-hidden text-14px">
            <?php if (isset($args['items']) && count($args['items']) > 0) : ?>
                <ul class="leading-loose pt-5 list-disc px-7">
                    <?php foreach($args['items'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (isset($args['collapsible']) && count($args['collapsible']) > 0 && !empty($args['collapsible'])) : ?>
                <ul class="pt-5 pb-3 grid gap-8px">
                    <?php foreach ($args['collapsible'] as $item): ?>
                        <li class="">
                            <?php if (isset($item['figure_on_right']) && $item['figure_on_right'] ==  true): ?>
                                <div class="flex items-center justify-between">
                                    <div class="leading-loose w-3/4">
                                        <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                        <progress class="my-5px <?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                    </div>
                                    <div class="numbers-small w-auto min-w-21 w-1/4 pl-4 text-right">
                                        <?php echo $item['figure'] ?? ''; ?><span class="symbols-small"><?php echo $item['symbol'] ?? ''; ?></span>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="flex">
                                    <div class="numbers-small min-w-21 w-1/4 text-right pr-4">
                                        <?php echo $item['figure'] ?? ''; ?>
                                    </div>
                                    <div class="leading-loose w-3/4">
                                        <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                        <progress class="my-5px <?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
    </div>
</div>