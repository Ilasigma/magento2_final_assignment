<?php

namespace Sigma\CustomerAddress\Setup\Patch\Data;

use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class AddressAttribute
 */
class AddressAttribute implements DataPatchInterface
{
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * AddressAttribute constructor.
     *
     * @param Config              $eavConfig
     * @param EavSetupFactory     $eavSetupFactory
     */
    public function __construct(
        Config $eavConfig,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->eavConfig = $eavConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create();

        $eavSetup->addAttribute('customer_address', 'new_field', [
            'type'             => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            'input'            => 'text',
            'label'            => 'New Field',
            'visible'          => true,
            'required'         => false,
            'user_defined'     => true,
            'system'           => false,
            'group'            => 'General',
            'global'           => true,
            
            
            'visible_on_front' => true,
            'is_used_in_grid' => true,
            'is_visible_in_grid' => true,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'frontend_input' => 'hidden',
            'backend' => '',
            'source' =>'',
            'position' =>90,
        ]);

        $customAttribute = $this->eavConfig->getAttribute('customer_address', 'new_field');

        $customAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address',
                'adminhtml_customer',
                'customer_address',]

        );
        $customAttribute->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}