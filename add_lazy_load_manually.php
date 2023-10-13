// For manually adding lazy load

function handler_wp_img_tag_add_loading_attr_mod( $attr_value, $image_tag = '', $context = '' ) 
{
	return 'lazy';
}
add_filter( 'wp_img_tag_add_loading_attr', 'handler_wp_img_tag_add_loading_attr_mod', 9999, 3 );
