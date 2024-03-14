<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme minimalistix for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'minimalistix_register_required_plugins', 0);
function minimalistix_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'minimalistix',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}


function new_excerpt_more($more){
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

register_block_pattern_category(
	'minimalistix',
	array( 'label' => __( 'Minimalistix', 'minimalistix' ) )
);

add_action('init', function() {
	remove_theme_support('core-block-patterns');
});

add_theme_support( 'wp-block-styles' );



function minimalistix_pattern_styles()
{
	wp_enqueue_style('minimalistix-patterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('minimalistix-editor', get_template_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'minimalistix_pattern_styles');




// Initialize information content
require_once trailingslashit(get_template_directory()) . 'inc/vendor/autoload.php';

use SuperbThemesThemeInformationContent\ThemeEntryPoint;

ThemeEntryPoint::init([
	"templates" => [
		array(
			'name' => __("Front Page", "minimalistix"),
			'frontpage' => true,
			'required' => true,
			'image' => 'front-page.png',
		),
		array(
			'name' => __("About", "minimalistix"),
			'required' => false,
			'slug' => 'about',
			'image' => 'about.png',
		),
		array(
			'name' => __("Contact", "minimalistix"),
			'required' => false,
			'slug' => 'contact',
			'image' => 'contact.png',
		),
		array(
			'name' => __("Blog", "minimalistix"),
			'template_only' => true,
			'required' => true,
			'image' => 'blog.png',
		),
		array(
			'name' => __("Page", "minimalistix"),
			'template_only' => true,
			'required' => true,
			'image' => 'pages.png',
		),
		array(
			'name' => __("Post", "minimalistix"),
			'template_only' => true,
			'required' => true,
			'image' => 'posts.png',
		),
		array(
			'name' => __("Archives", "minimalistix"),
			'template_only' => true,
			'required' => true,
			'image' => 'archives.png',
		),
		array(
			'name' => __("Search", "minimalistix"),
			'template_only' => true,
			'required' => true,
			'image' => 'search.png',
		),
		array(
			'name' => __("404", "minimalistix"),
			'template_only' => true,
			'required' => true,
			'image' => '404.png',
		),
	],
	'theme_url' => 'https://superbthemes.com/minimalistix/',
	'demo_url' => 'https://superbthemes.com/demo/minimalistix/'
]);