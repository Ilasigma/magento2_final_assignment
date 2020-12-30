<?php

namespace Sigma\Crud\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Sigma\Crud\Model\ResourceModel\Form\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;


    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) {
            $item->delete();
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
//    /**
//     * Massactions filter.​_
//     * @var Filter
//     */
//    protected $_filter;
//
//    /**
//     * @var CollectionFactory
//     */
//    protected $_collectionFactory;
//
//    /**
//     * @param Context           $context
//     * @param Filter            $filter
//     * @param CollectionFactory $collectionFactory
//     */
//    public function __construct(
//        Context $context,
//        Filter $filter,
//        CollectionFactory $collectionFactory
//    ) {
//
//        $this->_filter = $filter;
//        $this->_collectionFactory = $collectionFactory;
//        parent::__construct($context);
//    }
//
//    /**
//     * @return \Magento\Backend\Model\View\Result\Redirect
//     */
//    public function execute()
//    {
//        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
//        $recordDeleted = 0;
//        foreach ($collection->getItems() as $record) {
//            $record->setId($record->getEntityId());
//            $record->delete();
//            $recordDeleted++;
//        }
//        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));
//
//        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
//    }
//
//    /**
//     * Check Category Map recode delete Permission.
//     * @return bool
//     */
//    protected function _isAllowed()
//    {
//        return $this->_authorization->isAllowed('Sigma_Crud::form');
//    }
//}