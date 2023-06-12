<?php
/*
  Get/Set global variables

 */

if ( class_exists('baganuur_ut_global')) {
    return ;
}


class baganuur_ut_global {

    public static function get( $name = '' ) {
        if ( empty( $name ) ) {
            return null;
        }

        switch( $name ) {
            case 'baganuur_ut_anim_options':
                global $baganuur_ut_anim_options;
                return $baganuur_ut_anim_options;
            case 'baganuur_ut_element_options':
                global $baganuur_ut_element_options;
                return $baganuur_ut_element_options;
            case 'baganuur_ut_global_options':
                global $baganuur_ut_global_options;
                return $baganuur_ut_global_options;
            case 'baganuur_ut_vc_padding_options':
                global $baganuur_ut_vc_padding_options;
                return $baganuur_ut_vc_padding_options;
            case 'baganuur_ut_get_options':
                if ( class_exists( "baganuur_ut_config" ) ) {
                    global $baganuur_ut_get_options;
                    return $baganuur_ut_get_options;
                }
            default:
                return null;
        }
    }

    public static function set( $name = '', $new_val = '' ) {

        if ( empty( $name ) ) {
            return null;
        }

        if ( empty( $new_val ) ) {
            return null;
        }
        
        switch( $name ) {
            case 'baganuur_ut_anim_options':
                global $baganuur_ut_anim_options;
                $baganuur_ut_anim_options = $new_val;
                break;
            case 'baganuur_ut_element_options':
                global $baganuur_ut_element_options;
                $baganuur_ut_element_options = $new_val;
                break;
            case 'baganuur_ut_global_options':
                global $baganuur_ut_global_options;
                $baganuur_ut_global_options = $new_val;
                break;
            case 'baganuur_ut_vc_padding_options':
                global $baganuur_ut_vc_padding_options;
                $baganuur_ut_vc_padding_options = $new_val;
                break;
        }
    }
}
