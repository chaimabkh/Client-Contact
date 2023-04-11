<?php

namespace ClientContact\Gestion\Block\ComplainReason;

use Magento\Framework\View\Element\Template;
use ClientContact\Gestion\Model\Config\Source\ListMode ;
use ClientContact\Gestion\Model\Config\Source\ListEmail ;
use ClientContact\Gestion\Model\Config\Source\ListPhoneNumber;

class ContactForm extends Template
{
    protected $_complain ;
    protected $_emailLike ;
    protected $telPattern ;
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, ListMode $reason, ListEmail $emailPattern, ListPhoneNumber $phoneNumberPattern, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
        $this->_complain = $reason;
        $this->_emailLike = $emailPattern;
        $this->telPattern = $phoneNumberPattern;
    }
    /**
     * Returns action url for contact form
     *
     * @return array
     */
    public function getReason()
    {
        return $this->_complain->toOptionArray();
    }
    /**
     * Returns action url for contact form
     *
     * @return array
     */
    public function getEmailPattern()
    {
        return $this->_emailLike->toOptionArray();
    }

    /**
     * Returns action url for contact form
     *
     * @return array
     */
    public function getTelPattern()
    {
        return $this->telPattern->toOptionArray();
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('contacts/form/post', ['_secure' => true]);
    }
}
