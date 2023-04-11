<?php
namespace ClientContact\Gestion\Model\Config\Source;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ListPhoneNumber implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function toOptionArray()
    {
        $options = [
            ['value' => '^06[0-9]{8}$', 'label' => __('06********')],
            ['value' => '^07[0-9]{8}$', 'label' => __('07********')],
        ];
/*        if(!$values){
            return[];
        }
        foreach ($rows as $key =>$value){
            foreach ($value as $valueK => $vV){
                $position= strpos($vV, '*');
                $pattern = '^'. substr($vV, 0, $position).'[0-9]{'. (strlen($vV) - $position) .'}$';
                array_push($options, ['value'=> $pattern, 'label' => $vV]);
            }
        }*/
        return $options;
    }
}
