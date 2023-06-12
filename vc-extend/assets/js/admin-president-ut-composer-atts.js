jQuery(document).ready(function ($) {
    'use strict';
    if (typeof vc.atts !== 'undefined') {
        vc.atts.baganuur_ut_select_multiple = {
            parse: function (param) {
                var $val = $(
                    '[name=' + param.param_name + ']',
                    this.content()
                ).val();
                return $val ? $val.join(',') : '';
            },
        };
    }
});
