<?php
namespace Sigma\Crud\Model\Source;

use Magento\Framework\Option\ArrayInterface;
class Status implements ArrayInterface
{
    /**
     * Retrieve options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => 'Enable'],
            ['value' => 0, 'label' => 'Disable']
        ];
    }

}