<?php

/**
 * Plugin Name: baganuur Core MNG
 * Plugin URI:  http://www.uniontheme.com/
 * Description: Enables a portfolio and visual composer extend.
 * Version:     1.1
 * Author:      UnionTheme
 * Author URI:  http://www.uniontheme.com/
 * Text Domain: baganuur
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 * 
 *  
 * @package   uniontheme_plugin
 * @author    UnionTheme
 * @license   GPL-2.0+
 * @link      uniontheme.com
 * @copyright 2016 UnionTheme
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!function_exists('baganuur_ut_vc_add_on_textdomain')) {
    add_action('plugins_loaded', 'baganuur_ut_vc_add_on_textdomain');

    function baganuur_ut_vc_add_on_textdomain() {
        load_plugin_textdomain('baganuur', FALSE, plugin_basename(dirname(__FILE__)) . '/languages');
    }

}

/**
 * Customizer Visual Composer
 */
function baganuur_ut_before_visual_composer() {

    if ( class_exists( "baganuur_ut_setup" ) ) {
        require_once plugin_dir_path(__FILE__) . 'vc-extend/0-options.php';
        require_once plugin_dir_path(__FILE__) . 'vc-extend/globals.php';
    }

}

add_action('vc_before_init', 'baganuur_ut_before_visual_composer');
add_filter('widget_text', 'do_shortcode');