<?php

add_action('init', 'baganuur_ut_integrateWithVC', 20);

function baganuur_ut_integrateWithVC() {
    $baganuur_ut_el_options = $baganuur_ut_global_options = $baganuur_ut_vc_padding_options = array();

    // Add baganuur Number Param
    vc_add_shortcode_param('baganuur_ut_number', 'baganuur_ut_param_number_settings_field');

    function baganuur_ut_param_number_settings_field($settings, $value) {
        $value = intval($value);
        $max = isset($settings['max']) ? (' max="' . intval($settings['max']) . '"') : '';
        $min = isset($settings['min']) ? (' min="' . intval($settings['min']) . '"') : '';
        return '<input name="' . $settings['param_name']
                . '" class="wpb_vc_param_value wpb-textinput '
                . $settings['param_name'] . ' ' . $settings['type']
                . '" type="number"' . $max . $min . ' value="' . $value . '"/>';
    }
    
    // Add baganuur Select Multiple Param
    vc_add_shortcode_param('baganuur_ut_select_multiple', 'baganuur_ut_param_select_multiple_settings_field');

    function baganuur_ut_param_select_multiple_settings_field($settings, $value) {
        $value = explode(',', $value);
        $size = isset($settings['size']) ? (' size="' . intval($settings['size']) . '"') : '';
        $css_option = vc_get_dropdown_option($settings, $value);
        $output = '<select multiple name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-input wpb-select ' . $settings['param_name'] . ' ' . $settings['type'] . ' ' . $css_option . '"  data-option="' . $css_option . '"' . $size . '>';
        if (!empty($settings['value']) && is_array($settings['value'])) {
            foreach ($settings['value']as $label => $name) {
                $selected = '';
                if (in_array($name, $value)) {
                    $selected = ' selected="selected"';
                }
                $output.='<option value="' . esc_attr($name) . '"' . $selected . '>' . $label . '</option>';
            }
        }
        $output.='</select>';
        return $output;
    }

    // Categories
    $ignoredPostType = array('page', 'attachment', 'revision', 'nav_menu_item');
    $arrayPostType = array();
    $arrayPostTypeHide = array();
    $postTypeList = get_post_types(array(), 'objects');
    foreach ($postTypeList as $slug => $typeOptions) {
        if (!in_array($slug, $ignoredPostType)) {
            $arrayPostType[$slug] = $typeOptions->labels->menu_name;
            //---------hide----------
            $tmpArr = array();
            foreach ($postTypeList as $slugSub => $typeOptionsSub) {
                if (!in_array($slugSub, $ignoredPostType) && $slug !== $slugSub) {
                    $tmpArr[] = 'cat_' . $slugSub;
                }
            }
            $arrayPostTypeHide[$slug] = implode(",", $tmpArr);
        }
    }

    $categories = array();
    foreach ($arrayPostType as $slug => $name) {
        $categories[$slug] = array();
        $taxonomyNames = get_object_taxonomies($slug);
        if (isset($taxonomyNames[0])) {
            $taxonomyCategories = get_terms($taxonomyNames[0], 'hide_empty=0');
            if (!empty($taxonomyCategories)) {
                foreach ($taxonomyCategories as $taxonomyCategorie) {
                    $categories[$slug][$taxonomyCategorie->name] = $taxonomyCategorie->slug;
                }
            }
        }
    }

    $baganuur_ut_el_options['cat'] = $categories;

    // Animation
    $baganuur_ut_el_options['animations'] = array(
        esc_html__('No Animation', 'baganuur') => 'none',
        esc_html__('FadeIn', 'baganuur') => 'fadeIn',
        esc_html__('FadeInUp', 'baganuur') => 'fadeInUp',
        esc_html__('FadeInDown', 'baganuur') => 'fadeInDown',
        esc_html__('FadeInLeft', 'baganuur') => 'fadeInLeft',
        esc_html__('FadeInRight', 'baganuur') => 'fadeInRight',
        esc_html__('FadeInUpBig', 'baganuur') => 'fadeInUpBig',
        esc_html__('FadeInDownBig', 'baganuur') => 'fadeInDownBig',
        esc_html__('FadeInLeftBig', 'baganuur') => 'fadeInLeftBig',
        esc_html__('FadeInRightBig', 'baganuur') => 'fadeInRightBig',
        esc_html__('SlideInUp', 'baganuur') => 'slideInUp',
        esc_html__('SlideInDown', 'baganuur') => 'slideInDown',
        esc_html__('SlideInLeft', 'baganuur') => 'slideInLeft',
        esc_html__('SlideInRight', 'baganuur') => 'slideInRight',
        esc_html__('SlideExpandUp', 'baganuur') => 'slideExpandUp',
        esc_html__('ExpandUp', 'baganuur') => 'expandUp',
        esc_html__('ExpandOpen', 'baganuur') => 'expandOpen',
        esc_html__('BigEntrance', 'baganuur') => 'bigEntrance',
        esc_html__('Hatch', 'baganuur') => 'hatch',
        esc_html__('HeadShake', 'baganuur') => 'headShake',
        esc_html__('Bounce', 'baganuur') => 'bounce',
        esc_html__('Pulse', 'baganuur') => 'pulse',
        esc_html__('Floating', 'baganuur') => 'floating',
        esc_html__('Tossing', 'baganuur') => 'tossing',
        esc_html__('PullUp', 'baganuur') => 'pullUp',
        esc_html__('PullDown', 'baganuur') => 'pullDown',
        esc_html__('StretchLeft', 'baganuur') => 'stretchLeft',
        esc_html__('StretchRight', 'baganuur') => 'stretchRight',
        esc_html__('Flash', 'baganuur') => 'flash',
        esc_html__('Shake', 'baganuur') => 'shake',
        esc_html__('Tada', 'baganuur') => 'tada',
        esc_html__('Swing', 'baganuur') => 'swing',
        esc_html__('Wobble', 'baganuur') => 'wobble',
        esc_html__('Jello', 'baganuur') => 'jello',
        esc_html__('Flip', 'baganuur') => 'flip',
        esc_html__('FlipInX', 'baganuur') => 'flipInX',
        esc_html__('FlipInY', 'baganuur') => 'flipInY',
        esc_html__('Bounce', 'baganuur') => 'bounce',
        esc_html__('BounceIn', 'baganuur') => 'bounceIn',
        esc_html__('BounceInDown', 'baganuur') => 'bounceInDown',
        esc_html__('BounceInUp', 'baganuur') => 'bounceInUp',
        esc_html__('BounceInLeft', 'baganuur') => 'bounceInLeft',
        esc_html__('BounceInRight', 'baganuur') => 'bounceInRight',
        esc_html__('RubberBand', 'baganuur') => 'rubberBand',
        esc_html__('RotateIn', 'baganuur') => 'rotateIn',
        esc_html__('RotateInDownLeft', 'baganuur') => 'rotateInDownLeft',
        esc_html__('RotateInDownRight', 'baganuur') => 'rotateInDownRight',
        esc_html__('RotateInUpLeft', 'baganuur') => 'rotateInUpLeft',
        esc_html__('RotateInUpRight', 'baganuur') => 'rotateInUpRight',
        esc_html__('LightSpeedIn', 'baganuur') => 'lightSpeedIn',
        esc_html__('RollIn', 'baganuur') => 'rollIn',
        esc_html__('ZoomIn', 'baganuur') => 'zoomIn',
        esc_html__('ZoomInDown', 'baganuur') => 'zoomInDown',
        esc_html__('ZoomInLeft', 'baganuur') => 'zoomInLeft',
        esc_html__('ZoomInRight', 'baganuur') => 'zoomInRight',
        esc_html__('ZoomInUp', 'baganuur') => 'zoomInUp',
    );

    baganuur_ut_global::set('baganuur_ut_element_options', $baganuur_ut_el_options);
    $baganuur_ut_el_options = baganuur_ut_global::get('baganuur_ut_element_options');

    $baganuur_ut_anim_options = array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Animation', 'baganuur'),
            'param_name' => 'animated',
            'value' => $baganuur_ut_el_options['animations'],
            'group' => esc_html__('Content Options', 'baganuur'),
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Animation Delay', 'baganuur'),
            'param_name' => 'animation_delay',
            'value' => '',
            'description' => esc_html__('Example:300', 'baganuur'),
            'group' => esc_html__('Content Options', 'baganuur'),
        ),
    );

    baganuur_ut_global::set('baganuur_ut_anim_options', $baganuur_ut_anim_options);

    // Global Options
    $baganuur_ut_global_options = array(
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__('Custom Class', 'baganuur'),
            'param_name' => 'custom_class',
            'value' => '',
            'group' => esc_html__('Content Options', 'baganuur'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'baganuur'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'baganuur'),
        ),
    );
    
    baganuur_ut_global::set('baganuur_ut_global_options', $baganuur_ut_global_options);

    baganuur_ut_global::set('baganuur_ut_element_options', $baganuur_ut_el_options);

    // Elements
    $baganuur_ut_elements = array(
        'blog',
        'post-carousel',
        'map',
        'team',
        'team-item',
    );
    foreach ($baganuur_ut_elements as $baganuur_ut_element) {
        require_once ('baganuur-ut-element-options/baganuur-ut-' . $baganuur_ut_element . '-options.php');
    }
}

// Visual Composer CSS & JS
add_action('vc_base_register_admin_css', 'baganuur_ut_composer_admin_css');

function baganuur_ut_composer_admin_css() {
    wp_enqueue_style('baganuur-ut-composer', plugin_dir_url(__FILE__) . 'assets/css/admin-baganuur-ut-composer.css');
    wp_enqueue_style('baganuur-ut-ionfonts', plugin_dir_url(__FILE__) . 'assets/css/ionicons.min.css');
}

add_action('admin_enqueue_scripts', 'baganuur_ut_composer_admin_js');

function baganuur_ut_composer_admin_js() {
    if (isset($_GET['vc_action']) && $_GET['vc_action'] === 'vc_inline') {
        wp_enqueue_script('baganuur-ut-composer-frontend', plugin_dir_url(__FILE__) . 'assets/js/admin-baganuur-ut-composer-frontend.js', array('jquery', 'jquery-ui-sortable', 'vc_inline_custom_view_js'), false, true);
    } else {
        wp_enqueue_script('baganuur-ut-composer-backend', plugin_dir_url(__FILE__) . 'assets/js/admin-baganuur-ut-composer-backend.js', array('jquery', 'jquery-ui-sortable', 'wpb_js_composer_js_view'), false, true);
    }
    wp_enqueue_script('baganuur-ut-composer-atts', plugin_dir_url(__FILE__) . 'assets/js/admin-baganuur-ut-composer-atts.js', array('jquery', 'jquery-ui-sortable', 'wpb_js_composer_js_view'), false, true);
}

add_action('admin_init', 'baganuur_ut_elements_include');

function baganuur_ut_elements_include() {
    require_once 'baganuur-ut-shortcode.php';
}

function baganuur_ut_rep_param_def($params = array(), $paramsNewDefault = array()) {
    foreach ($paramsNewDefault as $param_name => $value) {
        foreach ($params as $key => $paramArray) {
            if (isset($paramArray['param_name']) && $paramArray['param_name'] === $param_name) {
                $params[$key][isset($paramArray['type']) && $paramArray['type'] === 'dropdown' ? 'std' : 'value'] = $value;
                break;
            }
        }
    }
    return $params;
}

add_action('admin_enqueue_scripts', 'baganuur_ut_custom_admin_js');

function baganuur_ut_custom_admin_js() {
    wp_register_script('baganuur-ut-shortcode', plugin_dir_url(__FILE__) . 'assets/js/admin-baganuur-ut-shortcode.js', 'jquery', '1.0');
    wp_enqueue_script('baganuur-ut-shortcode');
}
