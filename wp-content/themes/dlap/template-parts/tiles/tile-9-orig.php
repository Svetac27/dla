<?php // print_r($args); ?>

<div class="box tile-dropdown closed">
    <div class="items-center flex w-full">
        <div class="w-full h-full relative">
            <div class="numbers-big w-full">
                00<span class="symbols-big">+</span>
            </div>
            <div class="tile-text w-full">
                Lorem
            </div>
        </div>
        <button class="toggle whitespace-nowrap" onclick="toggleDropdown(event)">
            <img class="caret" src="<?php echo get_template_directory_uri(); ?>/assets/icons/caret-down.png" />
        </button>
    </div>
    <div class="tile-dropdown-option overflow-hidden">
        <ul class="leading-loose my-5 pt-5 list-disc px-7">
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
            <li>Test</li>
        </ul>
    </div>
</div>