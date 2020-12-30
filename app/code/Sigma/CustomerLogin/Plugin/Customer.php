<?php
/**
 * Created by PhpStorm.
 * User: ilavatimakwana
 * Date: 29/12/20
 * Time: 9:18 AM
 */

namespace Sigma\CustomerLogin\Plugin;

class Customer
{
    public function afterGetSectionData(\Magento\Customer\CustomerData\Customer $subject, $result)
    {
/*        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test2.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('2423423');
        $logger->info(($result));*/

        $result['fullname'] = $result['fullname']." Customer";

//        $logger->info(($result['fullname']));

        return $result;

    }
}