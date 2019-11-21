<?php
/**
 * 2019-11-21 «customer_save_before».
 * @used-by \Magento\Framework\Model\AbstractModel::beforeSave():
 *	$this->_eventManager->dispatch($this->_eventPrefix . '_save_before', $this->_getEventData());
 */
namespace RWCandy\Captcha\Observer;
use Magento\Customer\Model\Customer as C;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
use RWCandy\Captcha\Assert as A;
final class CustomerSaveBefore implements ObserverInterface {
	/**
	 * 2019-11-21
	 * @override
	 * @see ObserverInterface::execute()
	 * @see \Itoris\RegFields\Controller\Account\CreatePost::execute()
	 * @see \Magento\Customer\Model\AccountManagement::createAccount()
	 * @see \Magento\Framework\Model\AbstractModel::beforeSave()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @used-by \Magento\Framework\App\Action\Action::dispatch()
	 * @param O $o
	 */
	function execute(O $o) {
		try {
			$c = $o['customer']; /** @var C $c */
			A::email($c->getEmail());
			A::name($c['firstname']);
			A::name($c['lastname']);
		}
		catch (\Exception $e) {
			df_error('The customer is a bot.');
		}
	}
}