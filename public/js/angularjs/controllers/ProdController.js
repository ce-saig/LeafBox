var app = angular.module('leafBox');

app.controller('ProdController', function($rootScope, $scope, $uibModal, $log, BookService, $window, $window, $routeParams) {
	$scope.selected_status = 0;
	$scope.selected_media = 0;
	$scope.prods = {};

	$scope.media = {
		0: 'เบรลล์',
		1: 'เทปคาสเซ็ท',
		2: 'เดซี่',
		3: 'CD',
		4: 'DVD'
	}
	$scope.status = [{
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

	BookService.getAllProd({'book_id': $rootScope.selected_book}, function(response) {
		$scope.prods.obj = response;
		$scope.prods.index = $scope.reProdIndex(response);
	});

	$scope.addProd = function(prod) {
		if(prod.action == 5) {
			var temp = [];
			angular.forEach($scope.prods.obj, function(value, key) {
				if(value.media_type != prod.media_type)
					temp.push(value);
			});
			$scope.prods.obj = temp;
		}
		$scope.prods.obj.push(prod);
		$scope.prods.index = $scope.reProdIndex($scope.prods.obj);
	}

	$scope.editProd = function(prod) {
		angular.forEach($scope.prods.obj, function(value, key) {
			if(value.media_type == prod.media_type && value.action == prod.action)
				$scope.prods.obj[key] = prod;
		});
	}

	$scope.reProdIndex = function(prods) {
		var index = [[], [], [], [], []];
		for(var i = 0; i < prods.length; i++)
			index[parseInt(prods[i].media_type)] = index[parseInt(prods[i].media_type)] <= parseInt(prods[i].action) ? parseInt(prods[i].action) : index[parseInt(prods[i].media_type)];
		return index;
	}

	$scope.removeProd = function(index) {
		var params = {
			'book_id': $rootScope.selected_book,
			'media_type': $scope.prods.obj[index].media_type
		}
		BookService.removeProd(params, function(response) {
			$scope.prods.obj.splice(index, 1);
			$scope.prods.index = $scope.reProdIndex($scope.prods.obj);
		});
	}

	$scope.addProdModal = function(media_type) {
		$scope.selected_media = media_type;
		var params = {'book_id': $rootScope.selected_book, 'media_type': media_type};

		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: '/templates/prod-modal',
			controller: 'ModalInstanceCtrl',
			size: '',
			resolve: {
				data: function() {
					return {
						media_type: $scope.selected_media,
						media: $scope.media,
						status: $scope.status,
						status_request: BookService.getLastProdStatus(params),
						mode: 'ADD'
					}
				},
				method: function() {
					return {
						addProd: $scope.addProd
					}
				}
			}
		});
	};

	$scope.editProdModal = function(data) {
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: '/templates/prod-modal',
			controller: 'ModalInstanceCtrl',
			size: '',
			resolve: {
				data: function() {
					return {
						media_type: $scope.selected_media,
						media: $scope.media,
						status: $scope.status,
						prod: data,
						mode: 'EDIT'
					}
				},
				method: function() {
					return {
						editProd: $scope.editProd
					}
				}
			}
		});
	};

	$scope.toggleAnimation = function () {
		$scope.animationsEnabled = !$scope.animationsEnabled;
	};

	$rootScope.DBDate = function(date, displayTime = false) {
		if(typeof date == 'string')
			date = new Date(date);
		sec = date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds();
		min = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
		hour = date.getHours() < 10 ? '0' + date.getHours() : date.getHours();
		day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
		month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
		year = date.getFullYear();
		if(displayTime)
			return '' + year + '-' + month + '-' + day + ' ' + hour + ':' + min + ':' + sec;
		return '' + year + '-' + month + '-' + day;
	}
});

app.controller('ModalInstanceCtrl', function ($rootScope, $scope, $uibModalInstance, data, method, BookService, UserService) {
	$scope.status_options = new Array();
	$scope.users = new Array();
	$scope.selected = {};
	$scope.data = data;
	$scope.warning = {
		off: true
	};
	$scope.actioner = {};
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
			minDate: $scope.action_date,
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
	function disabled(data) {
		var date = data.date,
		mode = data.mode;
		return false;
	}
	
	if(data.mode == 'ADD') {
		data.status_request.$promise.then(function(response) {
			var status = parseInt(response.action_status) + 1;
			if(status == 4) {
				$scope.showWarning('กระบวนการผลิตเสร็จสิ้นแล้ว');
				$scope.selected.status = { id: null };
			}
			else if(status == 6) {
				$scope.showWarning('กรุณายกเลิกสถานะล่าสุดเพื่อเริ่มสถานะการผลิตใหม่');
				$scope.selected.status = { id: null };
			}
			else {
				$scope.selected.status = {
					id: status,
					label: $scope.getStatusLabel(status)
				}
				$scope.status_options = [
				{
					id: status,
					label: $scope.getStatusLabel(status)
				}
				]
				if(status != 4) {
					$scope.status_options.push({
						id: 5,
						label: $scope.getStatusLabel(5)
					});
				}
			}
		});
	} else {
		$scope.selected.actioner = data.prod.actioner;
		$scope.selected.status = {
			id: data.prod.action,
			label: data.status[data.media_type][data.prod.action]
		}
		$scope.status_options = [{
			id: data.prod.action,
			label: data.status[data.media_type][data.prod.action]
		}]
	}

	$scope.getMedia = function(num) {
		if(typeof num != "undefined")
			return data.media[num];
		return data.media[data.media_type];
	}

	$scope.getStatusLabel = function(num) {
		if(typeof num != "undefined")
			return data.status[data.media_type][num];
		return data.status[data.media_type][$scope.selected.status.id];
	}

	$scope.showWarning = function(text) {
		$scope.warning.off = false;
		$scope.warning.text = text;
	}

	$scope.hideWarning = function() {
		$scope.warning.off = true;
	}

	$scope.changeStatus = function() {
		$scope.selected.status.label = $scope.getStatusLabel($scope.selected.status.id == 5);
		if($scope.selected.status.id == 5)
			$scope.showWarning('การยกเลิกการผลิตจะทำให้สถานะการผลิตในปัจจุบันถูกลบ');
		else
			$scope.hideWarning();
	}

	$scope.validateForm = function() {
		var data = $scope.getFormData();
		if(data.action == null)
			return false;
		if(data.act_date == null || data.actioner == null || (data.action != 5 && data.finish_date == null)) {
			$scope.showWarning('กรุณากรอกข้อมูลให้ครบถ้วน');
			return false;
		}
		return true;
	}

	$scope.getFormData = function() {
		return {
			book_id: $rootScope.selected_book,
			act_date: $rootScope.DBDate($scope.action_date, true),
			finish_date: $rootScope.DBDate($scope.finish_date, true),
			media_type: data.media_type,
			action: $scope.selected.status.id,
			actioner: $scope.selected.actioner
		}
	}

	$scope.ok = function () {
		if($scope.validateForm()) {
			var params = $scope.getFormData();
			if(data.mode == 'ADD') {
				BookService.createProd(params, function(response) {
					$uibModalInstance.close();
					method.addProd($scope.getFormData());
				},
				function(error) {
					$scope.showWarning('เกิดปัญหาขึ้นบางอย่าง กรุณาติดต่อผู้ดูแลระบบ');
				});
			} else {
				params.prod_id = data.prod.id == null ? data.prod.prod_id : data.prod.id;
				console.log(params);
				BookService.editProd(params, function(response) {
					method.editProd(params);
					$uibModalInstance.close();
				}, function(error) {
					$scope.showWarning('เกิดปัญหาขึ้นบางอย่าง กรุณาติดต่อผู้ดูแลระบบ');
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
})

.animation('.slide', function() {
	var NG_HIDE_CLASS = 'ng-hide';
	return {
		beforeAddClass: function(element, className, done) {
			if(className === NG_HIDE_CLASS) {
				element.slideUp(done);
			}
		},
		removeClass: function(element, className, done) {
			if(className === NG_HIDE_CLASS) {
				element.hide().slideDown(done);
			}
		}
	}
});