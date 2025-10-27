<?php
$bottomLink = isset($args['title']) && !empty($args['title']) && isset($args['text']) && !empty($args['text']);
$middleClass = '';

$isExternalLink = isset($args['is_external']) && $args['is_external'] == true;
if ($bottomLink != true && $isExternalLink != true) {
    $middleClass = 'flex items-center justify-between';
}
?>

<a href="<?php echo $args['link'] ?? ''; ?>" <?php if ($isExternalLink): ?>target="_blank"<?php endif; ?> class="tile-with-link <?php echo $isExternalLink ? 'external-link' : 'internal-link'; ?> tile-background flex flex-row items-center relative mb-[10px]">
    <div class="w-full my-[15px] ">
        <?php if (isset($args['title']) && !empty($args['title'])): ?>
            <div class="tile-title w-full <?php echo $middleClass; ?>">
                <span class="leading-[20px]"><?php echo $args['title'] ?? ''; ?></span>

                <?php if ($bottomLink == false && $isExternalLink == false): ?>
                    <span>
                        <i style="position: initial;    " class="icon-arrow-right opacity-50"></i>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($args['text']) && !empty($args['text'])): ?>
            <div class="tile-text w-full <?php echo $middleClass; echo isset($args['title']) && !empty($args['title']) ? 'mt-5px' : ''; ?>">
                <span class="leading-[18px]"><?php echo $args['text'] ?? ''; ?></span>
                <?php if ($bottomLink == false && $isExternalLink == false): ?>
                    <span>
                        <i style="position: initial;" class="icon-arrow-right opacity-50"></i>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (isset($args['link']) && !empty($args['link'])): ?>
        <?php if ($isExternalLink): ?>
            <span <?php echo $isExternalLink ? 'target="_blank"' : '';?>>
                <i class="icon-link-external opacity-50"></i>
            </span>
        <?php elseif ($bottomLink != false): ?>
            <span class="absolute bottom-[10px] right-[10px]">
                <i class="icon-arrow-right opacity-50 text-[12px]"></i>
            </span>
        <?php endif; ?>
    <?php endif; ?>
</a>