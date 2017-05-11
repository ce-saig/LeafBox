var app = angular.module('leafBox');

app.controller('ProductionModalController', function ($rootScope, $scope, $uibModalInstance, tunnel, BookProductionService, UserService, DateTimeService, MediaService) {
	function disabled(data) {
		var date = data.date,
		mode = data.mode;
		return false;
	}

	$scope.showNotification = function(text) {
		$scope.notification.show = true;
		$scope.notification.message = text;
	}

	$scope.hidenotification = function() {
		$scope.notification.show = false;
	}

	$scope.changeStatus = function() {
		if($scope.formdata.status_number == 5)
			$scope.showNotification('การยกเลิกการผลิตจะทำให้สถานะการผลิตในปัจจุบันถูกลบ');
		else
			$scope.hidenotification();
	}

	$scope.validateForm = function() {
		var data = $scope.getFormData();
		if(data.action == null)
			return false;
		if(data.act_date == null || data.actioner == null || (data.action != 5 && data.finish_date == null)) {
			$scope.showNotification('กรุณากรอกข้อมูลให้ครบถ้วน');
			return false;
		}
		return true;
	}

	$scope.getFormData = function() {
		return {
			act_date: DateTimeService.convertToSQLFormat($scope.formdata.act_date, true),
			finish_date:  DateTimeService.convertToSQLFormat($scope.formdata.finish_date, true),
			media_type: MediaService.convertToMediaNumber(tunnel.media_type),
			action: $scope.formdata.status_number,
			actioner: $scope.formdata.actioner
		}
	}

	$scope.ok = function () {
		if($scope.validateForm()) {
			var params = $scope.getFormData();
			if(tunnel.mode == 'ADD') {
				BookProductionService.createProd(params, function(response) {
					$uibModalInstance.close();
					tunnel.addProd(tunnel.media_type, $scope.getFormData());
				},
				function(error) {
					$scope.showNotification('เกิดปัญหาขึ้นบางอย่าง กรุณาติดต่อผู้ดูแลระบบ');
				});
			} else {
				params.id = tunnel.prod.id;
				BookProductionService.editProd(params, function(response) {
					tunnel.editProd(params);
					$uibModalInstance.close();
				}, function(error) {
					$scope.showNotification('เกิดปัญหาขึ้นบางอย่าง กรุณาติดต่อผู้ดูแลระบบ');
				});
			}
		}
	};

	$scope.cancel = function () {
		$uibModalInstance.dismiss('cancel');
	};

	$scope.searchUsers = function(keyword) {
		UserService.searchUser({keyword: keyword}, function(response) {
			$scope.users = response;
		});
	};

	var init = function() {
		$scope.status_options;
		$scope.users;
		$scope.formdata = {};
		$scope.tunnel = tunnel;
		$scope.MediaService = MediaService;
		$scope.BookProductionService = BookProductionService;
		$scope.notification = {
			show: false,
			message: null
		};
		$scope.actioner;
		$scope.action_date = new Date();
		$scope.finish_date = new Date();
		$scope.datepicker = {
			popup: {
				action_date: false,
				finish_date: false
			},
			dateOptions: {
				dateDisabled: disabled,
				formatYear: 'yy',
				maxDate: new Date(2559, 9, 22),
				startingDay: 1
			},
			format: 'dd-MM-yyyy',
			toggle: function(num) {
				if(num == 1)
					$scope.datepicker.popup.action_date = $scope.datepicker.popup.action_date == true ? false : true;
				else
					$scope.datepicker.popup.finish_date = $scope.datepicker.popup.finish_date == true ? false : true;
			}
		}
		if(tunnel.mode == 'ADD') {
			BookProductionService.getLastProductionStatus({'media_type': tunnel.media_type}
				, function(response) {
					var next_status = parseInt(response.data.action_status) + 1;
					if(next_status == 5) {
						$scope.showNotification('กระบวนการผลิตเสร็จสิ้นแล้ว');
						$scope.formdata.status_number = null;
					}
					else if(next_status == 7) {
						$scope.showNotification('กรุณายกเลิกสถานะล่าสุดเพื่อเริ่มสถานะการผลิตใหม่');
						$scope.formdata.status_number = null;
					}
					else {
						$scope.formdata.status_number = next_status;
						$scope.formdata.status_label = BookProductionService.getProductionStatusLabel(tunnel.media_type, next_status);
						$scope.status_options = [{
							status_number: next_status,
							status_label: BookProductionService.getProductionStatusLabel(tunnel.media_type, next_status)
						}];
						if(next_status != 5) {
							$scope.status_options.push({
								status_number: 6,
								status_label: BookProductionService.getProductionStatusLabel(tunnel.media_type, 6)
							});
						}
					}
				});
		} else {
			$scope.formdata.actioner = tunnel.prod.actioner;
			$scope.formdata.status_number = tunnel.prod.action;
			$scope.formdata.finish_date = new Date(tunnel.prod.finish_date);
			$scope.formdata.act_date = new Date(tunnel.prod.act_date);
			$scope.formdata.status_label = BookProductionService.getProductionStatusLabel(tunnel.media_type, tunnel.prod.action);
			$scope.status_options = [{
				status_number: tunnel.prod.action,
				status_label: BookProductionService.getProductionStatusLabel(tunnel.media_type, tunnel.prod.action)
			}];
		}
	}

	init();
});