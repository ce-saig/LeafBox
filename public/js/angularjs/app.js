(function() {
	var app = angular.module('leafBox', ['ui.bootstrap', 'ngResource', 'ngAnimate', 'ngRoute', 'ngSanitize', 'ui.select'], function($interpolateProvider) {
		$interpolateProvider.startSymbol('<%');
		$interpolateProvider.endSymbol('%>');
	});

	app.animation('.slide', function() {
		var NG_HIDE_CLASS = 'ng-hide';
		return {
			beforeAddClass: function(element, className, done) {
				if(className === NG_HIDE_CLASS) {
					element.slideUp(done);
				}
			},
			removeClass: function(element, className, done) {
				if(className === NG_HIDE_CLASS) {
					element.hide().slideDown(done);
				}
			}
		};
	});
})();