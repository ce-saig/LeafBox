(function() {
	var app = angular.module('leafBox', ['ui.bootstrap', 'ngResource', 'ngAnimate', 'ngRoute', 'ngSanitize', 'ui.select'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
})();