<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DLAP
 */

?>
<?php $footnote = get_option('footnote'); ?>
<?php if ($footnote): ?>
    <div style="    font-style: italic;
    font-size: 0.75rem;
    text-align: left;
    opacity: 0.6;
    color: white;"><?php echo $footnote; ?></div>
<?php endif; ?>
    <?php wp_footer(); ?>
</div>
<?php get_sidebar(); ?>

</body>
</html>
