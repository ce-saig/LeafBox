var app = angular.module('leafBox');

app.factory('MediaService', function($rootScope, $resource, $http){
	var rootUri = '/book/' + $rootScope.selected_book_id + '/';
	var media = [
		['braille', 'เบรลล์'],
		['cassette', 'เทปคาสเซ็ท'],
		['daisy', 'เดซี่'],
		['cd', 'ซีดี'],
		['dvd', 'ดีวีดี']
	]
	return {
		BRAILLE: 0,
		CASSETTE: 1,
		CD: 2,
		DAISY: 3,
		DVD: 4,
		ADD: 'ADD',
		EDIT: 'EDIT',
		convertToMediaLabel: function(media_type, lang='th') {
			if(!isNaN(media_type))
				return lang == 'th' ? media[media_type][1] : media[media_type][0];

			var media_number = this.convertToMediaNumber(media_type, 'th');
			if(media_number == null)
				media_number = this.convertToMediaNumber(media_type, 'en');
			return lang == 'th' ? media[media_number][1] : media[media_number][0];
		},
		convertToMediaNumber: function(label) {
			for(var i = 0; i < media.length; i++) {
				if(media[i][0] == label || media[i][1] == label) {
					return i;
				}
			}
			return null;
		},
		addMedia: function(mediaNum, data, success, error) {
			$http({
				method: 'POST',
				url: rootUri + this.convertToMediaLabel(mediaNum, 'en') + '/add',
				data: data
			}).then(success, error);
		},
		getMedia: function(data, success, error) {
			$http({
				method: 'POST',
				url: rootUri + 'get_media',
				data: data
			}).then(success, error);
		},
		editMedia: function(mediaNum, data, success, error) {
			data.media_type = this.convertToMediaLabel(mediaNum, 'en');
			$http({
				method: 'POST',
				url: '/edit_media',
				data: data
			}).then(success, error);
		},
		deleteMedia: function(mediaLabel, mediaId, success, error) {
			$http({
				method: 'GET',
				url: rootUri + mediaLabel + '/delete/' + mediaId
			}).then(success, error);
		},
		deleteAllMedia: function(mediaLabel, success, error) {
			$http({
				method: 'GET',
				url: rootUri + mediaLabel + '/deleteAll/'
			}).then(success, error);
		}
	}
});