<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage james_Themes
 * @since Road Themes 1.0
 */
 
$james_opt = get_option( 'james_opt' );

if(is_ssl()){
	$james_opt['logo_main']['url'] = str_replace('http:', 'https:', $james_opt['logo_main']['url']);
}
?>
	<div class="header-container">
		<?php if(isset($james_opt)) { ?>
			<div class="top-bar">
				<div class="container">
					<div class="row">	
						<div class="col-md-offset-3 col-md-9">
							<?php if (class_exists('SitePress')) { ?>
							<div class="switcher">
								<?php do_action('icl_language_selector'); ?>
								<div class="currency"><?php do_action('currency_switcher'); ?></div>
							</div>
							<?php } ?>
							<?php if(isset($james_opt['phone_number']) && $james_opt['phone_number']!=''){ ?>
								<p class="phone-number hidden-xs">
									<?php echo wp_kses($james_opt['phone_number'], array(
									  'strong' => array(),
									 )); ?>
							
								</p>
							<?php } ?>

							<?php if ( class_exists( 'WC_Widget_Cart' ) ) {
								the_widget('Custom_WC_Widget_Cart'); 
							} ?>
							
							<?php if ( has_nav_menu( 'topmenu' ) ) { ?>
								<div class="top-menu">
									<?php wp_nav_menu( array( 'theme_location' => 'topmenu', 'container_class' => 'top-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
								</div>
							<?php } ?>
							
							<div class="search-switcher">
								<div class="dropdown-switcher">
									<?php if(class_exists('WC_Widget_Product_Search') ) { ?>
										<?php the_widget('WC_Widget_Product_Search', array('title' => 'Search')); ?>
									<?php } ?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="header">
			<div class="<?php if(isset($james_opt['sticky_header']) && $james_opt['sticky_header']) {echo 'header-sticky';} ?> <?php if ( is_admin_bar_showing() ) {echo 'with-admin-bar';} ?>">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<?php if( isset($james_opt['logo_main']['url']) ){ ?>
								<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url($james_opt['logo_main']['url']); ?>" alt="" /></a></div>
							<?php
							} else { ?>
								<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							} ?>
						</div>
						<div class="col-xs-12 col-md-9">
								<div class="visible-lg visible-md">
									<div class="horizontal-menu">
										<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
									</div>
								</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="main-menu clearfix">
			<div class="container">
				<div class="mobile-menu visible-xs visible-sm">
					<div class="mbmenu-toggler"><?php echo esc_html($james_opt['mobile_menu_label']);?><span class="mbmenu-icon"><i class="fa fa-bars"></i></span></div>
					<div class="clearfix"></div>
					<?php wp_nav_menu( array( 'theme_location' => 'mobilemenu', 'container_class' => 'mobile-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
	</div>
	