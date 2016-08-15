(function() {
	var app = angular.module('leafBox', ['ui.bootstrap', 'ngResource'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
})();