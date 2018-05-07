var app = angular.module('leafBox');

app.controller('MediaDetailTabController', function($rootScope, $scope, $uibModal, DateTimeService, BookProductionService, MediaService){
	$scope.MediaService = MediaService;
	$scope.mediaType = this.mediaType;

	MediaService.getMedia({media_type: this.mediaType}, function(response) {
		$scope.mediaCollection = response.data;
	});

	$scope.isShowTableData = function(columnName) {
		return $scope.tableData[columnName];
	}

	$scope.verifyAddingMedia = function() {
		var params = {
			media_type: $scope.mediaType,
			book_id: $rootScope.selected_book_id
		}
		BookProductionService.getLastProductionStatus(params, function(response) {
			$scope.addMediaModal(response.data);
		});
	};

	$scope.pushToMediaCollection = function(media_obj) {
		$scope.mediaCollection.push(media_obj);
	}

	$scope.getMediaLabel = function(lang='th') {
		var mediaNum = MediaService.convertToMediaNumber($scope.mediaType);
		return MediaService.convertToMediaLabel(mediaNum);
	}

	$scope.addMediaModal = function(lastProductionStatus) {
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: '/templates?path=modal/add-edit-media',
			controller: 'MediaModalController',
			size: '',
			resolve: {
				tunnel: {
					mediaType: $scope.mediaType,
					mode: MediaService.ADD,
					lastProductionStatus: lastProductionStatus,
					pushToMediaCollection: $scope.pushToMediaCollection
				}
			}
		});
	};

	$scope.editMediaModal = function(item) {
		item.pages = parseInt(item.pages);
		item.numpart = parseInt(item.numpart);
		item.length = parseInt(item.length);
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: '/templates?path=modal/add-edit-media',
			controller: 'MediaModalController',
			size: '',
			resolve: {
				tunnel: {
					mediaType: $scope.mediaType,
					mode: MediaService.EDIT,
					targetMedia: item,
					pushToMediaCollection: $scope.pushToMediaCollection
				}
			}
		});
	}

	$scope.deleteMedia = function(item) {
		MediaService.deleteMedia($scope.mediaType, item.id, function(response) {
			if(response.data['status'] == 'success') {
				for(var i = 0; i < $scope.mediaCollection.length; i++)
					if($scope.mediaCollection[i].id == item.id)
						$scope.mediaCollection.splice(i, 1);
				} else
				$scope.showNotification('เกิดข้อผิดพลาดบางประการ', 'ไม่สามารถลบสื่อได้ กรุณาตรวจสอบสถานะการผลิต');
			}, function(error) {
				$scope.showNotification('เกิดข้อผิดพลาดบางประการ', 'ไม่สามารถลบสื่อได้ กรุณาตรวจสอบสถานะการผลิต');
			});
	}

	$scope.deleteAllMedia = function() {
		MediaService.deleteAllMedia($scope.mediaType, function(response) {
			if(response.data['status'] == 'success') {
				$scope.mediaCollection = null;
			} else
			$scope.showNotification('เกิดข้อผิดพลาดบางประการ', 'ไม่สามารถลบสื่อได้ กรุณาตรวจสอบสถานะการผลิต');
		}, function(error) {
			$scope.showNotification('เกิดข้อผิดพลาดบางประการ', 'ไม่สามารถลบสื่อได้ กรุณาตรวจสอบสถานะการผลิต');
		});
	}

	$scope.showNotification = function(title, message) {
		$uibModal.open({
			animation: true,
			template: '<div class="modal-header"><h4 class="modal-title">' + title + '</h4></div></div><div class="modal-body"><h4>' + message + '</h4></div>'
		});
	}

	var init = function() {
		switch($scope.mediaType) {
			case 'braille':
			$scope.tableHead = ['เบรลล์เซ็ทไอดี', 'เบรลล์เซ็ทไอดีเดิม', 'จำนวนหน้า', 'จำนวนตอน', 'ผู้ตรวจสอบ', 'ผู้ยืม'];
			$scope.tableData = {pages: true, numpart: true, length: false, examiner: true};
			$scope.media_code = 'B';
			break;
			case 'cassette':
			$scope.tableHead = ['คาสเซ็ทเซ็ทไอดี', 'คาสเซ็ทเซ็ทไอดีเดิม', 'จำนวนชิ้นย่อย (ตลับ)', 'ความยาว(นาที)', 'ผู้ยืม'];
			$scope.tableData = {pages: false, numpart: true, length: true, examiner: false};
			$scope.media_code = 'C';
			break;
			case 'cd':
			$scope.tableHead = ['ซีดีเซ็ทไอดี', 'ซีดีเซ็ทไอดีเดิม', 'จำนวนชิ้นย่อย (แผ่น)', 'จำนวนแทร็ค', 'ผู้ยืม'];
			$scope.tableData = {pages: false, numpart: true, length: true, examiner: false};
			$scope.media_code = 'CD';
			break;
			case 'daisy':
			$scope.tableHead = ['เดซีเซ็ทไอดี', 'เดซี่เซ็ทไอดีเดิม', 'จำนวนชิ้นย่อย (แผ่น)', 'จำนวนแทร็ค', 'ผู้ยืม'];
			$scope.tableData = {pages: false, numpart: true, length: true, examiner: false};
			$scope.media_code = 'D';
			break;
			default:
			$scope.tableHead = ['ดีวีดีเซ็ทไอดี','ดีวีดีเซ็ทไอดีเดิม', 'จำนวนชิ้นย่อย (แผ่น)', 'จำนวนแทร็ค', 'ผู้ยืม'];
			$scope.tableData = {pages: false, numpart: true, length: true, examiner: false};
			$scope.media_code = 'DVD';
		}
	}

	init();
});