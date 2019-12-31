[reCAPTCHA v3](https://www.google.com/recaptcha/intro/v3.html) for [royalwholesalecandy.com](https://royalwholesalecandy.com) (Magento 2). 

## How to install
```
sudo service crond stop
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require royalwholesalecandy/captcha:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
bin/magento cache:enable
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f
bin/magento maintenance:disable
sudo service crond start
```

## How to upgrade
```
sudo service crond stop
bin/magento maintenance:enable
composer remove royalwholesalecandy/captcha
rm -rf composer.lock
composer clear-cache
composer require royalwholesalecandy/captcha:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
bin/magento cache:enable
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f
bin/magento maintenance:disable
sudo service crond start
```