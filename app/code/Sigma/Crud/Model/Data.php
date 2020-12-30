<?php
namespace Sigma\Crud\Model;
/**
 * Created by PhpStorm.
 * User: ilavatimakwana
 * Date: 15/12/20
 * Time: 9:54 PM
 */
class Data extends \Magento\Framework\Model\AbstractModel
{
        protected function _construct()
        {
            $this->_init('Sigma\Crud\Model\ResourceModel\Form');
        }


        public function getAvailableStatuses()
        {


            $availableOptions = ['1' => 'Enable',
                '0' => 'Disable'];

            return $availableOptions;
        }

}