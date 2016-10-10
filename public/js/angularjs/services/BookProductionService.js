var app = angular.module('leafBox');

app.factory('BookProductionService', function($rootScope, $http, MediaService){
	var rootUrl = '/book/' + $rootScope.selected_book_id + '/';
	var status = [{
		0: 'รอการผลิต',
		1: 'รอพิมพ์',
		2: 'กำลังพิมพ์',
		3: 'ผลิตเสร็จ',
		5: 'ไม่ทำการผลิต'
	},
	{
		0: 'รออ่าน',
		1: 'อ่าน',
		2: 'ทำต้นฉบับ',
		3: 'ทำกล่อง',
		5: 'ไม่ทำการผลิต'
	},
	{
		0: 'รออ่าน',
		1: 'กำลังอ่าน',
		2: 'รอการผลิต',
		3: 'ผลิตเสร็จ',
		5: 'ไม่ทำการผลิต'
	},
	{
		0: 'รออ่าน',
		1: 'อ่าน',
		2: 'ทำต้นฉบับ',
		3: 'ทำกล่อง',
		5: 'ไม่ทำการผลิต'
	},
	{
		0: 'รออ่าน',
		1: 'อ่าน',
		2: 'ทำต้นฉบับ',
		3: 'ทำกล่อง',
		5: 'ไม่ทำการผลิต'
	}];

	return {
		convertToMediaLabel: function(num) {
			return media[num];
		},
		getProductionStatusLabel(media_type, statusNum) {
			if(typeof media_type == 'string' && isNaN(parseInt(media_type)))
				media_type = MediaService.convertToMediaNumber(media_type);
			return status[media_type][statusNum];
		},
		canAddMedia(mediaNum, statusNum) {
			return (parseInt(statusNum) == 3) ? true : false;
		},
		getLastProductionStatus(data, success, error) {
			$http({
				method: 'POST',
				url: rootUrl + 'prod/get_status',
				data: data
			}).then(success, error);
		},
		createProd(data, success, error) {
			$http({
				method: 'POST',
				url: rootUrl + 'prod/add',
				data: data
			}).then(success, error);
		},
		getAllProd(success, error) {
			$http({
				method: 'GET',
				url: rootUrl + 'prod/get_all_prod',
			}).then(success, error);
		},
		removeProd(data, success, error) {
			$http({
				method: 'POST',
				url: rootUrl + 'prod/delete',
				data: data
			}).then(success, error);
		},
		editProd(data, success, error) {
			$http({
				method: 'POST',
				url: rootUrl + 'prod/edit',
				data: data
			}).then(success, error);
		}
	}
});