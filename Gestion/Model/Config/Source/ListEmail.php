<?php
namespace ClientContact\Gestion\Model\Config\Source;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ListEmail implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function toOptionArray()
    {
        $options = [
            ['value' => '^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.com)$', 'label' => __('com')],
            ['value' => '^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.fr)$', 'label' => __('fr')],
        ];
        $values = $this->scopeConfig->getValue('management/contact_email/email_list1', ScopeInterface::SCOPE_STORE);
        if (!$values) {
            return [];
        }
        $rows = $values ? json_decode($values, true) : [];
        foreach ($rows as $key => $value) {
            foreach ($value as $valueK => $valueV) {
                $pattern = '^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.' . $valueV . ')$';
                array_push($options, ['value' => $pattern, 'label' => $valueV]);
            }
        }
        return $options;
    }
}

