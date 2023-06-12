<?php

$baganuur_ut_global_options = baganuur_ut_global::get('baganuur_ut_global_options');
$baganuur_ut_anim_options = baganuur_ut_global::get('baganuur_ut_anim_options');

$params = array(
);

$params = array_merge(
    $params,
    $baganuur_ut_global_options,
    $baganuur_ut_anim_options
);

vc_map(array(
    'weight' => 5,
    'name' => esc_html__( 'Team', 'baganuur' ),
    'base' => 'baganuur_ut_team',
    'as_parent' => array( 'only' => 'baganuur_ut_team_item' ),
    'content_element' => true,
    'show_settings_on_create' => false,
    'icon' => get_template_directory_uri() . '/backend/assets/img/baganuur-ut-32x32.png', // Simply pass url to your icon here
    'category' => 'baganuur',
    'params' => $params,
    'default_content' => '[baganuur_ut_team_item][/baganuur_ut_team_item][baganuur_ut_team_item][/baganuur_ut_team_item][baganuur_ut_team_item][/baganuur_ut_team_item][baganuur_ut_team_item][/baganuur_ut_team_item]',
    'js_view' => 'VcColumnView'
));
class WPBakeryShortCode_baganuur_ut_team extends WPBakeryShortCodesContainer{}
