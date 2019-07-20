<?php

namespace SwagTestWidget;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Models\Widget\Widget;

/**
 * Class SwagTestWidget
 * @package SwagTestWidget
 */
class SwagTestWidget extends Plugin
{

    /**
     * @param InstallContext $context
     * Install the plugin
     */
    public function install(InstallContext $context)
    {
        $plugin = $context->getPlugin();
        $widget = new Widget();

        $widget->setName('swag-test');
        $widget->setLabel('Task');
        $widget->setPlugin($plugin);
        $plugin->getWidgets()->add($widget);

        parent::install($context);
    }

    /**
     * @param UninstallContext $context
     * uninstall the plugin
     */
    public function uninstall(UninstallContext $context)
    {
        $plugin = $context->getPlugin();
        $em = $this->container->get('models');
        $widget = $plugin->getWidgets()->first();

        $em->remove($widget);
        $em->flush();

        parent::uninstall($context);
    }


    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_SwagTestWidget' => 'onGetBackendControllerPath',
            'Enlight_Controller_Action_PostDispatch_Backend_Index'                => 'onPostDispatchBackendIndex',
            'Enlight_Controller_Action_PreDispatch_Frontend_Index'                => 'onPreDispatch',
        ];
    }

    /**
     * @return string
     */
    public function onGetBackendControllerPath()
    {
        return $this->getPath() . '/Controllers/Backend/SwagTestWidget.php';
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     * //Ng: This function load the frontend views
     */
    public function onPreDispatch(\Enlight_Event_EventArgs $args)
    {

        $controller = $args->getSubject();
        $controller->View()->addTemplateDir(__DIR__.'/Resources/views');

    }


    /**
     * @param \Enlight_Controller_ActionEventArgs $args
     * NG: Redict request to the backend of the plugin
     */
    public function onPostDispatchBackendIndex(\Enlight_Controller_ActionEventArgs $args)
    {
        $request = $args->getRequest();
        $view = $args->getSubject()->View();

        $view->addTemplateDir($this->getPath() . '/Resources/views');

        // if the controller action name equals "index" we have to extend the backend article application
        if ($request->getActionName() === 'index') {
            $view->extendsTemplate('backend/index/swag_test/app.js');
        }
    }
}
