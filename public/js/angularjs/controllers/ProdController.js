var app = angular.module('leafBox');

app.controller('ProdController', function($scope, $uibModal, $log, $routeParams) {
	$scope.selected_status = 0;
	$scope.selected_media = 0;
	$scope.animationsEnabled = true;

	$scope.addProd = function(media_type) {
		console.log('hello ' + $routeParams);
		$scope.selected_media = media_type;
		var modalInstance = $uibModal.open({
			animation: $scope.animationsEnabled,
			templateUrl: '/templates/prod-modal',
			controller: 'ModalInstanceCtrl',
			size: '',
			resolve: {
				items: function () {
					return 50;
				},
				media_type: function() {
					return $scope.selected_media;
				}
			}
		});
		console.log("it's me.");
		modalInstance.result.then(function (selectedItem) {
			$scope.selected = selectedItem;
		}, function () {
			$log.info('Modal dismissed at: ' + new Date());
		});
	};

	$scope.toggleAnimation = function () {
		$scope.animationsEnabled = !$scope.animationsEnabled;
	};
});

app.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, media_type) {
	$scope.media = {
		0: 'เบรลล์',
		1: 'เทปคาสvcbgfbfbเซ็ท',
		2: 'เดซี่',
		3: 'CD',
		4: 'DVD'
	}
	$scope.status = {
		0: {
			0: 'รอการผลิต',
			1: 'รอพิมพ์',
			2: 'กำลังพิมพ์',
			3: 'ผลิตเสร็จ',
			5: 'ไม่ทำการผลิต'
		},
		2: {
			0: 'รออ่าน',
			1: 'กำลังอ่าน',
			2: 'รอการผลิต',
			3: 'ผลิตเสร็จ',
			5: 'ไม่ทำการผลิต'
		},
	}

	$scope.selected = {
		media: media_type
	}

	$scope.ok = function () {
		$uibModalInstance.close();
	};

	$scope.cancel = function () {
		$uibModalInstance.dismiss('cancel');
	};
});