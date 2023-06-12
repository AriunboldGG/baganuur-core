<?php

$baganuur_ut_global_options = baganuur_ut_global::get('baganuur_ut_global_options');
$baganuur_ut_anim_options = baganuur_ut_global::get('baganuur_ut_anim_options');

$params = array(
    array(
        'type' => 'textarea_raw_html',
        'heading' => esc_html__( 'Style Option', 'baganuur' ),
        'param_name' => 'json',
        'value' => '',
        'description' => wp_kses(__( '<a href="https://snazzymaps.com/explore" target="_blank" title="Snazzy Maps">Snazzy Maps</a>. Click the generated Popular Maps or you can create your own and insert it your or others ARRAYS.', 'baganuur' ), array( 'a' => array( 'href' => array(), 'title' => array(), 'target' => array() ) ) ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Mouse Wheel ?', 'baganuur' ),
        'param_name' => 'mouse_wheel',
        'value' => array( esc_html__( 'Yes', 'baganuur' ) => 'true' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Style Name', 'baganuur' ),
        'param_name' => 'style_name',
        'value' => esc_html__( 'Styled', 'baganuur' ),
        'admin_label' => true,
        'group' => 'Content Options',
    ),
    array(
        'type' => 'baganuur_ut_number',
        'min' => 0,
        'heading' => esc_html__( 'Width', 'baganuur' ),
        'param_name' => 'width',
        'value' => esc_html__( 350, 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Latitude', 'baganuur' ),
        'param_name' => 'lat',
        'value' => esc_html__( '40.0712145', 'baganuur' ),
        'description' => esc_html__( 'Latitude. Note: Only Digit (max:90, min:-90)', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Longitude', 'baganuur' ),
        'param_name' => 'lng',
        'value' => esc_html__( '-83.4495123', 'baganuur' ),
        'description' => esc_html__( 'Longitude. Note: Only Digit (max:180, min:-180)', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'baganuur_ut_number',
        'min' => 0,
        'max' => 21,
        'heading' => esc_html__( 'Zoom', 'baganuur' ),
        'param_name' => 'zoom',
        'value' => esc_html__( '5', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'param_group',
        'heading' => esc_html__( 'Markers', 'baganuur' ),
        'param_name' => 'markers',
        'group' => 'Map Markers',
        'value' => urlencode( json_encode( array(
                array(
                    'title' => 'Marker 1',
                    'lat' => '41.5538491',
                    'lng' => '-82.918092',
                    'icon' => '',
                    'icon_width' => 17,
                    'icon_height' => 25,
                    'content' => 'Content 1',
                ),
                array(
                    'title' => 'Marker 2',
                    'lat' => '40.5538493',
                    'lng' => '-81.918094',
                    'icon' => '',
                    'icon_width' => 17,
                    'icon_height' => 25,
                    'content' => 'Content 2',
                )
        ) ) ),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Marker Title', 'baganuur' ),
                'param_name' => 'title',
                'value' => esc_html__( 'UnionTheme is BEST, Cheers!', 'baganuur' ),
                'admin_label' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Latitude', 'baganuur' ),
                'param_name' => 'lat',
                'value' => esc_html__( '40.5538491', 'baganuur' ),
                'description' => 'Latitude. Note: Only Digit (max:90, min:-90)',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Longitude', 'baganuur' ),
                'param_name' => 'lng',
                'value' => esc_html__( '-81.918092', 'baganuur' ),
                'description' => 'Longitude. Note: Only Digit (max:180, min:-180)',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Choose Marker Icon Else Default Icon', 'baganuur' ),
                'param_name' => 'icon',
                'value' => ''
            ),
            array(
                'type' => 'baganuur_ut_number',
                'min' => 0,
                'heading' => esc_html__( 'Icon Width', 'baganuur' ),
                'param_name' => 'icon_width',
                'value' => esc_html__( 105, 'baganuur' ),
            ),
            array(
                'type' => 'baganuur_ut_number',
                'min' => 0,
                'heading' => esc_html__( 'Icon Height', 'baganuur' ),
                'param_name' => 'icon_height',
                'value' => esc_html__( 43, 'baganuur' ),
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Content', 'baganuur' ),
                'param_name' => 'content',
            ),
        ),
    ),
);

$params = array_merge(
    $params,
    $baganuur_ut_global_options,
    $baganuur_ut_anim_options
);

vc_map(array(
    'weight' => 14,
    'name' => esc_html__( 'Map', 'baganuur' ),
    'base' => 'baganuur_ut_map',
    'icon' => get_template_directory_uri() . '/backend/assets/img/baganuur-ut-32x32.png', // Simply pass url to your icon here
    'category' => 'baganuur',
    'params' => $params,
));

class WPBakeryShortCode_baganuur_ut_map extends WPBakeryShortCode{}
