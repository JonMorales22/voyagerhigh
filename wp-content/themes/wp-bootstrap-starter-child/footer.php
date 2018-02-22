<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>
                <span class="sep"> | </span>
                <a class="credits" target="_blank" title="Wordpress Technical Support" alt="Bootstrap Wordpress Theme"><?php echo esc_html__('All Rights Reserved.','wp-bootstrap-starter'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>

<?php wp_footer(); ?>
</html>
