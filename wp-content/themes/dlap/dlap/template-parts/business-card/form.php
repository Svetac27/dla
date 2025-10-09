<form class="business-card-form font-noto text-white" novalidate>
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">Prefix: </label>
        <input type="text" class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="prefix" placeholder="Prefix">
        <span class="prefixError error"></span>
    </div>
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">* Full Name: </label>
        <input type="text" required class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="full_name" placeholder="Full Name">
        <span class="full_nameError error"></span>
    </div>
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">* Company: </label>
        <input type="text" required class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="company" value="DLA Piper" placeholder="Company">
        <span class="companyError error"></span>
    </div>
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">* Job Title: </label>
        <input type="text" required class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="job_title" placeholder="Job Title">
        <span class="job_titleError error"></span>
    </div>
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">* Email: </label>
        <input type="text" required class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="email" placeholder="Email">
        <span class="emailError error"></span>
    </div>
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">* Phone: </label>
        <input type="text" required class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="phone" placeholder="Phone">
        <span class="phoneError error"></span>
    </div>
    
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">Pronouns: </label>
        <input type="text" class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="pronouns" placeholder="Pronouns">
        <span class="pronounsError error"></span>
    </div>
    
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">Web Bio URL: </label>
        <input type="text" class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="web_bio_url" placeholder="Web Bio URL">
        <span class="web_bio_urlError error"></span>
    </div>
    
    <div class="form-field py-5px">
        <label class="<?php echo isV2() ? 'text-14px' : 'text-12px'; ?> opacity-70 leading-[18px] py-10px block">Social URL: </label>
        <input type="text" class="border-1px border-white border-opacity-10 rounded-[5px] bg-white bg-opacity-5 p-15px" name="social_url" placeholder="Social URL">
        <span class="social_urlError error"></span>
    </div>

    <button type="submit"class="bg-red border-1px border-red rounded-[5px] text-center p-15px w-full my-10px">Save</button>
</form>