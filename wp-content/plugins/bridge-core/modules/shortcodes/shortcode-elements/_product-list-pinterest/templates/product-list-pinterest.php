<?php

$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6', 'p');

//get correct heading value. If provided heading isn't valid get the default one
$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

$category_style = '';
if($category_color !== '') {
	$category_style .= ' style="color: '.$category_color.';"';
}

$separator_style = '';
if($separator_color !== '') {
	$separator_style .= ' style="background-color: '.$separator_color.';"';
}

$price_style = '';
if($price_color !== '' || $price_font_size !== '') {
	$price_style .= ' style="';

	if($price_color !== '') {
		$price_style .= 'color:'.$price_color.';';
	}
	if($price_font_size !== '') {
		$price_style .= 'font-size:'.$price_font_size.'px;';
	}

	$price_style .= '"';
}

$product_item_style = '';
if($hover_background_color !== ''){
	$product_item_style .= 'style="background-color:'.$hover_background_color.';"';
}

$product_list_args =  array(
	'post_type' => 'product',
	'posts_per_page' => $per_page,
	'orderby' => $order_by,
	'order' => $order
);

if(!empty($category)){
	$product_list_args['product_cat'] = $category;
}

if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
	$product_list_args['meta_query'] = array(
		array(
			'key' => '_stock_status',
			'value' => 'instock',
			'compare' => '=',
		)
	);
}

$q = new WP_Query($product_list_args);

$html = "";
$html .= '<div class="qode_product_list_pinterest_holder '.$columns.'"><div class="qode_product_list_pinterest_holder_inner">';
$html .= '<div class="qode_product_list_sizer"></div>';
$html .= '<div class="qode_product_list_gutter"></div>';
while ($q->have_posts()) : $q->the_post();

	global $product;

	$price = $product->get_price_html();

	// WooCommerce plugin changed hooks in 3.0 version and because of that we have this condition
	if ( version_compare( WOOCOMMERCE_VERSION, '3.0' ) >= 0 ) {
		$button = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s %s %s %s">%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			esc_attr( 'qbutton ' ),
			esc_attr($product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart ' : ' '),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : 'qode-product-out-of-stock',
			esc_attr($product->get_type()),
			esc_html( $product->add_to_cart_text() )
		);
	} else {
		$button = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s %s %s %s">%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			esc_attr( 'qbutton ' ),
			esc_attr($product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart ' : ' '),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : 'qode-product-out-of-stock',
			esc_attr($product->product_type),
			esc_html( $product->add_to_cart_text() )
		);
	}

	$image = '';
	$product_image_size = 'full';
	if ( has_post_thumbnail() ) {
		$image = get_the_post_thumbnail( get_the_ID(), $product_image_size);
	}

	// WooCommerce plugin changed hooks in 3.0 version and because of that we have this condition
	if ( version_compare( WOOCOMMERCE_VERSION, '3.0' ) >= 0 ) {
		$cat = wc_get_product_category_list( $product->get_id(), ' ' );
	} else {
		$cat = $product->get_categories(' ');
	}

	$title = get_the_title();


	$html .= '<div class="qode_product_list_item">';
	if($image !== '') {
		$html .= '<div class="qode_product_image">'.$image.'</div>';
	}
	$html .= '<div class="qode_product_list_item_text">';
	if(! empty($category_color)){
		$html .= '<div class="qode_product_category qode_product_category_inherit_color" '.$category_style.'>'.$cat.'</div>';
	}
	else{
		$html .= '<div class="qode_product_category" '.$category_style.'>'.$cat.'</div>';
	}
	$html .= '<'.$title_tag.' itemprop="name" class="qode_product_title entry-title">'. $title .'</'.$title_tag.'>';
	$html .= '<div class="qode_product_separator separator center small" '.$separator_style.'></div>';
	$html .= '<div class="qode_product_price" '.$price_style.'>'.$price.'</div>';
	$html .= '</div>';

	$html .= '<div class="qode_product_list_item_hover_holder">';
	$html .= '<div class="qode_product_list_item_hover">';
	$html .= '<div class="qode_product_list_item_hover_inner">';
	if(! empty($category_color)){
		$html .= '<div class="qode_product_category qode_product_category_inherit_color" '.$category_style.'>'.$cat.'</div>';
	}
	else{
		$html .= '<div class="qode_product_category" '.$category_style.'>'.$cat.'</div>';
	}
	$html .= '<'.$title_tag.' itemprop="name" class="qode_product_title entry-title"><a itemprop="url" class="product_list_link" href="'.get_the_permalink().'" target="_self">'. $title .'</a></'.$title_tag.'>';
	$html .= '<div class="qode_product_separator separator center small" '.$separator_style.'></div>';
	$html .= '<div class="qode_product_price" '.$price_style.'>'.$price.'</div>';
	$html .= '<div class="qode_product_button">'.$button.'</div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	$html .= '<a itemprop="url" class="product_list_link" href="'.get_the_permalink().'" target="_self"></a>';
	$html .= '</div>';

endwhile;
wp_reset_postdata();

$html .= "</div></div>";

echo bridge_qode_get_module_part( $html );