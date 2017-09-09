<?php
/**
 * Template Name: Full Width
 *
 * Description: Full Width page template
 *
 * @package WordPress
 * @subpackage james_Themes
 * @since Road Themes 1.0
 */

get_header();
?>
<div class="main-container full-width">
	<div class="container">
		<?php JamesTheme::james_breadcrumb(); ?>
	</div>
	<header class="entry-header">
		<div class="container">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
	</header>
	
	<div class="page-content">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>