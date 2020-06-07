jQuery(document).ready(function($) {
    console.log('ready...');


    $(document).on('click', '[data-js="reset-form"]', function() {
        $(this).closest('form').trigger('reset');
        if ($('body').hasClass('gforms_hover')) {
            $(this).closest('form').find('.form_group--not-empty').removeClass('form_group--not-empty');
        }
    });

    if ($('body').hasClass('gforms_hover')) {
        $(document).on('focusin', '.gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), .gform_wrapper textarea', function () {
            $(this).parent().parent().addClass('form_group--focused');
        });

        $(document).on('focusout', '.gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), .gform_wrapper textarea', function () {
            if ($(this).val() != '' || $(this).attr('type') == 'url') {
                $(this).parent().parent().addClass('form_group--not-empty');
            } else {
                $(this).parent().parent().removeClass('form_group--not-empty');
            }
            $(this).parent().parent().removeClass('form_group--focused');
        });

        if ($('.gform_wrapper').length > 0) {
            $('.gform_wrapper select').parent().parent().addClass('form_group--not-empty');
            $('.gform_wrapper input[type=url], .gform_wrapper input[type=file]').parent().parent().addClass('form_group--not-empty');
            $('.gfield.type-radio, .gfield.type-checkbox, .gfield.type-list').addClass('form_group--not-empty');
        }

        $(document).bind('gform_post_render', function () {
            reinitForms();
        });
        $(document).bind('gform_page_loaded', function () {
            reinitForms();
        });

        function reinitForms() {
            if ($('.gform_wrapper').length > 0) {
                $('.gform_wrapper select').parent().parent().addClass('form_group--not-empty');
            }

            var $inputs = $('.gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), .gform_wrapper textarea');
            $inputs.each(function () {
                if ($(this).val() != '' || $(this).attr('type') == 'url') {
                    $(this).parent().parent().addClass('form_group--not-empty');
                }
            });
        }
    }
});