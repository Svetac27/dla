<div class="box tile-dropdown closed">
    <div class="items-center flex w-full justify-between">
        <div>
            <div class="numbers-big w-full">
                <?php echo $args['number'] ?? '00'; ?><span class="symbols-big"><?php echo $args['symbol'] ?? '+'; ?></span>
            </div>

            <?php if (isset($args['text'])): ?>
            <div class="tile-text w-full">
                <?php echo $args['text']; ?>
            </div>
            <?php endif; ?>
        </div>

        <?php if (isset($args['items']) && count($args['items'])): ?>
            <button class="toggle whitespace-nowrap" onclick="toggleDropdown(event)">
                <img class="caret" src="<?php echo get_template_directory_uri(); ?>/assets/icons/caret-down.png" />
            </button>
        <?php endif; ?>
    </div>
    <?php if (isset($args['items']) && count($args['items'])): ?>
        <div class="tile-dropdown-option overflow-hidden">
            <ul class="my-5 pt-5">
                <?php foreach ($args['items'] as $item): ?>
                    <li class="">
                        <div class="flex items-center">
                            <div class="numbers-small min-w-23 w-auto text-right pr-4">
                                <?php echo $item['number'] ?? '000'; ?>
                            </div>
                            <div class="numbers-small w-full leading-loose">
                                <div class="tile-text"><?php echo $item['text'] ?? ''; ?></div>
                                <?php 
                                    $value = isset($item['progress'][0]) ? $item['progress'][0] : 0; 
                                    $color = isset($item['progress'][1]) ? $item['progress'][1] : 'green';
                                ?>
                                <progress class="<?php echo $color; ?>" value="<?php echo $value; ?>" max="100"> <?php echo $value; ?>% </progress>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>