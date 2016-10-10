var app = angular.module('leafBox');

app.component('productionStatus', {
	templateUrl: '/templates?path=production-status',
	controller: 'ProductionStatusController'
});