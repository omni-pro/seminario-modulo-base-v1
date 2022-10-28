define([
    'jquery',
    'ko',
    'underscore',
    'uiComponent',
    'mage/url',
    'mage/storage',
    'mage/translate',
    'Magento_Ui/js/model/messageList',
    'mage/loader'
], function ($, ko, _, Component, url, storage, $t, messageList) {
    'use strict';

    const PATH_SERVICE_SYNC = 'omnipro/seminar/processsync';
    const PATH_SERVICE_ASYNC = 'omnipro/seminar/processasync';

    return Component.extend({

        defaults: {
            template: 'Omnipro_Base/operations',
            text: ''
        },

        /**
         * @inheritdoc
         */
        initObservable: function () {
            this._super();
            this.observe('text');
            return this;
        },

        /**
         * Process text sync mode
         */
        processSync: function () {
            if (!_.isEmpty(this.text())) {
                $('body').trigger('processStart');

                var data = {
                    text: this.text()
                };

                storage
                    .post(
                        url.build(PATH_SERVICE_SYNC),
                        JSON.stringify(data),
                        true
                    )
                    .done(function () {
                        $('body').trigger('processStop');
                        messageList.addSuccessMessage({ message: $t('Text processed') });
                    })
                    .fail(function () {
                        $('body').trigger('processStop');
                        messageList.addErrorMessage({ message: $t('An error ocurred') });
                    });
            }
        },

        /**
         * Process text async mode
         */
        processAsync: function () {
            if (!_.isEmpty(this.text())) {
                $('body').trigger('processStart');

                var data = {
                    text: this.text()
                };

                storage
                    .post(
                        url.build(PATH_SERVICE_ASYNC),
                        JSON.stringify(data),
                        true
                    )
                    .done(function () {
                        $('body').trigger('processStop');
                        messageList.addSuccessMessage({ message: $t('Text will be processed') });
                    })
                    .fail(function () {
                        $('body').trigger('processStop');
                        messageList.addSuccessMessage({ message: $t('An error ocurred') });
                    });
            }
        }

    })

});