var app = angular.module('leafBox');

app.controller('MediaModalController', function($rootScope, $scope, $uibModalInstance, tunnel, BookProductionService, UserService, MediaService, $window){

	$scope.clearForm = function() {
		$scope.formdata = {
			numpart: null,
			length: null,
			pages: null,
			examiner: null
		}
	}

	$scope.showNotification = function(text) {
		$scope.notification.show = true;
		$scope.notification.message = text;
	}

	$scope.hideNotification = function() {
		$scope.notification.show = false;
	}

	$scope.closeModal = function () {
		$uibModalInstance.dismiss('cancel');
	};

	$scope.validateForm = function() {
		var formdata = $scope.formdata;
		if(tunnel.mode == MediaService.Add && !$scope.canAddMedia())
			return false;
		else if($scope.getMediaNumber() == MediaService.BRAILLE && formdata.numpart != null && formdata.pages != null && formdata.examiner != null)
			return true;
		else if(formdata.numpart != null && formdata.length != null)
			return true;
		return false;
	}

	$scope.searchUsers = function(keyword) {
		UserService.searchUser({keyword: keyword}, function(response) {
			$scope.users = response;
		});
	};

	$scope.getMediaNumber = function() {
		return MediaService.convertToMediaNumber(tunnel.mediaType);
	}

	$scope.getMediaLabel = function(lang='th') {
		return MediaService.convertToMediaLabel($scope.getMediaNumber(), lang);
	}

	$scope.canAddMedia = function() {
		return BookProductionService.canAddMedia(tunnel.mediaType, tunnel.lastProductionStatus.action_status);
	}

	$scope.updateView = function() {
        $rootScope.$emit("initView", {});
    }

	$scope.sendData = function() {
		if($scope.validateForm()) {
			$scope.hideNotification();
			if(tunnel.mode == MediaService.ADD) {
				MediaService.addMedia($scope.getMediaNumber(), $scope.formdata, function(response) {
					if(typeof response.data.id == "number") {
						$scope.formdata.id = response.data.id;
						tunnel.pushToMediaCollection($scope.formdata);
						$scope.closeModal();
						$scope.clearForm();
					}
					else
						$scope.showNotification('ข้อมูลไม่ถูกต้อง');
				}, function(error) {
					$scope.showNotification('เกิดข้อผิดพลาดบางประการ');
				});
			} else {
				MediaService.editMedia($scope.getMediaNumber(), $scope.formdata, function(response) {
					if(typeof response.data.submedia_id == "string") {
						tunnel.targetMedia.submedia_id = response.data.submedia_id;
						$scope.closeModal();
						$scope.clearForm();
					}
					else
						$scope.showNotification('ข้อมูลไม่ถูกต้อง');
				}, function(error) {
					$scope.showNotification('เกิดข้อผิดพลาดบางประการ');
				});
			}
			$scope.updateView();
		} else
		$scope.showNotification('สถานะการผลิตยังไม่สมบูรณ์หรือกรอกข้อมูลไม่ครบถ้วน');
	}

	$scope.goToMediaDetails = function() {
		$window.location.href = $rootScope.selected_book_id + '/' + $scope.getMediaLabel('en') + '/' + tunnel.targetMedia.id;
	}

	var init = function() {
		$scope.users = new Array();
		$scope.MediaService = MediaService;
		$scope.tunnel = tunnel;
		$scope.disabledForm = false;
		$scope.label = {
			numpart: null,
			numpart_suff: null
		};
		$scope.formdata = {};
		$scope.notification = {
			show: false,
			message: null
		};
		if(tunnel.mode == MediaService.ADD) {
			$scope.operationName = 'เพิ่ม';
			if($scope.canAddMedia()) {
				$scope.formdata = {
					numpart: null,
					length: null,
					pages: null,
					examiner: null
				}
			}
			else {
				$scope.showNotification('ไม่สามารถเพิ่มสื่อได้ กรุณาตรวจสอบสถานะการผลิต');
				$scope.disabledForm = true;
			}
		} else {
			$scope.operationName = 'แก้ไข';
			$scope.formdata = tunnel.targetMedia;
		}

		switch($scope.getMediaNumber()) {

			case MediaService.BRAILLE:
			$scope.label.numpart = 'จำนวนตอน';
			$scope.label.numpart_suff = 'ตอน';
			break;
			case MediaService.CASSETTE:
			$scope.label.numpart = 'จำนวนตลับ';
			$scope.label.numpart_suff = 'ตลับ';
			break;
			case MediaService.DAISY:
			$scope.label.numpart = 'จำนวนแทร็ก';
			$scope.label.numpart_suff = 'ชิ้น';
			break;
			default:
			$scope.label.numpart = 'จำนวนแทร็ก';
			$scope.label.numpart_suff = 'แผ่น';
		}
	}
	init();
});