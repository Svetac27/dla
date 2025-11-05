<div class="blured-background">
    <div class="blured-content box font-noto !p-20px">
        <div id="id-job_title" class="<?php echo isV2() ? 'text-14px' : 'text-14px'; ?> leading-[20px] pb-6px"></div>
        <div id="id-company" class="<?php echo isV2() ? 'text-12px' : 'text-12px'; ?> leading-[18px] opacity-70"></div>
    </div>
</div>
<div class="blured-background">
    <div class="blured-content box font-noto !p-20px">
        <div>
            <label class="<?php echo isV2() ? 'text-12px' : 'text-12px'; ?> leading-[18px] opacity-70">Email</label>
            <div id="id-email" class="<?php echo isV2() ? 'text-14px' : 'text-14px'; ?> leading-[20px] pt-4px pb-20px"></div>
        </div>
        <div>
            <label class="<?php echo isV2() ? 'text-12px' : 'text-12px'; ?> leading-[18px] opacity-70">Phone</label>
            <div id="id-phone" class="<?php echo isV2() ? 'text-14px' : 'text-14px'; ?> leading-[20px] pt-4px pb-20px"></div>
        </div>
        <div>
            <label class="<?php echo isV2() ? 'text-12px' : 'text-12px'; ?> leading-[18px] opacity-70">Pronouns</label>
            <div id="id-pronouns" class="<?php echo isV2() ? 'text-14px' : 'text-14px'; ?> leading-[20px] pt-4px pb-20px"></div>
        </div>
        <div>
            <label class="<?php echo isV2() ? 'text-12px' : 'text-12px'; ?> leading-[18px] opacity-70">Web Bio URL</label>
            <div id="id-web_bio_url" class="<?php echo isV2() ? 'text-14px' : 'text-14px'; ?> leading-[20px] pt-4px pb-20px"></div>
        </div>
        <div>
            <label class="<?php echo isV2() ? 'text-12px' : 'text-12px'; ?> leading-[18px] opacity-70">Social URL</label>
            <div id="id-social_url" class="<?php echo isV2() ? 'text-14px' : 'text-14px'; ?> leading-[20px] pt-4px pb-20px"></div>
        </div>

    </div>
</div>
<div class="blured-background">
    <div class="blured-content box !py-26px text-center">
        <canvas id="qrcode" class="mx-auto"></canvas>
    </div>
</div>


<button class="bg-red border-1px border-red rounded-[10px] text-[14px] text-center p-15px w-full my-10px edit-business-card">
    <icon class="inline-block mr-10px mb-2px align-middle">
        <?php include get_template_directory() . '/assets/icons/edit_square.svg'; ?>
    </icon>
    Edit
</button>
