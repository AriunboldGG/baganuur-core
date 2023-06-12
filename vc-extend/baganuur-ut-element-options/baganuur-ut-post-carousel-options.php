<?php

$baganuur_ut_element_options = baganuur_ut_global::get('baganuur_ut_element_options');
$baganuur_ut_global_options = baganuur_ut_global::get('baganuur_ut_global_options');
$baganuur_ut_anim_options = baganuur_ut_global::get('baganuur_ut_anim_options');

$params = array(
    array(
        'type' => 'baganuur_ut_select_multiple',
        'size' => 10,
        'heading' => esc_html__( 'Post category', 'baganuur' ),
        'value' => $baganuur_ut_element_options['cat']['post'],
        'std' => '',
        'admin_label' => true,
        'param_name' => 'cats',
        'description' => esc_html__( 'Select post category.', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Auto Play ?', 'baganuur' ),
        'param_name' => 'auto_play',
        'value' => array( esc_html__( 'Yes', 'baganuur' ) => 'true' ),
        'std' => 'false',
        'group' => 'Content Options',
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
        'type' => 'baganuur_ut_number',
        'min' => -1,
        'heading' => esc_html__( 'Post count', 'baganuur' ),
        'param_name' => 'count',
        'value' => esc_html__( '6', 'baganuur' ),
        'admin_label' => true,
        'description' => esc_html__( 'Only integer value.', 'baganuur' ),
        'group' => 'Content Options',
    )
);

$params = array_merge(
    $params,
    $baganuur_ut_global_options,
    $baganuur_ut_anim_options
);

vc_map(array(
    'weight' => 10,
    'name' => esc_html__( 'Post carousel', 'baganuur' ),
    'base' => 'baganuur_ut_post_carousel',
    'class' => '',
    'icon' => get_template_directory_uri() . '/backend/assets/img/baganuur-ut-32x32.png', // Simply pass url to your icon here
    'category' => 'baganuur',
    'params' => $params,
));

class WPBakeryShortCode_baganuur_ut_post_carousel extends WPBakeryShortCode{}
