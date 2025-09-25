<?php // print_r($args); ?>


<div class="box px-4 py-5 items-center">
    <div class="tile-title"><?php echo $args['title'] ?? ''; ?></div>
    <div class="text-10px"><?php echo $args['sub-title'] ?? ''; ?></div>
    <?php if (isset($args['items']) && count($args['items'])): ?>
        <div class="flex flex-wrap pt-5">
            <?php foreach ($args['items'] as $index => $item): ?>
                <?php
                    $donut = $item;
                    $donut['donut-id'] = md5($index . json_encode($item) . time());
                ?>
                <div class="w-1/3 justify-center items-center">
                    <?php get_template_part( 'template-parts/graphs/donut', null, $item); ?>
                    <div class="tile-text text-center pt-3"><?php echo $item['text']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="text-10px pt-26px"><?php echo $args['text'] ?? ''; ?></div>
</div>
