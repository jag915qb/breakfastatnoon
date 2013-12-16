<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Photolistic
 * @since Photolistic 1.0
 */
?>
	</div><!-- #main -->
</div><!-- #wrapper -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

<div id="credits">&copy;&nbsp;<?php echo date("Y")." ".get_bloginfo('name'); ?> - All rights reserved<br />
    <a href="<?php echo esc_url( __( 'http://buzzrain.com', 'photolistic' ) ); ?>" title="<?php esc_attr_e( 'Wordpress for Photographers', 'photolistic' ); ?>"><?php printf( __( 'Photography Theme by %s.', 'photolistic' ), 'Buzzrain' ); ?></a>

		</div><!-- #colophon -->
	</div><!-- #footer -->



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
