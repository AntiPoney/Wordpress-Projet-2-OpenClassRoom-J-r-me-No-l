var ERE_STRIPE = ERE_STRIPE || {};
(function ($) {
    'use strict';

    ERE_STRIPE = {
        init: function () {
            this.setupForm();
        },

        setupForm: function () {
            var self = this,
                $form = $('.ere-stripe-form');
            if ($form.length === 0) return;
            var formId = $form.attr('id');
            // Set formData array index of the current form ID to match the localized data passed over for form settings.
            var formData =   ere_stripe_vars[ formId ];
            // Variable to hold the Stripe configuration.
            var stripeHandler = null;
            var $submitBtn = $form.find( '.ere-stripe-button' );

            if ($submitBtn.length) {
                stripeHandler = StripeCheckout.configure( {
                    // Key param MUST be sent here instead of stripeHandler.open().
                    key: formData.key,
                    token: function( token, args ) {
                        $( '<input>' ).attr( {
                            type: 'hidden',
                            name: 'stripeToken',
                            value: token.id
                        } ).appendTo( $form );

                        $( '<input>' ).attr( {
                            type: 'hidden',
                            name: 'stripeTokenType',
                            value: token.type
                        } ).appendTo( $form );

                        if (token.email) {
                            $( '<input>' ).attr( {
                                type: 'hidden',
                                name: 'stripeEmail',
                                value: token.email
                            } ).appendTo( $form );
                        }
                        $form.submit();
                    },
                } );

                $submitBtn.on('click',function (event) {
                    event.preventDefault();
                    stripeHandler.open(formData.params);
                });
            }

            // Close Checkout on page navigation:
            window.addEventListener('popstate', function() {
                if (stripeHandler != null) {
                    stripeHandler.close();
                }
            });

        }

    };


    $(document).ready(function () {
        ERE_STRIPE.init();

        if (typeof ere_payment_vars !== "undefined") {
            var ajax_url = ere_payment_vars.ajax_url;
            var processing_text = ere_payment_vars.processing_text;
            $('#ere_payment_listing').on('click', function () {
                var payment_method = $("input[name='ere_payment_method']:checked").val();
                var payment_for = $("input[name='ere_payment_for']:checked").val();
                var property_id = $('#ere_property_id').val();

                if (payment_method == 'paypal') {
                    ere_paypal_payment_per_listing(property_id, payment_for);
                } else if (payment_method == 'stripe') {
                    $('#ere_stripe_per_listing button').trigger("click");
                } else if (payment_method == 'wire_transfer') {
                    ere_wire_transfer_per_listing(property_id,payment_for);
                }
            });
            $('#ere_upgrade_listing').on('click', function () {
                var payment_for = $("input[name='ere_payment_for']:checked").val();
                var payment_method = $("input[name='ere_payment_method']:checked").val();
                var property_id = $('#ere_property_id').val();
                if (payment_method == 'paypal') {
                    ere_paypal_payment_per_listing(property_id, payment_for);
                } else if (payment_method == 'stripe') {
                    $('#ere_stripe_upgrade_listing button').trigger("click");
                } else if (payment_method == 'wire_transfer') {
                    ere_wire_transfer_per_listing(property_id,payment_for);
                }
            });
            var ere_paypal_payment_per_listing = function (property_id, payment_for) {
                $.ajax({
                    type: 'post',
                    url: ajax_url,
                    data: {
                        'action': 'ere_paypal_payment_per_listing_ajax',
                        'property_id': property_id,
                        'payment_for': payment_for,
                        'ere_security_payment': $('#ere_security_payment').val()
                    },
                    beforeSend: function () {
                        ERE.show_loading(processing_text);
                    },
                    success: function (data) {
                        window.location.href = data;
                    }
                });
            };

            var ere_wire_transfer_per_listing = function (property_id,payment_for) {
                $.ajax({
                    type: 'POST',
                    url: ajax_url,
                    data: {
                        'action': 'ere_wire_transfer_per_listing_ajax',
                        'property_id': property_id,
                        'payment_for': payment_for,
                        'ere_security_payment': $('#ere_security_payment').val()
                    },
                    beforeSend: function () {
                        ERE.show_loading(processing_text);
                    },
                    success: function (data) {
                        window.location.href = data;
                    }
                });
            };

            $('#ere_payment_package').on('click', function (event) {
                var payment_method = $("input[name='ere_payment_method']:checked").val();
                var package_id = $("input[name='ere_package_id']").val();
                if (payment_method == 'paypal') {
                    ere_paypal_payment_per_package(package_id);
                } else if (payment_method == 'stripe') {
                    $('#ere_stripe_per_package button').trigger("click");
                } else if (payment_method == 'wire_transfer') {
                    ere_wire_transfer_per_package(package_id);
                }
            });

            var ere_paypal_payment_per_package = function (package_id) {
                $.ajax({
                    type: 'POST',
                    url: ajax_url,
                    data: {
                        'action': 'ere_paypal_payment_per_package_ajax',
                        'package_id': package_id,
                        'ere_security_payment': $('#ere_security_payment').val()
                    },
                    beforeSend: function () {
                        ERE.show_loading(processing_text);
                    },
                    success: function (data) {
                        window.location.href = data;
                    }
                });
            };

            var ere_wire_transfer_per_package = function (package_id) {
                $.ajax({
                    type: 'POST',
                    url: ajax_url,
                    data: {
                        'action': 'ere_wire_transfer_per_package_ajax',
                        'package_id': package_id,
                        'ere_security_payment': $('#ere_security_payment').val()
                    },
                    beforeSend: function () {
                        ERE.show_loading(processing_text);
                    },
                    success: function (data) {
                        window.location.href = data;
                    }
                });
            };

            $('#ere_free_package').on('click', function () {
                var package_id = $("input[name='ere_package_id']").val();
                $.ajax({
                    type: 'POST',
                    url: ajax_url,
                    data: {
                        'action': 'ere_free_package_ajax',
                        'package_id': package_id,
                        'ere_security_payment': $('#ere_security_payment').val()
                    },
                    beforeSend: function () {
                        ERE.show_loading(processing_text);
                    },
                    success: function (data) {
                        window.location.href = data;
                    }
                });
            });
        }
    });
})(jQuery);