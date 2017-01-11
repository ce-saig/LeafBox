var app = angular.module('leafBox');

app.factory('BookService', function($rootScope, $resource, $http){
	var rootUrl = '/book/' + $rootScope.selected_book_id;
	var mediaUrl = '/book/' + $rootScope.selected_book_id + '/' + $rootScope.selected_media_id;
	console.log(mediaUrl);
	return{
		getBookByID(success, error) {
			$http({
				method: 'GET',
				url: rootUrl + '/edit_book',
			}).then(success, error);
		},
		editBookByID(data,success, error) {
			$http({
				method: 'POST',
				url: rootUrl + '/edit_book',
				data:data
			}).then(success, error);
		},
		getMaster(success, error) {
			$http({
				method: 'GET',
				url: rootUrl + '/get_master_media'
			}).then(success, error);
		},	
		getMediaByType(data,success, error) {
			$http({
				method: 'POST',
				url: rootUrl + '/get_media_by_type',
				data: data
			}).then(success, error);
		},
		changeMaster(data,success, error) {
			$http({
				method: 'POST',
				url: rootUrl + '/change_master',
				data: data
			}).then(success, error);
		},
		countMedia(success, error) {
			$http({
				method: 'GET',
				url: rootUrl + '/count_media'
			}).then(success, error);
		},
		getMediaDetailBorrow(data,success, error) {
			$http({
				method: 'POST',
				url: mediaUrl,
				data:data
			}).then(success, error);
		},
		postMediaDetailBorrow(data,success, error) {
			$http({
				method: 'POST',
				url: mediaUrl+'/edit',
				data:data
			}).then(success, error);
		}		
	};
});