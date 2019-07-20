<?php

class Shopware_Controllers_Backend_SwagTestWidget extends Shopware_Controllers_Backend_ExtJs
{
    /**
     * NG: Returns the plugin configration for the backend admin
     */
    public function listAction()
    {
        //NG: calling the plugin services
        $plugin = $this->container->get('swag_test_widget.services.plugin_service');

        //NG: getting plugin configration from the service.
        $pluginConfig = $plugin->getpluginconfigration();

        //NG: setting the name to $pluginConfig to display on backend .
        //NG: There is case where $pluginConfig['redirect']  may be null also in that case also on the backend result will be NO
        if ($pluginConfig['redirect'] === true) {
            $pluginConfig['redirect'] = 'Yes';
        } else {
            $pluginConfig['redirect'] = 'No';
        }
        //NG: Sending data to view for displaying on the backend
        $this->View()->assign([
            'success' => true,
            'data'    => $pluginConfig,
        ]);
    }
}
