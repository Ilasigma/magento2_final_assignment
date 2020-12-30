<?php
/**
 * Copyright © Experius B.V. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sigma\CustomerAddress\Plugin\Magento\Quote\Model;

use Magento\Quote\Api\Data\AddressInterface;

class BillingAddressManagement
{
    /**
     * @var \Sigma\CustomerAddress\Helper\Data
     */
    protected $helper;

    /**
     * BillingAddressManagement constructor.
     *
     * @param \Sigma\CustomerAddress\\Helper\Data $helper
     */
    public function __construct(
        \Sigma\CustomerAddress\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Quote\Model\BillingAddressManagement $subject
     * @param $cartId
     * @param AddressInterface $address
     * @param false $useForShipping
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeAssign(
        \Magento\Quote\Model\BillingAddressManagement $subject,
        $cartId,
        AddressInterface $address,
        $useForShipping = false
    ) {
        $extAttributes = $address->getExtensionAttributes();
        if (!empty($extAttributes)) {
            $this->helper->transportFieldsFromExtensionAttributesToObject(
                $extAttributes,
                $address,
                'extra_checkout_billing_address_fields'
            );
        }
    }
}
