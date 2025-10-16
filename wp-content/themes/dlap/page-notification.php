<?php
	/* Template Name: Notifications */
?>

<?php get_header(); ?>

<style>
/* for this page only */
.tile-heading.w-full {
    margin-bottom: 5.25rem;
    font-size: 12px;
}

</style>

<div class="text-white py-5">
	<div id="js-notifications-list" class="w-full grid grid-cols-1 lg:grid-cols-3 gap-x-14 gap-y-3">
        <!-- Content will come from app.js fetchNotifications function -->
    </div>
</div>


<?php get_footer(); ?>