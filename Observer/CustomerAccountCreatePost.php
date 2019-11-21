<?php
/**
 * 2019-11-21 «controller_action_predispatch_customer_account_createpost».
 * @used-by \Magento\Framework\App\Action\Action::dispatch():
 *	$this->_eventManager->dispatch('controller_action_predispatch_' . $request->getFullActionName(), $eventParameters);
 */
namespace RWCandy\Captcha\Observer;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
use ReCaptcha\ReCaptcha as RC;
final class CustomerAccountCreatePost implements ObserverInterface {
	/**
	 * 2019-11-21
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @used-by \Magento\Framework\App\Action\Action::dispatch()
	 * @param O $o
	 */
	function execute(O $o) {
		try {
			$rc = new RC('6LeakMMUAAAAANiYs8d8SuADmDXkJ7604rGE43po'); /** @var RC $rc */
			$rc->setScoreThreshold(0.9);
			//df_assert($rc->verify($res = df_request('rwcCaptcha'))->isSuccess());
			/*df_assert(!df_ends_with(df_request('email'), '.ru'));
			df_assert_lt(40, mb_strlen(df_request('firstname')));
			df_assert_lt(40, mb_strlen(df_request('lastname')));*/
		}
		catch (\Exception $e) {
			df_message_error('reCAPTCHA validation failed.');
			df_no_dispatch();
			df_redirect_back();
		}
	}
}