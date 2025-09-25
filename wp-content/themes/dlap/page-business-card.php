<?php
	/* Template Name: Business Card */
?>

<?php get_header(); ?>
    <div class="business-card-page">
        <section class="py-2 form-fields hidden">
            <div class="font-noto <?php echo isV2() ? 'text-14px' : 'text-12px'; ?> leading-[18px] pt-20px">
                Please fill in the form below to generate your virtual business card
            </div>
            <?php get_template_part( 'template-parts/business-card/form', null); ?>
        </section>

        <section class="py-2 user-info hidden">
            <?php get_template_part( 'template-parts/business-card/details', null); ?>
        </section>
    </div>


    <script>
        // JSON data
        document.addEventListener('DOMContentLoaded', function () {
            if (getBusinessCardData()) {
                document.querySelector('.business-card-page .user-info').classList.remove('hidden')
            } else {
                document.querySelector('.business-card-page .form-fields').classList.remove('hidden')
            }
        })

    </script>

<?php get_footer(); ?>
