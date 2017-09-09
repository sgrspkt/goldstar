<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage james_Themes
 * @since Road Themes 1.0
 */

$james_opt = get_option( 'james_opt' );

get_header();

?>
	<div class="main-container error404">
		<div class="container">
			<div class="search-form-wrapper">
				<h2><?php esc_html_e( 'not found', 'james' ); ?></h2>
				<p class="home-link"><?php esc_html_e( "Can't find what you need, Take a moment and do a search below", 'james' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>