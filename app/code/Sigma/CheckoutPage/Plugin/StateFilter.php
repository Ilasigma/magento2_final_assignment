<?php
namespace Sigma\CheckoutPage\Plugin;

class StateFilter
{
    protected $disallowed = [
        'Guam',
        'Palau',
        'Northern Mariana Islands',
        'Marshall Islands',
        'American Samoa',
        'Armed Forces Africa',
        'Armed Forces Americas',
        'Armed Forces Canada',
        'Armed Forces Europe',
        'Armed Forces Middle East',
        'Armed Forces Pacific',
        
    ];



    public function afterToOptionArray(\Magento\Directory\Model\ResourceModel\Region\Collection $subject, $options)
    {
        $result = array_filter($options, function ($option) {
            if (isset($option['label']))
                return !in_array($option['label'], $this->disallowed);
            return true;
        });

        return $result;
    }
}