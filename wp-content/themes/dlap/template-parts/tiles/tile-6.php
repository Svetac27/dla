<?php
$display = 'flex items-start';
$liStyle = '';
if(!isset($args['image']) && (isset($args['title']) || isset($args['text'])) && isset($args['items'])) {
    $display = 'grid items-center';
    $liStyle = 'margin-bottom: 10px; font-size:12px"';
}
?>

<div class="theicon-with-text tile-background box !py-6 gap-6  <?php echo  isset($args['is_small']) && $args['is_small'] == true ? 'items-center' : 'items-start'; ?> justify-start <?php echo $display; ?>">
    <div class="tile-header">
        <?php if (isset($args['image'])): ?>
            <div class="tile-icon <?php echo isset($args['is_small']) && $args['is_small'] == true ? 'flex' : 'grid'; ?> items-start text-center pt-1">
                <img class="mx-auto <?php echo isset($args['is_small']) && $args['is_small'] == true ? 'max-h-35px w-auto' : ' w-full max-w-16'; ?>" src="<?php echo $args['image']; ?>" />
            </div>
        <?php endif; ?>
        <?php if ((isset($args['title']) && $args['title'] != '') || (isset($args['text']) && $args['text'] != '')): ?>
            <div class="w-full text-left">
                <?php if (isset($args['title'] ) && $args['title'] != '') : ?>
                    <div class="tile-title w-full font-noto-sans py-2 <?php echo isset($args['image']) ? 'text-4' : ''; ?>">
                        <?php echo $args['title'] ?? ''; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($args['text'] ) && $args['text'] != '') : ?>
                    <div class="tile-text w-full">
                        <?php echo $args['text'] ?? ''; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (isset($args['items']) && count($args['items']) && !empty($args['items'])): ?>
        <div class="tile-container w-full pl-2 items-center text-left ml-[15px]">
            <ul class="text-3 list-disc leading-normal">
                <?php foreach ($args['items'] as $item): ?>
                    <?php
                        $styles = 'style="'.$liStyle.'"';
                        if (isset($item['type']) && $item['type'] == 'p') {
                            $styles = 'style="list-style:none;margin-left:-1.25rem;'.$liStyle.'"';
                        }
                    ?>
                    <li <?php echo $styles; ?>>
                        <?php echo isset($item['type']) && $item['type'] == 'p'     ? '<p class="py-2">' : ''; ?>
                            <?php echo $item['value'] ?? $item; ?>
                        <?php echo isset($item['type']) && $item['type'] == 'p' ? '</p>' : ''; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>