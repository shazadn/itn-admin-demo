(function ($, app) {

    "use strict";

    app.functions = app.functions || {};

    var fn = app.functions;

    fn.ajaxSubmitForm = {
        onDomReady: true,
        _config: {
            formSelector: 'form.ajax-submit',
            btnSelector: 'button.submit-form',
            loadingSelector: '.icon-loading',
            inputGroupSelector: '.form-group',
            validationSelector: '.validation-error',
            alertSelector: '.alert',
            errorClass: 'error',
            hiddenClass: 'hidden'
        },
        _setConfig: function (config) {
            if (typeof config !== "undefined") {
                $.extend(this._config, config);
            }
        },
        _setCurrentSelectors: function (btn) {
            var obj = this;
            obj._config._btn = btn;
            obj._config._form = btn.parents(obj._config.formSelector);
            obj._config._loader = obj._config._form.find(obj._config.loadingSelector);
        },
        _submit: function () {
            var obj = this,
                $form = obj._config._form,
                $btn = obj._config._btn,
                $loader = obj._config._loader,
                formData = {};
            $btn.prop('disabled', true);
            $loader.removeClass(obj._config.hiddenClass);
            $.map($form.serializeArray(), function (field) {
                formData[field['name']] = field['value'];
            });
            app.http.post($form.attr('action'), formData)
                .then((success) => {
                    obj._handleSuccess(success);
                }, (error) => {
                    obj._handleError(error);
                });
        },
        _handleSuccess: function (response) {
            var obj = this,
                $form = obj._config._form,
                $btn = obj._config._btn,
                $loader = obj._config._loader,
                $alertContainer = $(obj._config.alertSelector);
            $btn.prop('disabled', false);
            $loader.addClass(obj._config.hiddenClass);
            obj._clearValidationErrors();
            if ($form.data('submit') === true) {
                $form.submit();
            } else {
                if ($form.data('reset') === true) {
                    $form[0].reset();
                }

                $alertContainer.html(response.message || 'Form submitted successfully.').removeClass(obj._config.hiddenClass);
            }
        },
        _handleError: function (error) {
            var obj = this,
                $btn = obj._config._btn,
                $loader = obj._config._loader;
            $btn.prop('disabled', false);
            $loader.addClass(obj._config.hiddenClass);
            if (error.status === 422) {
                obj._handleValidationError(error.data.errors);
            }
        },
        _handleValidationError: function (errors) {
            var obj = this,
                $form = obj._config._form;
            obj._clearValidationErrors();
            for (var index in errors) {
                var $field = $form.find('.field-' + index),
                    errorArray = errors[index],
                    errorText = null;
                for (var i in errorArray) {
                    errorText = (errorText === null) ? errorArray[i] : errorText + "<br />" + errorArray[i];
                }
                obj._addValidationError($field, errorText);
            }
        },
        _clearValidationErrors: function () {
            var obj = this,
                $form = obj._config._form;
            $form.find(obj._config.inputGroupSelector).removeClass(obj._config.errorClass).find(obj._config.validationSelector).empty().addClass(obj._config.hiddenClass);
        },
        _addValidationError: function (field, errorText) {
            var obj = this;
            field.addClass(obj._config.errorClass).find(obj._config.validationSelector).html(errorText).removeClass(obj._config.hiddenClass);
        },
        init: function (params) {
            var obj = this;
            obj._setConfig(params);
            $(obj._config.formSelector).each(function () {
                var $form = $(this),
                    $btn = $form.find(obj._config.btnSelector),
                    $input = $form.find('input');
                $input.bind('keypress', function (event) {
                    if (event.which === 13) {
                        event.preventDefault();
                        $btn.click();
                    }
                });
                $btn.click(function () {
                    obj._setCurrentSelectors($(this));
                    obj._submit();
                });
            });
        }
    };

})(jQuery, app);