var app = angular.module('leafBox');

app.controller('BookEditController', function($rootScope, $scope, $uibModal, $log, $window, $routeParams, DateTimeService, BookService, BookProductionService) {
	$scope.book;
	$scope.date = {};
	var virgin = [true,true,true,true,true,true]; 

	$scope.EditBook = function(){
		if($scope.book.regis_date == "" || $scope.book.regis_date == "ยังไม่ได้ระบุ" ){ $scope.book.regis_date = "0000-00-00 00:00:00"; }else if($scope.book.regis_date.substring(2,3) == "/"){ $scope.book.regis_date = $scope.book.regis_date.substring(6, 11)+"-"+ $scope.book.regis_date.substring(3, 5)+"-"+$scope.book.regis_date.substring(0, 2)} 
		if($scope.book.bm_date == "" || $scope.book.bm_date == "ยังไม่ได้ระบุ" ){ $scope.book.bm_date = "0000-00-00 00:00:00"; }else if($scope.book.bm_date.substring(2,3) == "/"){ $scope.book.bm_date = $scope.book.bm_date.substring(6, 11)+"-"+ $scope.book.bm_date.substring(3, 5)+"-"+$scope.book.bm_date.substring(0, 2)+" 00:00:00"}  
		if($scope.book.setcs_date == "" || $scope.book.setcs_date == "ยังไม่ได้ระบุ" ){ $scope.book.setcs_date = "0000-00-00 00:00:00"; }else if($scope.book.setcs_date.substring(2,3) == "/"){ $scope.book.setcs_date = $scope.book.setcs_date.substring(6, 11)+"-"+ $scope.book.setcs_date.substring(3, 5)+"-"+$scope.book.setcs_date.substring(0, 2)+" 00:00:00"}  
		if($scope.book.setds_date == "" || $scope.book.setds_date == "ยังไม่ได้ระบุ" ){ $scope.book.setds_date = "0000-00-00 00:00:00"; }else if($scope.book.setds_date.substring(2,3) == "/"){ $scope.book.setds_date = $scope.book.setds_date.substring(6, 11)+"-"+ $scope.book.setds_date.substring(3, 5)+"-"+$scope.book.setds_date.substring(0, 2)+" 00:00:00"}  
		if($scope.book.setcd_date == "" || $scope.book.setcd_date == "ยังไม่ได้ระบุ" ){ $scope.book.setcd_date = "0000-00-00 00:00:00"; }else if($scope.book.setcd_date.substring(2,3) == "/"){ $scope.book.setcd_date = $scope.book.setcd_date.substring(6, 11)+"-"+ $scope.book.setcd_date.substring(3, 5)+"-"+$scope.book.setcd_date.substring(0, 2)+" 00:00:00"}  
		if($scope.book.setdvd_date == "" || $scope.book.setdvd_date == "ยังไม่ได้ระบุ" ){ $scope.book.setdvd_date = "0000-00-00 00:00:00"; }else if($scope.book.setdvd_date.substring(2,3) == "/"){ $scope.book.setdvd_date = $scope.book.setdvd_date.substring(6, 11)+"-"+ $scope.book.setdvd_date.substring(3, 5)+"-"+$scope.book.setdvd_date.substring(0, 2)+" 00:00:00"}  
		console.log($scope.book);
		BookService.editBookByID($scope.book,function(){
			console.log("OK");
			$window.location.href = '/book/'+$rootScope.selected_book_id +'/';
		});
	};

	var init = function() {
		$scope.DateTimeService = DateTimeService;
		$scope.BookService = BookService;
		$scope.BookProductionService = BookProductionService;

		BookService.getBookByID(function(response) {
			$scope.book = response.data;
			if($scope.book.regis_date == null || $scope.book.regis_date == "0000-00-00" || $scope.book.regis_date == "-0001-11-30"){ $scope.book.regis_date = "ยังไม่ได้ระบุ"; }
			if($scope.book.bm_date == null || $scope.book.bm_date == "0000-00-00 00:00:00"){ $scope.book.bm_date = "ยังไม่ได้ระบุ"; }
			if($scope.book.setcs_date == null || $scope.book.setcs_date == "0000-00-00 00:00:00"){ $scope.book.setcs_date = "ยังไม่ได้ระบุ"; } 
			if($scope.book.setds_date == null || $scope.book.setds_date == "0000-00-00 00:00:00"){ $scope.book.setds_date = "ยังไม่ได้ระบุ"; } 
			if($scope.book.setcd_date == null || $scope.book.setcd_date == "0000-00-00 00:00:00"){ $scope.book.setcd_date = "ยังไม่ได้ระบุ"; } 
			if($scope.book.setdvd_date == null || $scope.book.setdvd_date == "0000-00-00 00:00:00"){ $scope.book.setdvd_date = "ยังไม่ได้ระบุ"; } 
			console.log(response);
		});
	};

	init();
});