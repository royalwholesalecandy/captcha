// 2019-11-21  https://developers.google.com/recaptcha/docs/v3#frontend_integration
var key = '6LeakMMUAAAAADQdL6edObYz-lk5_9IPZ8f_xvOH';
define(['jquery', `//www.google.com/recaptcha/api.js?render=${key}`], function($) {return function() {
	grecaptcha.ready(function() {grecaptcha.execute(key, {action: 'login'}).then(function(v) {
		$('.form.create.account').append($('<input>').attr({name: 'rwcCaptcha', type: 'hidden', value: v}));
	});});
};});