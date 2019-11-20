[reCAPTCHA v3](https://www.google.com/recaptcha/intro/v3.html) for [royalwholesalecandy.com](https://royalwholesalecandy.com) (Magento 2). 

## How to install
```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require royalwholesalecandy/captcha:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
bin/magento cache:enable
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme bs_eren/bs_eren3 \
	-f en_US
bin/magento maintenance:disable
```

## How to upgrade
```
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
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme bs_eren/bs_eren3 \
	-f en_US
bin/magento maintenance:disable
```