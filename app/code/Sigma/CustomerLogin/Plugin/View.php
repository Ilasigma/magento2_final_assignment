<?php

namespace Sigma\CustomerLogin\Plugin;

use Magento\Customer\Api\Data\CustomerInterface;
class View
{

     public function afterGetCustomerName(\Magento\Customer\Helper\View $subject, $result,CustomerInterface $customerData){
        /* $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test1.log');
         $logger = new \Zend\Log\Logger();
         $logger->addWriter($writer);
         $logger->info('Your text message');*/

         return $result.' Customer ';
     }
}