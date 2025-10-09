<div class="box tile-dropdown <?php echo isset($args['is_opened']) && $args['is_opened'] == true ? 'opened' : 'closed'; ?>">
    <div class="items-center flex w-full min-h-17 justify-between">
        <?php $figure = $args['figure'] ?? ($args['number'] ?? ''); ?>

        <?php if (strlen($figure) > 0 || isset($args['title'])): ?>
        <div class="w-1/4 text-left">
            <div class="numbers-big"><?php echo $figure; ?><span class="symbols-big"><?php echo $args['symbol'] ?? ''; ?></span></div>
            <span><?php echo $args['title'] ?? ''; ?></span>
        </div>
        <?php endif; ?>
        <?php if (isset($args['text'])): ?>
        <div class="w-4/4 pl-4 text-left">
            <div class="tile-text"><?php echo $args['text'] ?? ''; ?></div>
        </div>
        <?php endif; ?>
        <?php if (isset($args['items']) || isset($args['collapsible'])) : ?>
            <button class="toggle whitespace-nowrap pl-2" onclick="toggleDropdown(event)">
                <i class="inline-block caret icon-chevron-down opacity-50"></i> 
            </button>
        <?php endif; ?>
    </div>
    <div class="tile-dropdown-option overflow-hidden">
            <?php if (isset($args['items'])) : ?>
                <ul class="leading-loose pt-5 list-disc px-7">
                    <?php foreach($args['items'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (isset($args['collapsible'])) : ?>
                <ul class="pt-5">
                    <?php foreach ($args['collapsible'] as $item): ?>
                        <li class="">
                            <?php if (isset($item['figure_on_right']) && $item['figure_on_right'] ==  true): ?>
                                <div class="flex items-center justify-between">
                                    <div class="numbers-small w-3/4">
                                        <div class="tile-text"><?php echo $item['text'] ?? ''; ?> <span class="currency"><?php echo $item['small_text'] ?? ''; ?></span></div>
                                        <progress class="<?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                    </div>
                                    <div class="numbers-small w-auto min-w-1/4 pl-4">
                                        <?php echo $item['figure'] ?? ''; ?><span class="symbols-small"><?php echo $item['symbol'] ?? ''; ?></span>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="flex">
                                    <div class="numbers-small min-w-23 w-auto text-right pr-4">
                                        <?php echo $item['figure'] ?? ''; ?>
                                    </div>
                                    <div class="numbers-small w-full leading-loose">
                                        <div class="tile-text"><?php echo $item['text'] ?? ''; ?></div>
                                        <progress class="<?php echo colorClasses($item['progress_color'] ?? 'green'); ?>" value="<?php echo $item['progress'] ?? ''; ?>" max="100"></progress>
                                    </div>
                                </div>
                            <?php endif; ?> 
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
    </div>
</div>