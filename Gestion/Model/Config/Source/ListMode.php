<?php
namespace ClientContact\Gestion\Model\Config\Source;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function toOptionArray()
    {
        $options = [
            ['value' => 'I have a complaint concerning the shipping of my order', 'label' => __('I have a complaint concerning the shipping of my order')],
            ['value' => 'I want to know more about the products I have purchased', 'label' => __('I want to know more about the products I have purchased')],
            ['value' => 'I would like to return a product', 'label' => __('I would like to return a product')],
            ['value' => 'Other request', 'label' => __('Other request')]
        ];
        $values = $this->scopeConfig->getValue('management/contact_reason/view_list1', ScopeInterface::SCOPE_STORE);
        if(!$values){
            return[];
        }
        $rows = $values ? json_decode($values, true) : [];
        foreach ($rows as $key =>$value){
            foreach ($value as $valueK => $valueV){
                array_push($options, ['value'=> $valueV, 'label' => $valueV]);
            }
        }
        return $options;
    }
}
