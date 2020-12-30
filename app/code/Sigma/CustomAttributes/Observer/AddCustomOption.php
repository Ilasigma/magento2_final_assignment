<?php

namespace Sigma\CustomAttributes\Observer;

use Magento\Framework\Event\ObserverInterface;

class AddCustomOption implements ObserverInterface
{

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getProduct();

/*        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/product.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Weight => '.$product->getWeight());
        $logger->info('Price => '.$product->getPrice());*/

        $price = $product->getPrice();
        $weight = $product->getWeight();
        if (empty ($weight)){
            $weight=1;}
        $dynamicPrice = $price * $weight;
        $product->setData('dynamic_price_value', $dynamicPrice);
    }
}
