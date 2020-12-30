<?php
/**
 * Created by PhpStorm.
 * User: ilavatimakwana
 * Date: 15/12/20
 * Time: 9:33 PM
 */

namespace Sigma\Crud\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\DataObject;
class Post extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var Context
     */
    private $context;


    /**
     * @var LoggerInterface
     */
    private $logger;

    private $datatFactory;

    /**
     * Post constructor.
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \Sigma\Crud\Model\datatFactory $datatFactory
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        \Sigma\Crud\Model\DataFactory $datatFactory,
        LoggerInterface $logger = null
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->dataPersistor = $dataPersistor;
        $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
        $this->datatFactory = $datatFactory;
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
        try {
            $this->validatedParams();
            $request = $this->getRequest();
            $data = $request->getParams();
            $model =$this->datatFactory->create();
            $model->setData($data);
            $model->save();
            $this->messageManager->addSuccessMessage(
                __('Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.')
            );
            $this->dataPersistor->clear('contact_us');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            $this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('customform/index');
    }


    /**
     * @return array
     * @throws \Exception
     */
    private function validatedParams()
    {
        $request = $this->getRequest();
       // echo "<pre>";print_r($request->getParams());exit;
        if (trim($request->getParam('firstname')) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (trim($request->getParam('comment')) === '') {
            throw new LocalizedException(__('Enter the comment and try again.'));
        }
        if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }

        return $request->getParams();
    }

}