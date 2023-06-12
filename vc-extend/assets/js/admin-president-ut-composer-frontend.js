jQuery(document).ready(function ($) {
    'use strict';
    if (
        typeof window.InlineShortcodeView_vc_row !== 'undefined' &&
        typeof window.InlineShortcodeView_vc_row.extend !== 'undefined' &&
        typeof window.InlineShortcodeView_vc_tab !== 'undefined' &&
        typeof window.InlineShortcodeView_vc_tab.extend !== 'undefined'
    ) {
        window.InlineShortcodeView_baganuur_ut_accordion =
            window.InlineShortcodeView_vc_row.extend({
                events: {
                    'click > .wpb_accordion > .vc_empty-element': 'addElement',
                },
                render: function () {
                    _.bindAll(this, 'stopSorting');
                    this.$accordion = this.$el.find('> .wpb_accordion');
                    window.InlineShortcodeView_baganuur_ut_accordion.__super__.render.call(
                        this
                    );
                    return this;
                },
                changed: function () {
                    if (this.$el.find('.vc_element[data-tag]').length == 0) {
                        this.$el
                            .addClass('vc_empty')
                            .find('> :first')
                            .addClass('vc_empty-element');
                    } else {
                        this.$el
                            .removeClass('vc_empty')
                            .find('> .vc_empty-element')
                            .removeClass('vc_empty-element');
                        this.setSorting();
                    }
                },
                buildAccordion: function (active_model) {
                    var active = false;
                    if (active_model) {
                        active = this.$accordion
                            .find(
                                '[data-model-id=' + active_model.get('id') + ']'
                            )
                            .index();
                    }
                    vc.frame_window.vc_iframe.buildAccordion(
                        this.$accordion,
                        active
                    );
                },
                setSorting: function () {
                    vc.frame_window.vc_iframe.setAccordionSorting(this);
                },
                beforeUpdate: function () {
                    this.$el.find('.wpb_accordion_heading').remove();
                    window.InlineShortcodeView_baganuur_ut_accordion.__super__.beforeUpdate.call(
                        this
                    );
                },
                stopSorting: function () {
                    this.$accordion
                        .find(
                            '> .wpb_accordion_wrapper > .vc_element[data-tag]'
                        )
                        .each(function () {
                            var model = vc.shortcodes.get(
                                $(this).data('modelId')
                            );
                            model.save(
                                { order: $(this).index() },
                                { silent: true }
                            );
                        });
                },
                addElement: function (e) {
                    e && e.preventDefault();
                    new vc.ShortcodesBuilder()
                        .create({
                            shortcode: 'baganuur_ut_accordion_tab',
                            params: { title: window.i18nLocale.section },
                            parent_id: this.model.get('id'),
                        })
                        .render();
                },
                rowsColumnsConverted: function () {
                    _.each(
                        vc.shortcodes.where({
                            parent_id: this.model.get('id'),
                        }),
                        function (model) {
                            model.view.rowsColumnsConverted &&
                                model.view.rowsColumnsConverted();
                        }
                    );
                },
            });
        window.InlineShortcodeView_baganuur_ut_accordion_tab =
            window.InlineShortcodeView_vc_tab.extend({
                events: {
                    'click > .vc_controls .vc_element .vc_control-btn-delete':
                        'destroy',
                    'click > .vc_controls .vc_element .vc_control-btn-edit':
                        'edit',
                    'click > .vc_controls .vc_element .vc_control-btn-clone':
                        'clone',
                    'click > .vc_controls .vc_element .vc_control-btn-prepend':
                        'prependElement',
                    'click > .vc_controls .vc_control-btn-append':
                        'appendElement',
                    'click > .vc_controls .vc_parent .vc_control-btn-delete':
                        'destroyParent',
                    'click > .vc_controls .vc_parent .vc_control-btn-edit':
                        'editParent',
                    'click > .vc_controls .vc_parent .vc_control-btn-clone':
                        'cloneParent',
                    'click > .vc_controls .vc_parent .vc_control-btn-prepend':
                        'addSibling',
                    'click > .wpb_accordion_section > .vc_empty-element':
                        'appendElement',
                    'click > .vc_controls .vc_control-btn-switcher':
                        'switchControls',
                    mouseenter: 'resetActive',
                    mouseleave: 'holdActive',
                },
                changed: function () {
                    if (this.$el.find('.vc_element[data-tag]').length == 0) {
                        this.$el.addClass('vc_empty');
                        this.content().addClass('vc_empty-element');
                    } else {
                        this.$el.removeClass('vc_empty');
                        this.content().removeClass('vc_empty-element');
                    }
                },
                render: function () {
                    window.InlineShortcodeView_vc_tab.__super__.render.call(
                        this
                    );
                    if (!this.content().find('.vc_element[data-tag]').length) {
                        this.content().html('');
                    }
                    this.parent_view.buildAccordion(
                        !this.model.get('from_content') &&
                            !this.model.get('default_content')
                            ? this.model
                            : false
                    );
                    return this;
                },
                rowsColumnsConverted: function () {
                    _.each(
                        vc.shortcodes.where({
                            parent_id: this.model.get('id'),
                        }),
                        function (model) {
                            model.view.rowsColumnsConverted &&
                                model.view.rowsColumnsConverted();
                        }
                    );
                },
                destroy: function (e) {
                    var parent_id = this.model.get('parent_id');
                    window.InlineShortcodeView_baganuur_ut_accordion_tab.__super__.destroy.call(
                        this,
                        e
                    );
                    if (!vc.shortcodes.where({ parent_id: parent_id }).length) {
                        vc.shortcodes.get(parent_id).destroy();
                    }
                },
            });
        window.InlineShortcodeView_baganuur_ut_toggle =
            window.InlineShortcodeView.extend({
                render: function () {
                    var model_id = this.model.get('id');
                    window.InlineShortcodeView_baganuur_ut_toggle.__super__.render.call(
                        this
                    );
                    vc.frame_window.vc_iframe.addActivity(function () {
                        this.vc_iframe.vc_toggle(model_id);
                    });
                    return this;
                },
            });
        window.InlineShortcodeView_baganuur_ut_tabs =
            window.InlineShortcodeView_vc_row.extend({
                events: {
                    'click > :first > .vc_empty-element': 'addElement',
                    'click > :first > .wpb_wrapper > .ui-tabs-nav > li':
                        'setActiveTab',
                },
                already_build: false,
                active_model_id: false,
                $tabsNav: false,
                active: 0,
                render: function () {
                    _.bindAll(this, 'stopSorting');
                    this.$tabs = this.$el.find('> .wpb_tabs');
                    window.InlineShortcodeView_baganuur_ut_tabs.__super__.render.call(
                        this
                    );
                    this.buildNav();
                    return this;
                },
                buildNav: function () {
                    var $nav = this.tabsControls();
                    this.$tabs
                        .find(
                            '> .wpb_wrapper > .vc_element[data-tag="baganuur_ut_tab"]'
                        )
                        .each(function (key) {
                            $('li:eq(' + key + ')', $nav).attr(
                                'data-m-id',
                                $(this).data('model-id')
                            );
                        });
                },
                changed: function () {
                    if (this.$el.find('.vc_element[data-tag]').length == 0) {
                        this.$el
                            .addClass('vc_empty')
                            .find('> :first > div')
                            .addClass('vc_empty-element');
                    } else {
                        this.$el
                            .removeClass('vc_empty')
                            .find('> :first > div')
                            .removeClass('vc_empty-element');
                    }
                    this.setSorting();
                },
                setActiveTab: function (e) {
                    var $tab = $(e.currentTarget);
                    this.active_model_id = $tab.data('m-id');
                },
                tabsControls: function () {
                    return this.$tabsNav
                        ? this.$tabsNav
                        : (this.$tabsNav = this.$el.find('.wpb_tabs_nav'));
                },
                buildTabs: function (active_model) {
                    if (active_model) {
                        this.active_model_id = active_model.get('id');
                        this.active = this.tabsControls()
                            .find('[data-m-id=' + this.active_model_id + ']')
                            .index();
                    }
                    if (this.active_model_id === false) {
                        var active_el = this.tabsControls().find('li:first');
                        this.active = active_el.index();
                        this.active_model_id = active_el.data('m-id');
                    }
                    if (!this.checkCount()) {
                        vc.frame_window.vc_iframe.buildTabs(
                            this.$tabs,
                            this.active
                        );
                    }
                },
                checkCount: function () {
                    return (
                        this.$tabs.find(
                            '> .wpb_wrapper > .vc_element[data-tag="baganuur_ut_tab"]'
                        ).length !=
                        this.$tabs.find(
                            '> .wpb_wrapper > .vc_element.vc_baganuur_ut_tab'
                        ).length
                    );
                },
                beforeUpdate: function () {
                    this.$tabs.find('.wpb_tabs_heading').remove();
                    vc.frame_window.vc_iframe.destroyTabs(this.$tabs);
                },
                updated: function () {
                    window.InlineShortcodeView_baganuur_ut_tabs.__super__.updated.call(
                        this
                    );
                    this.$tabs.find('.wpb_tabs_nav:first').remove();
                    this.buildNav();
                    vc.frame_window.vc_iframe.buildTabs(this.$tabs);
                    this.setSorting();
                },
                rowsColumnsConverted: function () {
                    _.each(
                        vc.shortcodes.where({
                            parent_id: this.model.get('id'),
                        }),
                        function (model) {
                            model.view.rowsColumnsConverted &&
                                model.view.rowsColumnsConverted();
                        }
                    );
                },
                addTab: function (model) {
                    if (this.updateIfExistTab(model)) {
                        return false;
                    }
                    var $control = this.buildControlHtml(model),
                        $cloned_tab;
                    if (
                        model.get('cloned') &&
                        ($cloned_tab = this.tabsControls().find(
                            '[data-m-id=' + model.get('cloned_from').id + ']'
                        )).length
                    ) {
                        if (!model.get('cloned_appended')) {
                            $control.appendTo(this.tabsControls());
                            model.set('cloned_appended', true);
                        }
                    } else {
                        $control.appendTo(this.tabsControls());
                    }
                    this.changed();
                    return true;
                },
                cloneTabAfter: function (model) {
                    this.$tabs
                        .find('> .wpb_wrapper > .wpb_tabs_nav > div')
                        .remove();
                    this.buildTabs(model);
                },
                updateIfExistTab: function (model) {
                    var $tab = this.tabsControls().find(
                        '[data-m-id=' + model.get('id') + ']'
                    );
                    if ($tab.length) {
                        $tab.attr(
                            'aria-controls',
                            'tab-' + model.getParam('tab_id')
                        )
                            .find('a')
                            .attr('href', '#tab-' + model.getParam('tab_id'))
                            .text(model.getParam('title'));
                        return true;
                    }
                    return false;
                },
                buildControlHtml: function (model) {
                    var params = model.get('params'),
                        $tab = $(
                            '<li data-m-id="' +
                                model.get('id') +
                                '"><a href="#tab-' +
                                model.getParam('tab_id') +
                                '"></a></li>'
                        );
                    $tab.data('model', model);
                    $tab.find('> a').text(model.getParam('title'));
                    return $tab;
                },
                addElement: function (e) {
                    e && e.preventDefault();
                    new vc.ShortcodesBuilder()
                        .create({
                            shortcode: 'baganuur_ut_tab',
                            params: {
                                tab_id:
                                    vc_guid() +
                                    '-' +
                                    this.tabsControls().find('li').length,
                                title: this.getDefaultTabTitle(),
                            },
                            parent_id: this.model.get('id'),
                        })
                        .render();
                },
                getDefaultTabTitle: function () {
                    return window.i18nLocale.tab;
                },
                setSorting: function () {
                    if (this.hasUserAccess()) {
                        vc.frame_window.vc_iframe.setTabsSorting(this);
                    }
                },
                stopSorting: function (event, ui) {
                    this.tabsControls()
                        .find('> li')
                        .each(function (key, value) {
                            var model = $(this).data('model');
                            model.save({ order: key }, { silent: true });
                        });
                },
                placeElement: function ($view, activity) {
                    var model = vc.shortcodes.get($view.data('modelId'));
                    if (model && model.get('place_after_id')) {
                        $view.insertAfter(
                            vc.$page.find(
                                '[data-model-id=' +
                                    model.get('place_after_id') +
                                    ']'
                            )
                        );
                        model.unset('place_after_id');
                    } else {
                        $view.insertAfter(this.tabsControls());
                    }
                    this.changed();
                },
                removeTab: function (model) {
                    if (
                        vc.shortcodes.where({ parent_id: this.model.get('id') })
                            .length == 1
                    ) {
                        return this.model.destroy();
                    }
                    var $tab = this.tabsControls().find(
                            '[data-m-id=' + model.get('id') + ']'
                        ),
                        index = $tab.index();
                    if (
                        this.tabsControls().find(
                            '[data-m-id]:eq(' + (index + 1) + ')'
                        ).length
                    ) {
                        vc.frame_window.vc_iframe.setActiveTab(
                            this.$tabs,
                            index + 1
                        );
                    } else if (
                        this.tabsControls().find(
                            '[data-m-id]:eq(' + (index - 1) + ')'
                        ).length
                    ) {
                        vc.frame_window.vc_iframe.setActiveTab(
                            this.$tabs,
                            index - 1
                        );
                    } else {
                        vc.frame_window.vc_iframe.setActiveTab(this.$tabs, 0);
                    }
                    $tab.remove();
                },
                clone: function (e) {
                    _.each(
                        vc.shortcodes.where({
                            parent_id: this.model.get('id'),
                        }),
                        function (model) {
                            model.set(
                                'active_before_cloned',
                                this.active_model_id === model.get('id')
                            );
                        },
                        this
                    );
                    window.InlineShortcodeView_baganuur_ut_tabs.__super__.clone.call(
                        this,
                        e
                    );
                },
            });
        window.InlineShortcodeView_baganuur_ut_tour =
            window.InlineShortcodeView_baganuur_ut_tabs.extend({
                render: function () {
                    _.bindAll(this, 'stopSorting');
                    this.$tabs = this.$el.find('> .wpb_tour');
                    window.InlineShortcodeView_baganuur_ut_tabs.__super__.render.call(
                        this
                    );
                    this.buildNav();
                    return this;
                },
                beforeUpdate: function () {
                    this.$tabs
                        .find('.wpb_tour_heading,.wpb_tour_next_prev_nav')
                        .remove();
                    vc.frame_window.vc_iframe.destroyTabs(this.$tabs);
                },
                updated: function () {
                    this.$tabs
                        .find('.wpb_tour_next_prev_nav')
                        .appendTo(this.$tabs);
                    window.InlineShortcodeView_baganuur_ut_tour.__super__.updated.call(
                        this
                    );
                },
            });
        window.InlineShortcodeView_baganuur_ut_tab =
            window.InlineShortcodeViewContainerWithParent.extend({
                controls_selector: '#vc_controls-template-vc_tab',
                render: function () {
                    var tab_id, active, params;
                    params = this.model.get('params');
                    window.InlineShortcodeView_baganuur_ut_tab.__super__.render.call(
                        this
                    );
                    this.$tab = this.$el.find('> :first');
                    /**
                     * @deprecated 4.4.3
                     * @see composer-atts.js vc.atts.tab_id.addShortcode
                     */
                    if (_.isEmpty(params.tab_id)) {
                        params.tab_id =
                            vc_guid() + '-' + Math.floor(Math.random() * 11);
                        this.model.save('params', params);
                        tab_id = 'tab-' + params.tab_id;
                        this.$tab.attr('id', tab_id);
                    } else {
                        tab_id = this.$tab.attr('id');
                    }
                    this.$el.attr('id', tab_id);
                    this.$tab.attr('id', tab_id + '-real');
                    if (!this.$tab.find('.vc_element[data-tag]').length) {
                        this.$tab.html('');
                    }
                    this.$el.addClass('ui-tabs-panel wpb_ui-tabs-hide');
                    this.$tab.removeClass('ui-tabs-panel wpb_ui-tabs-hide');
                    if (this.parent_view && this.parent_view.addTab) {
                        if (!this.parent_view.addTab(this.model)) {
                            this.$el.removeClass('wpb_ui-tabs-hide');
                        }
                    }
                    active = this.doSetAsActive();
                    this.parent_view.buildTabs(active);
                    return this;
                },
                doSetAsActive: function () {
                    var active_before_cloned = this.model.get(
                        'active_before_cloned'
                    );
                    if (
                        !this.model.get('from_content') &&
                        !this.model.get('default_content') &&
                        _.isUndefined(active_before_cloned)
                    ) {
                        return this.model;
                    } else if (!_.isUndefined(active_before_cloned)) {
                        this.model.unset('active_before_cloned');
                        if (active_before_cloned === true) {
                            return this.model;
                        }
                    }
                    return false;
                },
                removeView: function (model) {
                    window.InlineShortcodeView_baganuur_ut_tab.__super__.removeView.call(
                        this,
                        model
                    );
                    if (this.parent_view && this.parent_view.removeTab) {
                        this.parent_view.removeTab(model);
                    }
                },
                clone: function (e) {
                    _.isObject(e) && e.preventDefault() && e.stopPropagation();
                    vc.clone_index = vc.clone_index / 10;
                    var clone = this.model.clone(),
                        params = clone.get('params'),
                        builder = new vc.ShortcodesBuilder();
                    var newmodel = vc.CloneModel(
                        builder,
                        this.model,
                        this.model.get('parent_id')
                    );
                    var active_model = this.parent_view.active_model_id;
                    var that = this;
                    builder.render(function () {
                        if (that.parent_view.cloneTabAfter) {
                            that.parent_view.cloneTabAfter(newmodel);
                        }
                    });
                },
                rowsColumnsConverted: function () {
                    _.each(
                        vc.shortcodes.where({
                            parent_id: this.model.get('id'),
                        }),
                        function (model) {
                            model.view.rowsColumnsConverted &&
                                model.view.rowsColumnsConverted();
                        }
                    );
                },
            });
    }
});
