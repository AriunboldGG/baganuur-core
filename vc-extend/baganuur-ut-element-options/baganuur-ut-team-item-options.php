<?php

$baganuur_ut_global_options = baganuur_ut_global::get('baganuur_ut_global_options');

$params = array(
    array(
        'type' => 'attach_image',
        'heading' => esc_html__( 'Team Member Image', 'baganuur' ),
        'param_name' => 'mem_image',
        'group' => 'Content Options',
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Full width?', 'baganuur' ),
        'param_name' => 'full_width',
        'value' => array( esc_html__( 'Yes', 'baganuur' ) => 'true' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Member Name', 'baganuur' ),
        'param_name' => 'title',
        'value' => esc_html__( 'ᠨ ∙ ᠠᠯᠲᠠᠨᠬᠤᠶᠠᠭ', 'baganuur' ),
        'admin_label' => true,
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Member Position', 'baganuur' ),
        'param_name' => 'mem_position',
        'value' => esc_html__( 'ᠤᠯᠤᠰ ᠲᠥᠷᠥ ᠶᠢᠨ ᠪᠣᠳᠣᠯᠭ᠎ᠠ ᠶᠢᠨ ᠵᠦᠪᠳᠡᠬᠦ', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'textarea_html',
        'heading' => esc_html__( 'Content', 'baganuur' ),
        'param_name' => 'content',
        'value' => esc_html__( 'Sed dui cursus, nullam consectetuer dolor. Condimentum eu, maecenas en tellus, volutpat congue amet duis.', 'baganuur' ),
        'group' => 'Content Options',
    ),
    array(
        'type' => 'exploded_textarea',
        'heading' => esc_html__( 'Social Links', 'baganuur' ),
        'param_name' => 'social_links',
        'description' => 'Enter social links. Example:facebook.com/uniontheme. NOTE: Divide value sets with linebreak "Enter"',
        'value' => 'print,facebook.com,twitter.com',
        'group' => 'Content Options',
    ),
);

$params = array_merge(
    $params,
    $baganuur_ut_global_options
);

vc_map(array(
    'name' => esc_html__( 'Team Item', 'baganuur' ),
    'base' => 'baganuur_ut_team_item',
    'content_element' => true,
    'as_child' => array( 'only' => 'baganuur_ut_team' ),
    'icon' => get_template_directory_uri() . '/backend/assets/img/baganuur-ut-32x32.png', // Simply pass url to your icon here
    'params' => $params,
));

class WPBakeryShortCode_baganuur_ut_team_item extends WPBakeryShortCode{}
