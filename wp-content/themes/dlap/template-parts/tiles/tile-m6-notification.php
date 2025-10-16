<?php // print_r($args); ?>


<div class="tile-block tile-notification blured-background box px-5 py-5 items-center" >
    <div class="blured-content flex items-center justify-between w-full">
        <div class="tile-content-info w-[calc(100%-30px)]">
            <div class="tile-title-wrapper pb-2 flex items-center gap-[10px]" >
                <?php if (!$args['readed']): ?>
                    <div class="tile-unread-indicator bg-[#FAB400] w-2 h-2 rounded-[50%]"></div>
                <?php endif; ?>
                <h3 class="tile-title leading-[20px] "><?php echo $args['title'] ?? ''; ?></h3>
            </div>
            <span class="tile-message block text-[12px] leading-[18px] whitespace-nowrap overflow-hidden text-ellipsis"><?php echo $args['message'] ?? ''; ?></span>
            <span class="tile-created-at text-[12px] leading-[18px] opacity-70"><?php echo $args['created_at'] ?? ''; ?></span>
        </div>
        <a href="<?php echo $args['link'] ?? '#'; ?>" class="tile-content-link text-[12px] leading-[18px] w-[100px] h-full flex items-center justify-end">
            <i class="tile-notification-link icon-arrow-right relative opacity-50"></i>
        </a>
    </div>
</div>