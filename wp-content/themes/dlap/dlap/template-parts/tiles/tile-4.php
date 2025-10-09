<?php // print_r($args); 

$items = [];
if (isset($args['items'])) {
    $items = $args['items'];
} else {
    $items = $args['donuts'] ?? [];
}
?>


<div class="tile-with-circle-progress box px-4 py-5 items-center">
    <div class="tile-title"><?php echo $args['title'] ?? ''; ?></div>
    <?php $subTitle = $args['sub-title'] ?? ($args['sub_title'] ?? false); ?>
    <?php if ($subTitle !== false): ?>
        <div class="text-10px"><?php echo $subTitle; ?></div>
    <?php endif; ?>

    <?php if (isset($items) && count($items)): ?>
        <div class="grid grid-cols-3 gap-x-4 gap-y-4 pt-5">
            <?php foreach ($items as $index => $item): ?>
                <?php
                    $donut = $item;
                    $donut['donut-id'] = md5($index . json_encode($item) . time());
                ?>
                <div class="w-full">
                    <?php get_template_part( 'template-parts/graphs/donut', null, $item); ?>
                    <?php if (isset($item['text'])): ?>
                        <div class="tile-text text-center pt-2"><?php echo $item['text']; ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($args['text'])): ?>
        <div class="text-10px pt-26px leading-[18px]"><?php echo $args['text'] ?? ''; ?></div>
    <?php endif; ?>
</div>
