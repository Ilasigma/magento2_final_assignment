<?php

namespace Sigma\CustomAttributes\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Framework\Stdlib\ArrayManager;

class Attributes extends AbstractModifier
{

    private $arrayManager;

    /**
     * @param ArrayManager $arrayManager
     */
    public function __construct(
        ArrayManager $arrayManager
    ) {
        $this->arrayManager = $arrayManager;
    }

    /**
     * modifyData
     *
     * @param array $data
     * @return array
     */
    public function modifyData(array $data)
    {
        return $data;
    }

    /**
     * modifyMeta
     *
     * @param array $data
     * @return array
     */
    public function modifyMeta(array $meta)
    {
        $attribute = 'dynamic_price_value';
        $path = $this->arrayManager->findPath($attribute, $meta, null, 'children');
        $meta = $this->arrayManager->set(
            "{$path}/arguments/data/config/disabled",
            $meta,
            true
        );

        return $meta;
    }
}