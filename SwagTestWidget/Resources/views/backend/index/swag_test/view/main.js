//{namespace name=backend/index/view/widgets}

Ext.define('Shopware.apps.Index.swagTestWidget.view.Main', {
    /**
     * Extending the base widget to show our widget on backe
     */
    extend: 'Shopware.apps.Index.view.widgets.Base',

    /**
     * alias of the widget
     */
    alias: 'widget.swag-test',

    /**
     * Set the south handle so the widget height can be resized.
     */
    resizable: {
        handles: 's'
    },

    /**
     * Minimum height of the widhet
     */
    minHeight: 250,

    /**
     * Maximum height of the widget
     */
    maxHeight: 600,

    /**
     * Initializes the widget.
     * Creates the grid to show plugin  basic confiratoin
     * Adds a refresh button to the header to manually refresh the grid.
     *
     * @public
     * @return void
     */
    initComponent: function() {
        var me = this;

        me.accountStore = Ext.create('Shopware.apps.Index.swagTestWidget.store.Account');

        me.items = [
            me.createWidget()
        ];

        me.tools = [{
            type: 'refresh',
            scope: me,
            handler: me.refreshView
        }];

        me.callParent(arguments);
    },

    /*
     *
     * @returns { Ext.grid.Panel }
     */
    createWidget: function() {
        var me = this;

        return Ext.create('Ext.grid.Panel', {
            border: 0,
            store: me.accountStore,
            columns: me.createColumns()
        });
    },

    /**
     * Helper method which creates the columns for the
     * grid panel in this widget.
     *
     * @return { Array } - generated columns
     */
    createColumns: function() {
        return [{
            dataIndex: 'widgetTile',
            header: 'Widget Name',
            flex: 1
        }, {
            dataIndex: 'redirect',
            header: 'Redirct to checkout',
            flex: 1
        }]
    },

    /**
     * Refresh the account store if its available
     */
    refreshView: function() {
        var me = this;

        if(!me.accountStore) {
            return;
        }

        me.accountStore.reload();
    }
});