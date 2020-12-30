<?php

namespace Sigma\CustomAttributes\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddClothingMaterialAttribute implements DataPatchInterface
{
    /** @var ModuleDataSetupInterface */
    private $moduleDataSetup;

    /** @var EavSetupFactory */
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute('catalog_product', 'clothing_material', [
            'type' => 'int',
            'label' => 'Custom Material',
            'input' => 'select',
            'used_in_product_listing' => true,
            'user_defined' => true,
            'searchable' => true,
            'filterable' => true,
            'comparable' => true,
            'visible_on_front' => true,
            'source' => 'Sigma\CustomAttributes\Model\Attribute\Source\Material',
            'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
        ]);

        $eavSetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            'Default',             //attribute set
            'General',           //attribute section or group
            'clothing_material' //attribute
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}