<?php

namespace SwagTestWidget\Services;

use Shopware\Components\Plugin\CachedConfigReader;

/**
 * Class PluginService
 * @package SwagTestWidget\Services
 */
class PluginService
{

    /**
     * @var CachedConfigReader
     */
    private $pluginConfigReader;


    /**
     * PluginService constructor.
     * @param CachedConfigReader $plugin
     */
    public function __construct(CachedConfigReader $plugin)
    {
        $this->pluginConfigReader = $plugin;
    }

    /**
     * @return array
     */
    public function getProduct()
    {
        //NG: Getting 4 article from database where article is active and added recently
        $products = Shopware()
            ->Models()
            ->getRepository('Shopware\Models\Article\Article')
            ->findBy(['active' => true, 'keywords' => ''], ['added' => 'DESC'], 4);


        $productDetails = [];
        foreach ($products as $product) {
            //NG: Getting  article details which returns the all need information to display on frontend
            $productDetails[] = Shopware()->Modules()->Articles()->sGetArticleById($product->getId());

        }

        return $productDetails;

    }

    /**
     * @return array|mixed
     */
    public function getpluginconfigration()
    {

        //NG: returns the plugin configration
        return $this->pluginConfigReader->getByPluginName('SwagTestWidget');
    }

}