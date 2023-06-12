<?php

/*-----------------------------------------------------------------------------------*/
/*	Add custom color (auto accent color!!) field param
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'custom_color', 'custom_color_settings_field', plugin_dir_url(__FILE__) . 'assets/js/admin-baganuur-ut-shortcode.js' );
function custom_color_settings_field( $settings, $value ) {
	$output  = '<script type="text/javascript">vc_custom_color();</script>';
	$output .= '<div class="custom_color_block">';
        $color = $value;

	if ( class_exists( "baganuur_ut_config" ) ) {
            global $baganuur_ut_get_options;

            $color_1_active = null; /* Primary Color */
            $color_2_active = null; /* Primary Palette below. */
            $color_3_active = null;
            $color_4_active = null;
            $color_5_active = null;
            $color_6_active = null;

            $primary_color = $baganuur_ut_get_options[ baganuur_UT_T_OPTIONS . 'primary_color'];
            $palette_color_1 = $baganuur_ut_get_options[ baganuur_UT_T_OPTIONS . 'palette_color_1'];
            $palette_color_2 = $baganuur_ut_get_options[ baganuur_UT_T_OPTIONS . 'palette_color_2'];
            $palette_color_3 = $baganuur_ut_get_options[ baganuur_UT_T_OPTIONS . 'palette_color_3'];
            $palette_color_4 = $baganuur_ut_get_options[ baganuur_UT_T_OPTIONS . 'palette_color_4'];
            $palette_color_5 = $baganuur_ut_get_options[ baganuur_UT_T_OPTIONS . 'palette_color_5'];

            switch( $value ) {
                case 'primary_color':
                    $color = $primary_color;
                    $color_1_active = ' active';
                    break;
                case 'palette_color_1':
                    $color = $palette_color_1;
                    $color_2_active = ' active';
                    break;
                case 'palette_color_2':
                    $color = $palette_color_2;
                    $color_3_active = ' active';
                    break;
                case 'palette_color_3':
                    $color = $palette_color_3;
                    $color_4_active = ' active';
                    break;
                case 'palette_color_4':
                    $color = $palette_color_4;
                    $color_5_active = ' active';
                    break;
                case 'palette_color_5':
                    $color = $palette_color_5;
                    $color_6_active = ' active';
                    break;
            }
	}

	$output .= '<input type="text" value="' . esc_attr($color) . '" class="baganuur-ut-color-field baganuur-ut-input"/>';
	$output .= '<input type="hidden" disabled="disabled" data-color="' . esc_attr($color) . '" name="' . esc_attr($settings['param_name']) . '" value="' . esc_attr($value) . '" class="wpb_vc_param_value wpb-textinput ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '_field"/>';
	if ( class_exists( "baganuur_ut_config" ) ) {
            $output .= '<div class="baganuur-ut-palette"><label>Or palette colors</label>';
            $output .= '<div class="primary baganuur-ut-color ' . $color_1_active . '" data-palette-color="primary_color" style="background:'. $primary_color .'"></div>';
            $output .= '<div class="baganuur-ut-color ' . $color_2_active . '" data-palette-color="palette_color_1" style="background:'. $palette_color_1 .'"></div>';
            $output .= '<div class="baganuur-ut-color ' . $color_3_active . '" data-palette-color="palette_color_2" style="background:'. $palette_color_2 .'"></div>';
            $output .= '<div class="baganuur-ut-color ' . $color_4_active . '" data-palette-color="palette_color_3" style="background:'. $palette_color_3 .'"></div>';
            $output .= '<div class="baganuur-ut-color ' . $color_5_active . '" data-palette-color="palette_color_4" style="background:'. $palette_color_4 .'"></div>';
            $output .= '<div class="baganuur-ut-color ' . $color_6_active . '" data-palette-color="palette_color_5" style="background:'. $palette_color_5 .'"></div></div>';
	}
	$output .= '</div>';
	return $output;
}