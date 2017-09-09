<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage james_Themes
 * @since Road Themes 1.0
 */

$james_opt = get_option( 'james_opt' );

get_header();

$bloglayout = 'nosidebar';
if(isset($james_opt['blog_layout']) && $james_opt['blog_layout']!=''){
	$bloglayout = $james_opt['blog_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$bloglayout = $_GET['layout'];
}
$blogsidebar = 'right';
if(isset($james_opt['sidebarblog_pos']) && $james_opt['sidebarblog_pos']!=''){
	$blogsidebar = $james_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$blogsidebar = $_GET['sidebar'];
}
switch($bloglayout) {
	case 'sidebar':
		$blogclass = 'blog-sidebar';
		$blogcolclass = 9;
		JamesTheme::james_post_thumbnail_size('james-category-thumb');
		break;
	default:
		$blogclass = 'blog-nosidebar';
		$blogcolclass = 12;
		$blogsidebar = 'none';
		JamesTheme::james_post_thumbnail_size('james-post-thumb');
}
?>
<div class="main-container page-wrapper">
	
	<div class="container">
		<?php JamesTheme::james_breadcrumb(); ?>
		<header class="entry-header">
			<div class="container">
				<h1 class="entry-title"><?php if(isset($james_opt)) { echo esc_html($james_opt['blog_header_text']); } else { esc_html_e('Blog', 'james');}  ?></h1>
			</div>
		</header>
		<div class="row">
			<?php if($blogsidebar=='left') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			
			<div class="col-xs-12 <?php echo 'col-md-'.$blogcolclass; ?>">
			
				<div class="page-content blog-page <?php echo esc_attr($blogclass); if($blogsidebar=='left') {echo ' left-sidebar'; } if($blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php if ( have_posts() ) : ?>
						
						<header class="archive-header">
							<h1 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'james' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .archive-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>

						<div class="pagination">
							<?php JamesTheme::james_pagination(); ?>
						</div>

					<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'james' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'james' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->

					<?php endif; ?>
				</div>
			</div>
			<?php if( $blogsidebar=='right') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>