# Bleez SMTP

Modulo de smtp para magento 2

## Como instalar

### Via Composer

```sh
composer require bleez/smtp
php bin/magento module:enable --clear-static-content Bleez_Smtp
php bin/magento setup:upgrade
```

### Configurar Smtp

* Configuration -> Advanced -> System -> SMTP Config