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
	<div class="footer">
		
		<?php if($james_opt['contact_us']!='' || $james_opt['twitter_user']!='' || $james_opt['footer_menu1']!='' || $james_opt['footer_menu2']!='') { ?>
			<div class="footer-top">
				<div class="container">
					<div class="row">
						
						<?php if(isset($james_opt['contact_us']) && $james_opt['contact_us']!=''){ ?>
							<div class="col-md-3 col-sm-6">
								<div class="widget widget_contact_us">
									<?php echo wp_kses($james_opt['contact_us'], array(
										'a' => array(
									'href' => array(),
									'title' => array()
									),
									'div' => array(
										'class' => array(),
									),
									'img' => array(
										'src' => array(),
										'alt' => array()
									),
									'h3' => array(
										'class' => array(),
									),
									'ul' => array(),
									'li' => array(),
									'i' => array(
										'class' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
									'p' => array(),
									)); ?>
								</div>
							</div>
						<?php } ?>
						
						<div class="col-sm-6  col-md-3">
							<div class="widget widget_twitter">
							<h3 class="widget-title"><?php echo esc_html($james_opt['twitter_title']);?></h3>
								<?php
								if(class_exists('rotatingtweets_Widget')){
									echo do_shortcode('[rotatingtweets screen_name="'.$james_opt['twitter_user'].'"]');
								}
								?>
							</div>
						</div>
						
						
						<?php
						if( isset($james_opt['footer_menu1']) && $james_opt['footer_menu1']!='' ) {
							$menu1_object = wp_get_nav_menu_object( $james_opt['footer_menu1'] );
							$menu1_args = array(
								'menu_class'      => 'nav_menu',
								'menu'         => $james_opt['footer_menu1'],
							); ?>
							<div class="col-sm-6  col-md-3">
								<div class="widget widget_menu">
									<h3 class="widget-title"><?php echo esc_html($menu1_object->name); ?></h3>
									<?php wp_nav_menu( $menu1_args ); ?>
								</div>
							</div>
						<?php }
						if( isset($james_opt['footer_menu2']) && $james_opt['footer_menu2']!='' ) {
							$menu2_object = wp_get_nav_menu_object( $james_opt['footer_menu2'] );
							$menu2_args = array(
								'menu_class'      => 'nav_menu',
								'menu'         => $james_opt['footer_menu2'],
							); ?>
							<div class="col-sm-6  col-md-3">
								<div class="widget widget_menu">
									<h3 class="widget-title"><?php echo esc_html($menu2_object->name); ?></h3>
									<?php wp_nav_menu( $menu2_args ); ?>
								</div>
							</div>
						<?php }?>	
						
						
					</div>
				</div>
			</div>
		
		<?php } ?>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="widget-copyright">
							<?php 
							if( isset($james_opt['copyright']) && $james_opt['copyright']!='' ) {
								echo wp_kses($james_opt['copyright'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
								));
							} else {
								echo 'Copyright <a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo('name').'</a> '.date('Y').'. All Rights Reserved';
							}
							?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="widget-payment">
							<?php if(isset($james_opt['payment_icons']) && $james_opt['payment_icons']!='' ) {
								echo wp_kses($james_opt['payment_icons'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'img' => array(
										'src' => array(),
										'alt' => array()
									),
								)); 
							} ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>