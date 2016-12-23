var app = angular.module('leafBox');

app.factory('BookService', function($rootScope, $resource, $http){
	var rootUrl = '/book/' + $rootScope.selected_book_id + '/edit_book';
	console.log(rootUrl);
	return{
		getBookByID(success, error) {
			$http({
				method: 'GET',
				url: rootUrl,
			}).then(success, error);
		},
		editBookByID(data,success, error) {
			$http({
				method: 'POST',
				url: rootUrl,
				data:data,
			}).then(success, error);
		},	
	};
});