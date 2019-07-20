

Ext.define('Shopware.apps.Index.swagTestWidget.store.Account', {
    /**
     * Extends the default Ext Store
     * @string
     */
    extend: 'Shopware.store.Listing',

    model: 'Shopware.apps.Index.swagTestWidget.model.Account',

    remoteSort: true,

    autoLoad: true,

    /**
    * This function is used to override the { @link #displayConfig } object of the statics() object.
    *
    * @returns { Object }
    */
    configure: function() {
        return {
            controller: 'swagTestWidget'
        }
    }
});