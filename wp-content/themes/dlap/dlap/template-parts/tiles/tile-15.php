<?php // print_r($args); ?>

<div class="box tile-dropdown closed">
    <div class="items-center flex w-full justify-between min-h-17">
        <div class="w-full text-left">
            <div class="tile-text"><?php echo $args['sector'] ?? ''; ?></div>
        </div>
        <button class="toggle whitespace-nowrap" onclick="toggleDropdown(event)">
            <img class="caret" src="<?php echo get_template_directory_uri(); ?>/assets/icons/caret-down.png" />
        </button>
    </div>
    <?php if (isset($args['clients']) && count($args['clients'])): ?>
        <div class="tile-dropdown-option overflow-hidden">
            <ul class="leading-loose my-5 pt-5 list-disc px-7">
                <?php foreach($args['clients'] as $client): ?>
                    <li><?php echo $client; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>