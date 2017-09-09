<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$james_viewmode = JamesTheme::james_show_view_mode();
$james_productsfound = JamesTheme::james_shortcode_products_count();

$james_opt = get_option( 'james_opt' );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Extra post classes
$classes = array();

$count   = $product->get_rating_count();

$colwidth = 3;
if($woocommerce_loop['columns'] > 0){
	$colwidth = round(12/$woocommerce_loop['columns']);
}

$classes[] = ' item-col col-xs-12 col-sm-'.$colwidth ;?>

<?php if ( ( 0 == ( $woocommerce_loop['loop'] ) % 2 ) && ( $woocommerce_loop['columns'] == 2 ) ) {
	echo '<div class="group">';
} ?>

<div <?php post_class( $classes ); ?>>
	<div class="product-wrapper">
		
		<?php if ( $product->is_on_sale() ) : ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span class="sale-bg"></span><span class="sale-text">' . esc_html__( 'Sale', 'james' ) . '</span></span>', $post, $product ); ?>
		<?php endif; ?>
		<div class="list-col4 <?php if($james_viewmode=='list-view'){ echo ' col-xs-12 col-sm-4';} ?>">
			<div class="product-image">
				<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
					<?php 
					echo ''.$product->get_image('shop_catalog', array('class'=>'primary_image'));
					
					if(isset($james_opt['second_image'])){
						if($james_opt['second_image']){
							$attachment_ids = $product->get_gallery_attachment_ids();
							if ( $attachment_ids ) {
								echo wp_get_attachment_image( $attachment_ids[0], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
							}
						}
					}
					?>
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				<div class="actions">
					<ul class="add-to-links clearfix">
						<li>
							<?php echo do_shortcode('[add_to_cart id="'.$product->id.'"]') ?>
						</li>

						<li class="quickviewbtn">
							<a class="detail-link quickview" data-quick-id="<?php the_ID();?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Quick View', 'james');?></a>
						</li>

						<li>	
							<?php if ( class_exists( 'YITH_WCWL' ) ) {
								echo preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]'));
							} ?>
						</li>
						<li>
							<?php if( class_exists( 'YITH_Woocompare' ) ) {
							echo do_shortcode('[yith_compare_button]');
							} ?>
						</li>
					</ul>

				</div>
				<div class="list-col2">
					<div class="list-col8 <?php if($james_viewmode=='list-view'){ echo ' col-xs-12 col-sm-8';} ?>">
						<div class="gridview">
							<h2 class="product-name">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="ratings"><?php echo ''.$product->get_rating_html(); ?></div>
							<div class="price-box"><?php echo ''.$product->get_price_html(); ?></div>

						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="list-col8 <?php if($james_viewmode=='list-view'){ echo ' col-xs-12 col-sm-8';} ?>">
			<div class="gridview">
				<h2 class="product-name">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<div class="ratings"><?php echo ''.$product->get_rating_html(); ?></div>
				<div class="price-box"><?php echo ''.$product->get_price_html(); ?></div>

			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</div>
<?php if ( ( ( 0 == $woocommerce_loop['loop'] % 2 || $james_productsfound == $woocommerce_loop['loop'] ) && $woocommerce_loop['columns'] == 2 )  ) { /* for odd case: $james_productsfound == $woocommerce_loop['loop'] */
	echo '</div>';
} ?>