<?php
namespace Bleez\Smtp\Model\Config\Source;

class Auth implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [['value' => 'none', 'label' => __('None')], ['value' => 'plain', 'label' => __('Plain')],  ['value' => 'login', 'label' => __('Login')], ['value' => 'crammd5', 'label' => __('Crammd5')]];
    }
}
