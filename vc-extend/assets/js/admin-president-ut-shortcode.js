jQuery.noConflict();
(function () {
    'use strict';
    jQuery(document).on('click', '.baganuur-ut-color', function () {
        jQuery(this)
            .closest('.baganuur-ut-palette')
            .find('.baganuur-ut-color')
            .removeClass('active');
        jQuery(this).addClass('active');
        var color = jQuery(this).data('palette-color');
        var bgcolor = jQuery(this).css('background-color');
        jQuery(this)
            .closest('.wpb_el_type_custom_color')
            .find(
                '.baganuur-ut-color-field, .colorpicker_field, .wpb_vc_param_value'
            )
            .val(color);
        jQuery(this)
            .closest('.wpb_el_type_custom_color')
            .find('.wp-color-result, .wpb_vc_param_value')
            .css('background-color', bgcolor);
    });

    window.vc_custom_color = function () {
        var thcolorOptions = {
            hide: true,
            palettes: true,
            change: function (event, ui) {
                jQuery(this)
                    .closest('.wpb_el_type_custom_color')
                    .find('.baganuur-ut-color')
                    .removeClass('active');
                jQuery(this)
                    .closest('.wpb_el_type_custom_color')
                    .find('.wpb_vc_param_value')
                    .val(jQuery(this).wpColorPicker('color'));
            },
            clear: function (event, ui) {
                jQuery(this)
                    .closest('.wpb_el_type_custom_color')
                    .find('.custom_color_field')
                    .css('background-color', '');
                jQuery(this)
                    .closest('.wpb_el_type_custom_color')
                    .find('.custom_color_field')
                    .val('');
            },
        };
        jQuery('.baganuur-ut-color-field').wpColorPicker(thcolorOptions);
    };
})(jQuery);
