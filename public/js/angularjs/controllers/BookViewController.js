var app = angular.module('leafBox');

app.controller('BookViewController', function($rootScope, $scope, $uibModal, $log, $window, $routeParams, DateTimeService, BookService, BookProductionService) {
	$scope.hello = "Hello";
	$scope.master_list;

	var SetText = function(){
		var d_first = false;
		var d_first_ori = false;
		$scope.text = '(';
		$scope.text_ori = '(';
		if($scope.master_list.braille[0] !=null){
			$scope.text += 'B'+$scope.master_list['braille'][0].id;
			d_first = true;
			if($scope.master_list.braille[0].original_no != null){
				$scope.text_ori += 'B'+$scope.master_list.braille[0].original_no;
				d_first_ori = true;
			}
		}
		if($scope.master_list.cassette[0] != null){
			$scope.text += ', C' + $scope.master_list['cassette'][0].id;
			if($scope.master_list.cassette[0].original_no != null){
				$scope.text_ori += ', C'+$scope.master_list.cassette[0].original_no;
			}		
		}
		if($scope.master_list.daisy[0] !=null){
			$scope.text += ', D' + $scope.master_list['daisy'][0].id;
			if($scope.master_list.daisy[0].original_no != null){
				$scope.text_ori += ', D'+$scope.master_list.daisy[0].original_no;
			}
		}
		if($scope.master_list.cd[0] !=null){
			$scope.text += ', CD' + $scope.master_list['cd'][0].id;
			if($scope.master_list.cd[0].original_no != null){
				$scope.text_ori += ', CD'+$scope.master_list.cd[0].original_no;
			}
		}
		if($scope.master_list.dvd[0] !=null){
			$scope.text += ', DVD' + $scope.master_list['dvd'][0].id;
			if($scope.master_list.dvd[0].original_no != null){
				$scope.text_ori += ', DVD'+$scope.master_list.dvd[0].original_no;
			}
		}
		if(d_first == false){
			$scope.text = $scope.text.substring(0,1)+$scope.text.substring(3,$scope.text.length);
		}
		if(d_first_ori == false){
			$scope.text_ori = $scope.text_ori.substring(0,1)+$scope.text_ori.substring(3,$scope.text_ori.length);
		}
		$scope.text += ")";
		$scope.text_ori += ")";
	};

	$rootScope.$on("initView", function(){
        init();
    });

	var init = function() {
		$scope.DateTimeService = DateTimeService;
		$scope.BookService = BookService;
		$scope.BookProductionService = BookProductionService;

		$scope.BookService.getMaster(function(response){
			$scope.master_list = response.data;
			SetText(); 
		});

		$scope.BookService.countMedia(function(response){ 
			$scope.count = response.data;
			console.log($scope.count)
		});

		$scope.BookService.getBookByID(function(response){
			$scope.book = response.data;
		});
	};

	init();

});
