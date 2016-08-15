var app = angular.module('leafBox');

app.factory('BookService', function($resource){
	return #$resource('book/:book_id', {},
	{
		getLastProdStatus: {
			method: 'POST',
			url: '/prod/get_status'
		}
	});
});