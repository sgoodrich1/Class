<?php
//following 7 actions all tied to same woocommerce_single_product_summary hook
//do_action( 'woocommerce_single_product_summary' );
//we want to change the sequence of the displayed items output by this action
//in template file content-single-product.php
//step 1: remove all actions tied to the hook
//step 2: create new actions executed in our preferred sequence
//
//current priority is title, price, excerpt
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//change the priority of the actions to 
//title, excerpt, price
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//
//Note that this change to the display on the single productr page did not require editing the template file.
///////////////////////////////////////////////////////////////////////
//in the following member price example we will edit the template file and write new functions
//
//As an exercise, modify this example so that we do not need to edit price.php
//hint: use filters woocommerce_get_price_html and woocommerce_cart_item_price
//
//woocommerce_template_single_price loads the template part file price.php
//start by copying the template file into our theme woocommerce/single-product/price.php 
//from the plugin files woocommerce/templates/single-product/price.php
//Our theme copy will over-ride the plugin template file
// 
///////////////////////////////////////////////////////////////////////////////////////////
///////////// Submit Member Price Discount to cart with hidden field//////////////////////
//members get a 10% discount which we display using the price.php template file
add_action( 'woocommerce_before_add_to_cart_button', 'cis_product_member_price_field', 10 ); 
function cis_product_member_price_field() {
    global $post;
    global $product;
	global $options;
	$discount = 10;
	$discountvalue = (100 - $discount)/100;    
 	if((is_user_logged_in()) ) {
		$price = $discountvalue*$product->regular_price;
    }
    else {
		// do not display in cart if there is no  discount price
		$price = 'none';
	}
	if( (is_user_logged_in())) {
    ?>
        <input type="hidden" id="member-price" name="member-price" value="<?php echo $price ?>">
    <?php
	}
}
/*
 * Add member price to cart item.
 *
 * @param array $cart_item_data
 * @param int   $product_id
 * @param int   $variation_id
 *
 * @return array
 */
add_filter( 'woocommerce_add_cart_item_data', 'cis_product_member_price_to_cart_item', 10, 3 ); 
function cis_product_member_price_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
    global $product;
    $member_price = filter_input( INPUT_POST, 'member-price' );
    $_product = wc_get_product( $product_id );
    $regular_price = $_product->get_regular_price();
 
    if ( empty( $member_price ) ) {
        return $cart_item_data;
    }
    if($member_price == 'none') {
        return $cart_item_data;
	} 
	$cart_item_data['member_price'] = number_format($member_price,2);
	$cart_item_data['regular_price'] = number_format($regular_price,2);
    return $cart_item_data;
}
/*
 * Display member price in the cart.
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
add_filter( 'woocommerce_get_item_data', 'cis_display_member_price_cart', 10, 2 ); 
function cis_display_member_price_cart( $item_data, $cart_item ) {
    if ( empty( $cart_item['member_price'] ) ) {
        return $item_data;
    }
		$item_data[] = array(
			'key'     => __( 'Member Price', 'amf' ),
			'value'   => '$'.wc_clean( $cart_item['member_price'] ),
			'display' => '',
		);
		$item_data[] = array(
			'key'     => __( 'Regular Price', 'amf' ),
			'value'   => '$'.wc_clean( $cart_item['regular_price'] ),
			'display' => '',
		);		
 
    return $item_data;
}
///////////  Display the discounted price in the cart /////////////////
//https://stackoverflow.com/questions/12327251/woocommerce-add-product-to-cart-with-price-override
//https://stackoverflow.com/questions/28576667/get-cart-item-name-quantity-all-details-woocommerce

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );
function add_custom_price( $cart_object ) {
    foreach ( $cart_object->cart_contents as $key => $value ) {
		if (is_user_logged_in() && isset($value['member_price']))
		{
			$value['data']->set_price($value['member_price']);
		}	
    }
}
///////////////////////////////////////////////////////////////////////
/////////////////////// Custom Shipping Fields ////////////////////////
//https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
// add shipping phone to  the checkout page
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['shipping']['shipping_phone'] = array(
        'label'     => __('Phone', 'woocommerce'),
    'placeholder'   => _x('Phone', 'placeholder', 'woocommerce'),
    'required'  => false,
    'class'     => array('form-row-wide'),
    'clear'     => true
     );
     $fields['shipping']['shipping_planet'] = array(
        'label'     => __('Planet', 'woocommerce'),
    'placeholder'   => _x('Planet', 'placeholder', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row-wide'),
    'clear'     => true
     );
     return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Phone From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_shipping_phone', true ) . '</p>';
    //echo '<p><strong>'.__('Planet From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), 'shipping_planet', true ) . '</p>';
}
/**
 * Validate shipping checkout
 */
add_action('woocommerce_checkout_process', 'cis_tribute_checkout_field_process');
function cis_shipping_checkout_field_process() {
    // Check if set, if its not set add an error.
    // validate shipping only when ship_to_different_address is selected
    if( "1 == ship_to_different_address" ){
		if ( empty($_POST['shipping_planet'] ))
			wc_add_notice( __( 'Please complete shipping planet field.' ), 'error' );
	}
}
//
add_action( 'woocommerce_checkout_update_order_meta', 'cis_custom_checkout_field_update_order_meta' );

function cis_custom_checkout_field_update_order_meta( $order_id ) {
    //////////////// Custom Shipping Fields //////////////////////////////////
    if ( ! empty( $_POST['shipping_planet'] ) ) {
        update_post_meta( $order_id, 'Shipping Planet', sanitize_text_field( $_POST['shipping_planet'] ) );
    }
}
