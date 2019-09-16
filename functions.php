<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');
    
    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
    
    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css');
    wp_enqueue_style('webfonts', get_stylesheet_directory_uri() . '/css/webfonts.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js');
    wp_enqueue_script('rellax', get_stylesheet_directory_uri() . '/js/rellax.js');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js');
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');

function disable_shipping_calc_on_cart($show_shipping)
{
    if (is_cart()) {
        return false;
    }
    return $show_shipping;
}
add_filter('woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('wc_empty_cart_centered', 'wc_empty_cart_message_centered');

function wc_empty_cart_message_centered()
{
    echo '<p class="cart-empty text-center">' . wp_kses_post(apply_filters('wc_empty_cart_message', __('Your cart is currently empty.', 'woocommerce'))) . '</p>';
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//This snippet will remove the notice that shows the number of results.

// add_filter('woocommerce_show_page_title', '__return_false');

function display_single_product_tags_after_summary()
{
    global $products;
    $product_id   = $products->id;
    $product_tags = get_the_term_list($product_id, 'product_tag', '', ',');
    echo '<span class="single-product-tags">' . $product_tags . '</span>';
}
;
add_action('woocommerce_single_product_summary', 'display_single_product_tags_after_summary', 0, 0);


/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
function jk_dequeue_styles($enqueue_styles)
{
    return $enqueue_styles;
}

add_action('after_setup_theme', 'register_custom_nav_menus');
function register_custom_nav_menus()
{
    register_nav_menus(array(
        'Right menu' => 'Right menu',
        'Left menu' => 'Left menu',
        'Mobile menu' => 'Mobile menu',
        'Category menu' => 'Category menu'
    ));
}

function rossini_widgets_init()
{
    
    register_sidebar(array(
        'name' => 'Language Switcher Widget',
        'id' => 'language_switcher_widget',
        'before_widget' => '<div class="language-switcher-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="language-switcher-widget-title">',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Category Menu Widget',
        'id' => 'category_menu_widget',
        'before_widget' => '<div class="category-menu-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="category-menu-widget-title">',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Currency Switcher Widget',
        'id' => 'currency_switcher_widget',
        'before_widget' => '<div class="currency-switcher-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="currency-switcher-widget-title">',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Product Search Overlay Widget',
        'id' => 'product_search_overlay_widget',
        'before_widget' => '<div class="product-search-overlay-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="product-search-overlay-widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'rossini_widgets_init');

if (is_singular('product')) {
    
    wc_get_template_part('/single-product', $args, $template_path, $default_path);
}

function move_admin_bar()
{
    echo '
    <style type="text/css">
    body {margin-top: -28px;padding-bottom: 28px;}
    body.admin-bar #wphead {padding-top: 0;}
    body.admin-bar #footer {padding-bottom: 28px;}
    #wpadminbar { top: auto !important;bottom: 0;}
    #wpadminbar .quicklinks .menupop ul { bottom: 28px;}
    </style>';
}
add_action('wp_head', 'move_admin_bar');

add_action('woocommerce_after_main_content', 'understrap_woocommerce_wrapper_end', 10);

if (!function_exists('understrap_woocommerce_wrapper_start')) {
    function understrap_woocommerce_wrapper_start()
    {
        $container = get_theme_mod('understrap_container_type');
        echo '<div class="wrapper pt-0" id="woocommerce-wrapper">';
        echo '<div class="pt-3" id="content" tabindex="-1">';
        echo '<div class="row pt-2">';
        get_template_part('sidebar-templates/sidebar', 'left');
        echo '<main class="col site-main" id="main">';
    }
}

add_action('wp_head', 'hide_sidebar');
function hide_sidebar()
{
    if (is_cart() || is_checkout() || is_product()) {
?><style type="text/css">
	#left-sidebar {
		display: none !important;
	}
</style><?php
    }
}

if (!function_exists('wc_dropdown_variation_attribute_options')) {
    
    /**
     * Output a list of variation attributes for use in the cart forms.
     *
     * @param array $args Arguments.
     * @since 2.4.0
     */
    function wc_dropdown_variation_attribute_options($args = array())
    {
        $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
            'options' => false,
            'attribute' => false,
            'product' => false,
            'selected' => false,
            'name' => '',
            'id' => '',
            'class' => '',
            'show_option_none' => __('Choose an option', 'woocommerce')
        ));
        
        // Get selected value.
        if (false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
            $selected_key     = 'attribute_' . sanitize_title($args['attribute']);
            $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key])) : $args['product']->get_variation_default_attribute($args['attribute']); // WPCS: input var ok, CSRF ok, sanitization ok.
        }
        
        $options               = $args['options'];
        $product               = $args['product'];
        $attribute             = $args['attribute'];
        $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title($attribute);
        $id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
        $class                 = $args['class'];
        $show_option_none      = (bool) $args['show_option_none'];
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce'); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.
        
        if (empty($options) && !empty($product) && !empty($attribute)) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[$attribute];
        }
        
        $html = '<select id="' . esc_attr($id) . '" class="form-control' . esc_attr($class) . '" name="' . esc_attr($name) . '" data-attribute_name="attribute_' . esc_attr(sanitize_title($attribute)) . '" data-show_option_none="' . ($show_option_none ? 'yes' : 'no') . '">';
        $html .= '<option value="">' . esc_html($show_option_none_text) . '</option>';
        
        if (!empty($options)) {
            if ($product && taxonomy_exists($attribute)) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms($product->get_id(), $attribute, array(
                    'fields' => 'all'
                ));
                
                foreach ($terms as $term) {
                    if (in_array($term->slug, $options, true)) {
                        $html .= '<option value="' . esc_attr($term->slug) . '" ' . selected(sanitize_title($args['selected']), $term->slug, false) . '>' . esc_html(apply_filters('woocommerce_variation_option_name', $term->name, $term, $attribute, $product)) . '</option>';
                    }
                }
            } else {
                foreach ($options as $option) {
                    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                    $selected = sanitize_title($args['selected']) === $args['selected'] ? selected($args['selected'], sanitize_title($option), false) : selected($args['selected'], $option, false);
                    $html .= '<option value="' . esc_attr($option) . '" ' . $selected . '>' . esc_html(apply_filters('woocommerce_variation_option_name', $option, null, $attribute, $product)) . '</option>';
                }
            }
        }
        
        $html .= '</select>';
        
        echo apply_filters('woocommerce_dropdown_variation_attribute_options_html', $html, $args); // WPCS: XSS ok.
    }
}


remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('after_setup_theme', 'understrap_woocommerce_support');
if (!function_exists('understrap_woocommerce_support')) {
    /**
     * Declares WooCommerce theme support.
     */
    function understrap_woocommerce_support()
    {
        add_theme_support('woocommerce');
        
        // Add New Woocommerce 3.0.0 Product Gallery support.
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-slider');
        
        // hook in and customizer form fields.
        add_filter('woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3);
    }
}

add_filter('woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999);

function bbloomer_change_number_related_products($args)
{
    $args['posts_per_page'] = 4; // # of related products
    return $args;
}

add_filter('wc_add_to_cart_message_html', 'custom_add_to_cart_message_html', 10, 2);
function custom_add_to_cart_message_html($message, $products)
{
    $titles = array();
    $count  = 0;
    
    foreach ($products as $product_id => $qty) {
        $titles[] = ($qty > 1 ? absint($qty) . ' &times; ' : '') . sprintf(_x('&ldquo;%s&rdquo;', 'Item name in quotes', 'woocommerce'), strip_tags(get_the_title($product_id)));
        $count += $qty;
    }
    
    $titles     = array_filter($titles);
    $added_text = sprintf(_n('%s has been added to your cart.', '%s have been added to your cart.', $count, 'woocommerce'), wc_format_list_of_items($titles));
    
    // The custom message is just below
    $added_text = sprintf(_n("%s item has %s", "%s items have %s", $count, "woocommerce"), $count, __("been added to your basket.", "woocommerce"));
    
    // Output success messages
    if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
        $return_to = apply_filters('woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect(wc_get_raw_referer(), false) : wc_get_page_permalink('shop'));
        $message   = sprintf('<a href="%s" class="btn btn-primary mr-2">%s</a> %s', esc_url($return_to), esc_html__('Continue shopping', 'woocommerce'), esc_html($added_text));
    } else {
        $message = sprintf('<a href="%s" class="btn btn-primary mr-2">%s</a> %s', esc_url(wc_get_page_permalink('cart')), esc_html__('View cart', 'woocommerce'), esc_html($added_text));
    }
    return $message;
}

function wc_hide_selected_terms($terms, $taxonomies, $args)
{
    $new_terms = array();
    if (in_array('product_cat', $taxonomies) && !is_admin() && is_shop() && is_product_category()) {
        foreach ($terms as $key => $term) {
            if (!in_array($term->slug, array(
                'uncategorized',
                'uncategorized-de',
                'uncategorized-fr',
                'uncategorized-it'
            ))) {
                $new_terms[] = $term;
            }
        }
        $terms = $new_terms;
    }
    return $terms;
}
add_filter('get_terms', 'wc_hide_selected_terms', 10, 3);

function my_wc_cart_count()
{
    
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        
        $count = WC()->cart->cart_contents_count;
?><a class="cart-contents" href="<?php
        echo WC()->cart->get_cart_url();
?>"
	title="<?php
        _e('View your shopping cart');
?>"><?php
        if ($count > 0) {
?>
	<span class="cart-contents-count"><?php
            echo esc_html($count);
?></span>
	<?php
        }
?></a><?php
    }
}
add_action('your_theme_header_top', 'my_wc_cart_count');

// Set currency based on visitor country
if (!is_admin()) {
    add_filter('wcml_client_currency', 'geo_client_currency');
    function geo_client_currency($client_currency)
    {
        $country = WC()->customer->get_shipping_country();
        switch ($country) {
            // EU
            case "AT":
                return "EUR";
                break;
            case "BE":
                return "EUR";
                break;
            case "CY":
                return "EUR";
                break;
            case "EE":
                return "EUR";
                break;
            case "FI":
                return "EUR";
                break;
            case "FR":
                return "EUR";
                break;
            case "DE":
                return "EUR";
                break;
            case "EL":
                return "EUR";
                break;
            case "IT":
                return "EUR";
                break;
            case "LT":
                return "EUR";
                break;
            case "LV":
                return "EUR";
                break;
            case "LU":
                return "EUR";
                break;
            case "MT":
                return "EUR";
                break;
            case "NL":
                return "EUR";
                break;
            case "PT":
                return "EUR";
                break;
            case "SP":
                return "EUR";
                break;
            case "SI":
                return "EUR";
                break;
            case "SK":
                return "EUR";
                break;
            // Others
            case "CH":
                return "CHF";
                break;
            default:
                return "CHF";
                break;
        }
    }
}

function understrap_widget_classes($params)
{
    
    global $sidebars_widgets;
    
    /*
     * When the corresponding filter is evaluated on the front end
     * this takes into account that there might have been made other changes.
     */
    $sidebars_widgets_count = apply_filters('sidebars_widgets', $sidebars_widgets);
    
    // Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
    if (isset($params[0]['id']) && strpos($params[0]['before_widget'], 'dynamic-classes')) {
        $sidebar_id   = $params[0]['id'];
        $widget_count = count($sidebars_widgets_count[$sidebar_id]);
        
        $widget_classes = 'widget-count-' . $widget_count;
        if (0 === $widget_count % 4 || $widget_count > 6) {
            // Four widgets per row if there are exactly four or more than six.
            $widget_classes .= ' col-md-2';
        } elseif (6 === $widget_count) {
            // If two widgets are published.
            $widget_classes .= ' col-md-2';
        } elseif ($widget_count >= 3) {
            // Three widgets per row if there's three or more widgets.
            $widget_classes .= ' col-md-4';
        } elseif (2 === $widget_count) {
            // If two widgets are published.
            $widget_classes .= ' col-md-6';
        } elseif (1 === $widget_count) {
            // If just on widget is active.
            $widget_classes .= ' col-md-12';
        }
        
        // Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
        $params[0]['before_widget'] = str_replace('dynamic-classes', $widget_classes, $params[0]['before_widget']);
    }
    
    return $params;
}


add_action('woocommerce_after_add_to_cart_button', 'add_content_after_addtocart_button_func');

function add_content_after_addtocart_button_func()
{
    if (is_product() && has_term('halsketten', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
 <hr>
 
 <a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
 <div class="mt-3 collapse" id="sizeguide">
	 <table style="float:left; margin-right: 2rem;">
		 <tr>
			 <th>' . __('Neclackes', 'rossini') . '</th>
		 </tr>
		 
		 <tr>
			 <td style="width:20px;">S</td>
			 <td>cm 40 - 45</td>
		 </tr>

		 <tr>
			 <td style="width:20px;">M</td>
			 <td>cm 55 - 65</td>
		 </tr>

		 <tr>
			 <td style="width:20px;">L</td>
			 <td>cm 80 - 90</td>
		 </tr>

		 <tr>
			 <td style="width:20px;">XL</td>
			 <td>cm 100 - 120</td>
		 </tr>
	 </table>

 </div>
 ';
    }
    
    if (is_product() && has_term('necklaces', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
		<hr>
		
		<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
		<div class="mt-3 collapse" id="sizeguide">
			<table style="float:left; margin-right: 2rem;">
				<tr>
					<th>' . __('Neclackes', 'rossini') . '</th>
				</tr>
				
				<tr>
					<td style="width:20px;">S</td>
					<td>cm 40 - 45</td>
				</tr>
	 
				<tr>
					<td style="width:20px;">M</td>
					<td>cm 55 - 65</td>
				</tr>
	 
				<tr>
					<td style="width:20px;">L</td>
					<td>cm 80 - 90</td>
				</tr>
	 
				<tr>
					<td style="width:20px;">XL</td>
					<td>cm 100 - 120</td>
				</tr>
			</table>
	 
		</div>
		';
    }
    
    if (is_product() && has_term('collane', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
			<hr>
			
			<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
			<div class="mt-3 collapse" id="sizeguide">
				<table style="float:left; margin-right: 2rem;">
					<tr>
						<th>' . __('Neclackes', 'rossini') . '</th>
					</tr>
					
					<tr>
						<td style="width:20px;">S</td>
						<td>cm 40 - 45</td>
					</tr>
		 
					<tr>
						<td style="width:20px;">M</td>
						<td>cm 55 - 65</td>
					</tr>
		 
					<tr>
						<td style="width:20px;">L</td>
						<td>cm 80 - 90</td>
					</tr>
		 
					<tr>
						<td style="width:20px;">XL</td>
						<td>cm 100 - 120</td>
					</tr>
				</table>
		 
			</div>
			';
    }
    
    if (is_product() && has_term('colliers', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
				<hr>
				
				<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
				<div class="mt-3 collapse" id="sizeguide">
					<table style="float:left; margin-right: 2rem;">
						<tr>
							<th>' . __('Neclackes', 'rossini') . '</th>
						</tr>
						
						<tr>
							<td style="width:20px;">S</td>
							<td>cm 40 - 45</td>
						</tr>
			 
						<tr>
							<td style="width:20px;">M</td>
							<td>cm 55 - 65</td>
						</tr>
			 
						<tr>
							<td style="width:20px;">L</td>
							<td>cm 80 - 90</td>
						</tr>
			 
						<tr>
							<td style="width:20px;">XL</td>
							<td>cm 100 - 120</td>
						</tr>
					</table>
			 
				</div>
				';
    }
    
    
    if (is_product() && has_term('bracelets-fr', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
					<hr>
					
					<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
					<div class="mt-3 collapse" id="sizeguide">
						<table class="mt-1">
						<tr>
							<th>'.__( 'Bracelets', 'rossini' ).'</th>
						</tr>
						
						<tr>
							<td style="width:20px;">S</td>
							<td> cm 15</td>
						</tr>
			
						<tr>
							<td style="width:20px;">M</td>
							<td> cm 17</td>
						</tr>
			
						<tr>
							<td style="width:20px;">L</td>
							<td> cm 20</td>
						</tr>
					</table>
				 
					</div>
					';
    }
    if (is_product() && has_term('armbander', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
					<hr>
					
					<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
					<div class="mt-3 collapse" id="sizeguide">
						<table class="mt-1">
						<tr>
							<th>'.__( 'Bracelets', 'rossini' ).'</th>
						</tr>
						
						<tr>
							<td style="width:20px;">S</td>
							<td> cm 15</td>
						</tr>
			
						<tr>
							<td style="width:20px;">M</td>
							<td> cm 17</td>
						</tr>
			
						<tr>
							<td style="width:20px;">L</td>
							<td> cm 20</td>
						</tr>
					</table>
				 
					</div>
					';
    }
    if (is_product() && has_term('bracelets', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
					<hr>
					
					<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
					<div class="mt-3 collapse" id="sizeguide">
						<table class="mt-1">
						<tr>
							<th>'.__( 'Bracelets', 'rossini' ).'</th>
						</tr>
						
						<tr>
							<td style="width:20px;">S</td>
							<td> cm 15</td>
						</tr>
			
						<tr>
							<td style="width:20px;">M</td>
							<td> cm 17</td>
						</tr>
			
						<tr>
							<td style="width:20px;">L</td>
							<td> cm 20</td>
						</tr>
					</table>
				 
					</div>
					';
    }
    if (is_product() && has_term('bracciali', 'product_cat')) {
        // Echo content.
        echo '<div class="d-block mt-3"><small>' . __('Do you have a question? Contact our <a href="mailto:info@gioiellirossini.com">Customer Service</a>.', 'rossini') . '</small></div>
					<hr>
					
					<a class="size-guide-btn collapsed " data-toggle="collapse" href="#sizeguide" role="button" aria-expanded="false" aria-controls="sizeguide" class="d-block mt-3">' . __('Size guide', 'rossini') . '</a>
					<div class="mt-3 collapse" id="sizeguide">
						<table class="mt-1">
						<tr>
							<th>'.__( 'Bracelets', 'rossini' ).'</th>
						</tr>
						
						<tr>
							<td style="width:20px;">S</td>
							<td> cm 15</td>
						</tr>
			
						<tr>
							<td style="width:20px;">M</td>
							<td> cm 17</td>
						</tr>
			
						<tr>
							<td style="width:20px;">L</td>
							<td> cm 20</td>
						</tr>
					</table>
				 
					</div>
					';
    }
}

add_action( 'woocommerce_before_shop_loop_item_title', 'new_product_defaults_wrap_open' , 20 ); //opener
add_action( 'woocommerce_after_shop_loop_item_title', 'new_product_defaults_wrap_close', 40); //closer

function new_product_defaults_wrap_open() {
  echo '<div class="product-details">';
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 20 );
}

function new_product_defaults_wrap_close() {
    echo '</div><!--/.product-details-->';
}
