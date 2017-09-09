<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage james_Themes
 * @since Road Themes 1.0
 */
$james_opt = get_option( 'james_opt' );
?>
			<?php
			if ( !isset($james_opt['footer_layout']) || $james_opt['footer_layout']=='default' ) {
				get_footer('first');
			} else {
				get_footer($james_opt['footer_layout']);
			}
			?>
		</div><!-- .page -->
	</div><!-- .wrapper -->
	<?php if ( isset($james_opt['back_to_top']) && $james_opt['back_to_top'] ) { ?>
	<div id="back-top" class="hidden-xs hidden-sm hidden-md"></div>
	<?php } ?>
	<?php wp_footer(); ?>
</body>
</html>