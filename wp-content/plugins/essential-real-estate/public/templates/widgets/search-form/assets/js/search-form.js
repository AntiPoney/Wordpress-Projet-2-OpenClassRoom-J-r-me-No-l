jQuery(document).ready(function ($) {
    "use strict";
    $(window).on('load',function () {
        $('form.search-properties-form').get(0).reset(); //clear form data on page load
    });

    /**
     * Slider Filter Jquery UI
     */
    $('.ere_widget_search_form').each(function () {
        var ere_set_slider_filter = function (elm) {
            var $container = elm;
            var min = $container.attr('data-min-default');
            var max = $container.attr('data-max-default');
            var $sidebar_filter = $container.find('.sidebar-filter'),
            min_text = '',
            max_text = '';

            var x, y;
            min = parseInt(min);
            max = parseInt(max);
            $sidebar_filter.slider({
                min: min,
                max: max,
                range: true,
                values: [min, max]
            });

            $sidebar_filter.slider({
                slide: function (event, ui) {
                    x = ui.values[0];
                    y = ui.values[1];
                    $container.attr('data-min', x);
                    $container.attr('data-max', y);
                    $container.find('input.min-input-request').attr('value', x);
                    $container.find('input.max-input-request').attr('value', y);
                    if ($container.find('span').hasClass("not-format")) {
                        min_text =  x;
                        max_text =  y;
                    } else {
                        min_text =  ERE.number_format(x);
                        max_text = ERE.number_format(y);
                    }

                    if ($container.hasClass('ere-sliderbar-price')) {
                        if (ere_main_vars.currency_position === 'before') {
                            min_text =  ere_main_vars.currency + min_text;
                            max_text = ere_main_vars.currency + max_text;
                        } else {
                            min_text = min_text +  ere_main_vars.currency;
                            max_text = max_text + ere_main_vars.currency;
                        }
                    }

                    $container.find('span.min-value').html(min_text);
                    $container.find('span.max-value').html(max_text);
                },
                stop: function (event, ui) {
                    if ($("#ere_search_map_result").length > 0) {
                        var current_form = $(this).parents('form');
                        var form_widget = $(this).parents('form');
                        ere_search_on_change(current_form, form_widget);
                    }
                }
            });
        };
        $(".ere-sliderbar-filter.ere-sliderbar-price").on('register.again', function () {
            $(".ere-sliderbar-filter.ere-sliderbar-price").each(function () {
                var slider_filter = $(this);
                ere_set_slider_filter(slider_filter);
            });
            $(".ere-sliderbar-filter.ere-sliderbar-area").each(function () {
                var slider_filter = $(this);
                ere_set_slider_filter(slider_filter);
            });
        });
        var ere_register_slider_filter = function () {
            $(".ere-sliderbar-filter").each(function () {
                var slider_filter = $(this);
                ere_set_slider_filter(slider_filter);
            });
        };
        ere_register_slider_filter();
    })
}); // end document ready