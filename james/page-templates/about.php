<?php
/**
 * Template Name: About page
 *
 * Description: About page template
 *
 * @package WordPress
 * @subpackage james_Themes
 * @since Road Themes 1.0
 */
get_header();
?>
<div class="main-container about-page">
	<div class="page-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>