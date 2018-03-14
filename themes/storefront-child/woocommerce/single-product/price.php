<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
global $post;
$discount = 10;
$discountvalue = (100 - $discount)/100;
$regular_price = $product->regular_price;
$discount_price = $discountvalue*$product->regular_price;
$save = $regular_price - $discount_price;

?>
<p class="price">
<?php 
//echo $product->get_price_html(); 
if( (!is_user_logged_in())) { 
	?>
	<?php echo $product->get_price_html(); ?>
	<span class = "cis_member_price">Member Price: $
	<?php 
	echo number_format($discount_price,2);
	?>
	</span>
<?php
}
if( (is_user_logged_in())) {
	echo '$'.number_format($discount_price,2);
	echo '<br>Members save $'.number_format($save,2);
}
?>
</p>
