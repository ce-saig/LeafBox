(function() {
	var app = angular.module('leafBox', ['ui.bootstrap', 'ngResource', 'ngAnimate', 'ngRoute'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
})();