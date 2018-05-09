var app = angular.module('leafBox');

app.controller('MediaDetailEditController', function($rootScope, $scope, $filter,$uibModal, $window,DateTimeService, BookService){
	$scope.status = [	{id:0, label:"ปกติ"},
						{id:1, label:"ชำรุด"},
						{id:2, label:"รอซ่อม"},
						{id:3, label:"หาย"}
					];
	$scope.selected_status = [];
	$scope.all_notes= "";

	// Date Picker
	var InitDatePicker  = function(){
		setTimeout(() => {
			for(i=0;i<$scope.details.length;i++){
				$("#date-picker-" + i).datepicker({ language:'th-th', format: 'dd/mm/yyyy', isBuddhist: true, orientation: 'top'});
				$("#date-picker-" + i).datepicker('setDate', new Date($scope.details[i].date.substring(0,10)));
				if ($scope.media.reserved==1) {
					$("#date-picker-" + i).prop('disabled', true);
				}
			}
		}, 250);
		$("#all-date").datepicker({ language:'th-th', format: 'dd/mm/yyyy', isBuddhist: true, orientation: 'top'});
		$("#all-date").datepicker('setDate', new Date());
	};

	$scope.EditAll = function(){
		for(i=0;i<$scope.details.length;i++){
			if($scope.media.reserved == 0)
				$scope.selected_status[i] = $scope.all_selected_status;
			if($("#all-date").datepicker('getDate') != "")
				$scope.details[i].date = $("#all-date").datepicker('getDate');
				$("#date-picker-" + i).datepicker('setDate', $scope.details[i].date)
			if($scope.all_notes != "")
				$scope.details[i].note = $scope.all_notes;
		}
	};

	$scope.Back = function(){
		$window.history.back();
	};

	$scope.SaveEdit = function(){
		var isReserved = false;
 		for(i=0;i<$scope.details.length;i++){
 			if($scope.media.reserved != 1){
				$scope.details[i].status = $scope.selected_status[i].id;
 				if($scope.details[i].status != 0)
 					isReserved = true;
 			}
			$scope.details[i].date 	 = $filter('date')($("#date-picker-" + i).datepicker('getDate'),'yyyy-MM-dd HH:mm:ss');
		}
		if($scope.media.reserved != 1){
			if(isReserved == true){
				$scope.media.reserved = 2;
			}else{
				$scope.media.reserved = 0;
			}
		}
		BookService.postMediaDetailBorrow({media_type:$scope.media_type, detail:$scope.details, media:$scope.media},function(response){
			$scope.InitMediaType($scope.media_type);
			$scope.all_selected_status = $scope.status[0];
			$scope.all_notes = "";
		});
	};

	var InitCondition = function(){
		switch ($scope.media_type) {
			case 'braille':
				$scope.tableheader = ["ไอดี",'ตอนที่','สถานะ','วันแก้ไข','หมายเหตุ'];
				break;
			case 'cassette':
				$scope.tableheader = ["ไอดี",'ม้วนที่','สถานะ','วันแก้ไข','หมายเหตุ'];
				break;
			default:
				$scope.tableheader = ["ไอดี",'แผ่นที่','สถานะ','วันแก้ไข','หมายเหตุ'];
				break;
		}
		switch($scope.media.reserved){
			case 0:
				$scope.panelclass = "panel panel-success";
				break;
			case 1:
				$scope.panelclass = "panel panel-warning";
				break;
			case 2:
				$scope.panelclass = "panel panel-danger";
				break;
		}
		if($scope.media.reserved == 0)
			$scope.tr_head = "success";
		else
			$scope.tr_head = "danger";
	}

	$scope.InitMediaType = function(mediaType){
		$scope.media_type = mediaType;
		BookService.getMediaDetailBorrow({media_type:$scope.media_type},function(response){
			$scope.book 	= response.data.book;
			$scope.media 	= response.data.media[0];
			$scope.borrow 	= response.data.borrow[0];	
			$scope.details 	= response.data.detail;
			InitDatePicker();
			InitCondition();
		});
	}
});

app.directive('onFinishRender', function ($timeout) {
	return {
		restrict: 'A',
		link: function (scope, element, attr) {
			if (scope.$last === true) {
				$timeout(function () {
					scope.$emit('ngRepeatFinished');
				});
			}
		}
	}
});
