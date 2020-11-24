/**
 * Theme Customizer custom scripts
 * Control of show/hide events for Customizer
 */
(function($) {
   //For Color Scheme
    $("#customize-control-catchadaptive_theme_options-color_scheme").on( "change", function() {
        var value = $('#customize-control-catchadaptive_theme_options-color_scheme input:checked').val();
        if ( 'dark' == value ){
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#bebebe');

            $('#customize-control-background_color .color-picker-hex').iris('color', '#202020');
        } else {
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#dddddd');

            $('#customize-control-background_color .color-picker-hex').iris('color', '#ffffff');
        }
    });
})(jQuery);
