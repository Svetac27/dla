<?php // print_r($args); ?>

<div class="box tile-dropdown closed">
    <div class="items-center flex w-full justify-between min-h-17">
        <div class="min-w-1/5 text-center">
            <div class="numbers-big">00<span class="symbols-small">%</span></div>
        </div>
        <div class="w-full pl-6 text-left">
            <div class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</div>
        </div>
        <button class="toggle whitespace-nowrap" onclick="toggleDropdown(event)">
            <img class="caret" src="<?php echo get_template_directory_uri(); ?>/assets/icons/caret-down.png" />
        </button>
    </div>
    <div class="tile-dropdown-option overflow-hidden">
        <ul class="my-5 pt-5">

            <?php
                $colors = [
                    'green', 'red', 'yellow', 'pink', 'blue'
                ];

                for ($i = 0; $i < 6; $i++) {
                    $value = rand(0, 100);
                    ?>
                    <li>
                        <div class="flex items-center justify-between">
                            <div class="numbers-small w-3/4">
                                <div class="tile-text"><?php echo rand(1, 9999); ?> <span class="currency">(GBP)</span></div>
                                <progress class="<?php echo $colors[rand(0, 4)]; ?>" id="file" value="<?php echo $value; ?>" max="100"> <?php echo $value; ?>% </progress>
                            </div>
                            <div class="numbers-small w-auto min-w-1/4 pl-6">
                                000<span class="symbols-small">k</span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
        </ul>
    </div>
</div>