<?php
namespace Sigma\Crud\Model\ResourceModel;
/**
 * Created by PhpStorm.
 * User: ilavatimakwana
 * Date: 15/12/20
 * Time: 10:02 PM
 */
class Form extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('sigma_form', 'id');
    }

}