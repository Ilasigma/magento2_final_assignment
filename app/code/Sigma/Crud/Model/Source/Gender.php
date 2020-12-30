<?php
namespace Sigma\Crud\Model\Source;

use Magento\Framework\Option\ArrayInterface;
class Gender implements ArrayInterface
{
    /**
     * Retrieve options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'Male', 'label' => 'Male'],
            ['value' => 'Female', 'label' => 'Female']
        ];
    }

}