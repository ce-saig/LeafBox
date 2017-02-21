var app = angular.module('leafBox');

app.controller('MediaDetailEditController', function($rootScope, $scope, $filter,$uibModal, $window,DateTimeService, BookService){
	$scope.status = [	{id:0, label:"ปกติ"},
						{id:1, label:"ชำรุด"},
						{id:2, label:"รอซ่อม"},
						{id:3, label:"หาย"}
					];
	$scope.tableheader = ["ไอดี",'ตอนที่','สถานะ','วันแก้ไข','หมายเหตุ'];
	$scope.selected_status = [];
	$scope.all_date = new Date();
	$scope.all_notes= "";

	// Date Picker
	var InitDatePicker  = function(){
		$scope.all_date_popup = { opened: false };
		$scope.date_popup = [];
		for(i=0;i<$scope.details.length;i++){
			$scope.date_popup[i] = { opened: false };
			$scope.details[i].date = new Date($scope.details[i].date.substring(0,10));
		}
	};

	$scope.dateOptions = {
	    dateDisabled: Disabled,
	    formatYear: 'yy',
	    maxDate: new Date(3000, 5, 22),
	    minDate: new Date(1950, 5, 22),
	};

	function Disabled(data){
	    var date = data.date,
	    mode = data.mode;
	    return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
	}
  	// End Date Picker

	$scope.EditAll = function(){
		for(i=0;i<$scope.details.length;i++){
			if($scope.media.reserved == 0)
				$scope.selected_status[i] = $scope.all_selected_status;
			if($scope.all_date != "")
				$scope.details[i].date = $scope.all_date;
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
			$scope.details[i].date 	 = $filter('date')($scope.details[i].date,'yyyy-MM-dd HH:mm:ss');
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
			$scope.all_date = new Date();
			
		});
	};

	var InitCondition = function(){
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