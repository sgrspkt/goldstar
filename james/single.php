<?php
/**
 * The Template for displaying all single posts
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
		break;
	default:
		$blogclass = 'blog-nosidebar'; //for both fullwidth and no sidebar
		$blogcolclass = 12;
		$blogsidebar = 'none';
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
				<div class="page-content blog-page single <?php echo esc_attr($blogclass); if($blogsidebar=='left') {echo ' left-sidebar'; } if($blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

						<?php comments_template( '', true ); ?>
						
						<!--<nav class="nav-single">
							<h3 class="assistive-text"><?php esc_html_e( 'Post navigation', 'james' ); ?></h3>
							<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'james' ) . '</span> %title' ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'james' ) . '</span>' ); ?></span>
						</nav><!-- .nav-single -->
						
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php if( $blogsidebar=='right') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>