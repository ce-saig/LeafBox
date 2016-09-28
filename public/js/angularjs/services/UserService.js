var app = angular.module('leafBox');

app.factory('UserService', function($rootScope, $resource){
	return $resource('user/', {},
	{
		searchUser: {
			method: 'POST',
			url: '../user/search',
			isArray: true
		}
	});
});