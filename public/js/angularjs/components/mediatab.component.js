var app = angular.module('leafBox');

app.component('mediaTab', {
	bindings: {
		mediaType: '@'
	},
	templateUrl: '/templates?path=media-tab',
	controller: 'MediaDetailTabController'
});