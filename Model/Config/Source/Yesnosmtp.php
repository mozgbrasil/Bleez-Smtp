<?php
namespace Bleez\Smtp\Model\Config\Source;

class Yesnosmtp implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [['value' => 'tls', 'label' => __('Yes (TLS)')], ['value' => 'ssl', 'label' => __('Yes (SSL)')],  ['value' => '', 'label' => __('No')]];
    }
}
