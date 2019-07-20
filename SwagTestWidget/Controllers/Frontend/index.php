<?php

class Shopware_Controllers_Frontend_Index extends \Enlight_Controller_Action
{

    /**
     * NG: Returns random product to display on the main page of the shop
     */
    public function indexAction()
    {
        //NG: calling the plugin services
        $pluginService = $this->container->get('swag_test_widget.services.plugin_service');

        //NG: $pluginService->getProduct() returns the array of article data from service and assign to view for display
        //NG: $pluginService->getpluginconfigration() returns  array for plugin configration and  assign to view for display
        $this->View()->assign([
            'products'            => $pluginService->getProduct(),
            'pluginConfiguration' => $pluginService->getpluginconfigration(),
        ]);


    }
}