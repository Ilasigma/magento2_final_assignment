<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sigma\Crud\Model\ResourceModel\Form;

use \Sigma\Crud\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Load data for preview flag
     *
     * @var bool
     */
    protected $_previewFlag;



    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Sigma\Crud\Model\Data', 'Sigma\Crud\Model\ResourceModel\Form');
        $this->_map['fields']['id'] = 'main_table.id';
    }
}
