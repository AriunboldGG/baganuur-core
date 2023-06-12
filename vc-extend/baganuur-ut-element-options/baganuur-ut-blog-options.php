<?php

$baganuur_ut_element_options = baganuur_ut_global::get('baganuur_ut_element_options');
$baganuur_ut_global_options = baganuur_ut_global::get('baganuur_ut_global_options');
$baganuur_ut_anim_options = baganuur_ut_global::get('baganuur_ut_anim_options');

$paramsNewDefault = array(
    'animated' => 'fadeIn',
);

$params = array(
    array(
        'type' => 'baganuur_ut_select_multiple',
        'size' => 10,
        'heading' => esc_html__( 'Post category', 'baganuur' ),
        'value' => $baganuur_ut_element_options['cat']['post'],
        'std' => '',
        'param_name' => 'cats',
        'description' => esc_html__( 'Select category.', 'baganuur' ),
        'group' => 'Content Options',
        'dependency' => array(
            'element' => 'layout',
            'value' => array( 'normal', 'baganuur_style', 'baganuur_style_2', 'baganuur_style_3' ),
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Filter ?', 'baganuur' ),
        'param_name' => 'filter',
        'value' => array(
            esc_html__( 'None', 'baganuur' ) => 'none',
            esc_html__( 'Simple', 'baganuur' ) => 'simple',
            ),
        'std' => 'none',
        'group' => 'Content Options',
    ),
    array(
        'type' => 'baganuur_ut_number',
        'min' => -1,
        'heading' => esc_html__( 'Post count', 'baganuur' ),
        'param_name' => 'count',
        'value' => esc_html__( '9', 'baganuur' ),
        'admin_label' => true,
        'description' => esc_html__( 'Only integer value.', 'baganuur' ),
        'group' => 'Content Options',
        'dependency' => array(
            'element' => 'filter',
            'value' => array( 'none' ),
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Pagination ?', 'baganuur' ),
        'param_name' => 'pagination',
        'value' => array(
            esc_html__( 'None', 'baganuur' ) => 'none',
            esc_html__( 'Simple', 'baganuur' ) => 'simple',
            esc_html__( 'Infinite', 'baganuur' ) => 'infinite',
            ),
        'std' => 'simple',
        'admin_label' => true,
        'group' => 'Content Options',
        'dependency' => array(
            'element' => 'filter',
            'value' => array( 'none' ),
        ),
    ),
    array(
        'type' => 'baganuur_ut_number',
        'min' => 0,
        'heading' => esc_html__( 'Excerpt word length', 'baganuur' ),
        'param_name' => 'excerpt_count',
        'value' => esc_html__( '60', 'baganuur' ),
        'description' => esc_html__( 'Only integer value.', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Read more text', 'baganuur' ),
        'param_name' => 'more_text',
        'value' => 'ᠳᠡᠯᠭᠡᠷᠡᠩᠭᠦᠢ',
        'admin_label' => true,
        'description' => esc_html__( 'If empty, read more button hidden', 'baganuur' ),
        'group' => 'Content Options',
        'dependency' => array(
            'element' => 'layout',
            'value' => array( 'normal', 'baganuur_style', 'baganuur_style_4' ),
        ),
    ),
);

$params = array_merge(
    $params,
    $baganuur_ut_global_options,
    $baganuur_ut_anim_options
);

$params = baganuur_ut_rep_param_def( $params, $paramsNewDefault );

vc_map(array(
    'weight' => 25,
    'name' => esc_html__( 'Blog MNG', 'baganuur' ),
    'base' => 'baganuur_ut_blog',
    'class' => '',
    'icon' => get_template_directory_uri() . '/backend/assets/img/baganuur-ut-32x32.png', // Simply pass url to your icon here
    'category' => 'baganuur',
    'params' => $params,
));

class WPBakeryShortCode_baganuur_ut_blog extends WPBakeryShortCode{}
