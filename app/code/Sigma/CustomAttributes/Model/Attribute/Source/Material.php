<?php
namespace Sigma\CustomAttributes\Model\Attribute\Source;

class Material extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Cotton'), 'value' => '1001'],
                ['label' => __('Leather'), 'value' => '1002'],
                ['label' => __('Silk'), 'value' => '1003'],
                ['label' => __('Denim'), 'value' => '1004'],
                ['label' => __('Fur'), 'value' => '1005'],
                ['label' => __('Wool'), 'value' => '1006'],
            ];
        }
        return $this->_options;
    }
}
