<?php
namespace ClientContact\Gestion\Controller\Adminhtml\Configuration ;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
class Index extends Action
{
    const ADMIN_RESOURCE = 'ClientContact_Gestion::configuration';
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct
    (
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    /**
     * ContactForm action
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ClientContact_Gestion::configuration');
        $resultPage->addBreadcrumb(__('Manage Contacts'), __('Manage Contacts'));
        $resultPage->getConfig()->getTitle()->prepend(__('Configuration'));
        return $resultPage;
    }
}
