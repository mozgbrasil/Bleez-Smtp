<?php

namespace Bleez\SMTP\Model;

class Transport implements \Magento\Framework\Mail\TransportInterface
{

    protected $_message;

    protected $scopeConfig;

    protected $sender;


    public function __construct(\Magento\Framework\Mail\MessageInterface $message, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, $parameters = null)
    {
        if (!$message instanceof \Zend_Mail) {
            throw new \InvalidArgumentException('The message should be an instance of \Zend_Mail');
        }

        $this->scopeConfig = $scopeConfig;
        $this->_message = $message;
        if($scopeConfig->getValue('system/bleez_smtp/active')){
            $smtpHost = $scopeConfig->getValue('system/bleez_smtp/host');
            $smtpConf = [
                'auth' => $scopeConfig->getValue('system/bleez_smtp/auth'),
                'tsl' => $scopeConfig->getValue('system/bleez_smtp/ssl'),
                'port' => $scopeConfig->getValue('system/bleez_smtp/port'),
                'username' => $scopeConfig->getValue('system/bleez_smtp/login'),
                'password' => $scopeConfig->getValue('system/bleez_smtp/password')
            ];

            $this->sender = new \Zend_Mail_Transport_Smtp($smtpHost, $smtpConf);

        }else{

            $this->sender = new \Zend_Mail_Transport_Sendmail($parameters);

        }


    }

    public function sendMessage()
    {
        try {
            $this->sender->send($this->_message);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }
}