<?php // print_r($args); ?>

<div class="box tile-dropdown closed">
    <div class="items-center flex w-full min-h-17">
        <div class="w-1/5 text-center">
            <div class="numbers-big">00<span class="symbols-small">%</span></div>
        </div>
        <div class="w-4/5 pl-4 text-left">
            <div class="tile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</div>
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