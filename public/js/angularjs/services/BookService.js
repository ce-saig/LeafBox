var app = angular.module('leafBox');

app.factory('BookService', function($rootScope, $resource){
	return $resource('book/', {},
	{
		getLastProdStatus: {
			method: 'POST',
			url: ':book_id/prod/get_status',
			params:  {book_id: $rootScope.selected_book}
		},
		createProdStatus: {
			method: 'POST',
			url: ':book_id/prod/add',
			params:  {book_id: $rootScope.selected_book}
		},
		getAllProd: {
			method: 'POST',
			url: ':book_id/prod/get_all_prod',
			params:  {book_id: $rootScope.selected_book},
			isArray: true
		},
		removeProd: {
			method: 'POST',
			url: ':book_id/prod/delete',
			params: {book_id: $rootScope.selected_book}
		}
	});
});