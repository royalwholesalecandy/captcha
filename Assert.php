<?php
namespace RWCandy\Captcha;
use Df\Core\Exception as DFE;
// 2019-11-21
final class Assert {
	/**
	 * 2019-11-21
	 * @used-by \RWCandy\Captcha\Observer\CustomerAccountCreatePost::execute()
	 * @used-by \RWCandy\Captcha\Observer\CustomerSaveBefore::execute()
	 * @param string $v
	 * @throws DFE
	 */
	static function email($v) {df_assert(!df_ends_with($v, '.ru'));}

	/**
	 * 2019-11-21
	 * @used-by \RWCandy\Captcha\Observer\CustomerAccountCreatePost::execute()
	 * @used-by \RWCandy\Captcha\Observer\CustomerSaveBefore::execute()
	 * @param string $v
	 * @throws DFE
	 */
	static function name($v) {
		df_assert_lt(40, mb_strlen($v));
		df_assert_lt(40, mb_strlen($v));
		df_assert(!df_contains($v, '.ru'));
	}
}