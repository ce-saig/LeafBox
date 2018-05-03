var app = angular.module('leafBox');

app.controller('ProductionStatusController', function($rootScope, $scope, $uibModal, $log, $window, $routeParams, DateTimeService, BookProductionService, MediaService) {

	$scope.addProd = function(media_type, prod) {
		media_type = MediaService.convertToMediaLabel(media_type, 'en');
		if(prod.action == 5)
			$scope.prodCollection[media_type] = null;
		$scope.prodCollection[media_type].push(prod);
	}

	$scope.editProd = function(prod) {
		console.log(prod)
		var media_label = MediaService.convertToMediaLabel(prod.media_type, 'en');
		for(var i = 0; i < $scope.prodCollection[media_label].length; i++) {
			if($scope.prodCollection[media_label][i].id == prod.id) {
				$scope.prodCollection[media_label][i] = prod;
				break;
			}
		}
	}

	$scope.removeProd = function(prod) {
		BookProductionService.removeProd({'media_type': prod.media_type}, function(response) {
			if(response.data['status'] != 'failed') {
				$scope.prodCollection[MediaService.convertToMediaLabel(prod.media_type, 'en')].splice(-1);
			} else {
				$uibModal.open({
					animation: true,
					template: '<div class="modal-header"><h4 class="modal-title">ไม่สามารถลบสถานะการผลิตได้</h4></div></div><div class="modal-body"><h4>กรุณาลบสื่อที่เกี่ยวข้อง</h4></div>'
				});
			}
		});
	}

	$scope.addProdModal = function(media_type) {
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: '/templates?path=modal/add-edit-prod-status',
			controller: 'ProductionModalController',
			size: '',
			resolve: {
				tunnel: {
					media_type: media_type,
					mode: 'ADD',
					addProd: $scope.addProd
				}
			}
		});
	};

	$scope.editProdModal = function(prod) {
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: '/templates?path=modal/add-edit-prod-status',
			controller: 'ProductionModalController',
			size: '',
			resolve: {
				tunnel: {
					media_type: MediaService.convertToMediaLabel(prod.media_type, 'en'),
					prod: prod,
					mode: 'EDIT',
					editProd: $scope.editProd
				}
			}
		});
	};

	$scope.toggleAnimation = function () {
		$scope.animationsEnabled = !$scope.animationsEnabled;
	};

	var init = function() {
		$scope.DateTimeService = DateTimeService;
		$scope.BookProductionService = BookProductionService;
		$scope.MediaService = MediaService;

		BookProductionService.getAllProd(function(response) {
			$scope.prodCollection = response.data;
		});
	};

	init();
});