var app = angular.module('leafBox');

app.controller('BookEditController', function($rootScope, $scope, $filter, $uibModal, $log, $window, $routeParams, $http, DateTimeService, BookService, BookProductionService) {
	$scope.book;
	$scope.date = {};
	$scope.master_text;
	$scope.type;

	$scope.SelectMaster = function(){
		$scope.BookService.getMaster(function(response){
			$scope.master_list = response.data;
			console.log(response.data);
			switch($scope.prod_select){
				case $scope.products.string[0]: $scope.type = 'braille';	$scope.master_prod = $scope.master_list['product_b'];	break;
				case $scope.products.string[1]: $scope.type = 'cassette';	$scope.master_prod = $scope.master_list['product_c'];	break;
				case $scope.products.string[2]: $scope.type = 'daisy';		$scope.master_prod = $scope.master_list['product_d'];	break;
				case $scope.products.string[3]: $scope.type = 'cd';			$scope.master_prod = $scope.master_list['product_cd'];	break;
				case $scope.products.string[4]: $scope.type = 'dvd';		$scope.master_prod = $scope.master_list['product_dvd'];	break;
			}
			$scope.master = $scope.master_list[$scope.type][0];
			if($scope.master_prod != null){
				$scope.master_prod.finish_date = new Date($scope.master_prod.finish_date);		
			}

			if($scope.master === undefined){
				$scope.no_master = true;
			}else{
				$scope.no_master = false;
				$scope.master_text = $scope.master.id;
				if($scope.master.original_no != null){
					$scope.master_text += '('+$scope.master.original_no+')'; 	
				}
			}
			$scope.select_master = $scope.master;

			$scope.BookService.getMediaByType({media_type:$scope.type},function(response){
				$scope.media_list = response.data; 
				console.log(response.data);
				for(i=0;i<$scope.media_list.length;i++){
					$scope.media_list[i].text = $scope.media_list[i].id;
					if($scope.media_list[i].original_no != null){
						$scope.media_list[i].text += '('+$scope.media_list[i].original_no+')';
					}
				}
			});

		});	
	}

	$scope.ChangeMaster = function(){
		console.log($scope.select_master);
		console.log($scope.master);
		if($scope.master === undefined){
			m_id = 0; 
		}else
			m_id = $scope.master.id;
		$scope.BookService.changeMaster({media_type:$scope.type, old_id:m_id, new_id:$scope.select_master.id},function(response){
			$scope.SelectMaster();
			console.log(response);
		});
	}

	var SetVariables = function(mode){
		if(mode == "GET"){
			$scope.numbers = {
				string:["เลขลำดับหนังสือ","เลขลำดับเบรลล์","เลขลำดับคาสเส็ท","เลขลำดับเดซี่","เลขลำดับซีดี","เลขลำดับดีวีดี"],
				var: [$scope.book.number,$scope.book.b_no,$scope.book.c_no,$scope.book.d_no,$scope.book.cd_no,$scope.book.dvd_no] 
			};
			$scope.details = {
				string:["เลขไอดีเดิม","ชื่อเรื่อง","ชื่อเรื่อง (อังกฤษ)","ประเภทหนังสือ","หนังสือระดับ","ผู้แต่ง","ผู้แปล","ISBN","เลขทะเบียนผลิต"],
				var: [$scope.book.original_no,$scope.book.title,$scope.book.title_eng,$scope.book.book_type,$scope.book.grade,$scope.book.author,$scope.book.translate,$scope.book.isbn,$scope.book.produce_no] 
			};
			$scope.products = {
				string:["เบรลล์","คาสเส็ท","เดซี่","ซีดี","ดีวีดี"],
			};
		}else{
			$scope.book.number		= $scope.numbers.var[0];
			$scope.book.b_no		= $scope.numbers.var[1];
			$scope.book.c_no 		= $scope.numbers.var[2];
			$scope.book.d_no 		= $scope.numbers.var[3];
			$scope.book.cd_no 		= $scope.numbers.var[4];
			$scope.book.dvd_no 		= $scope.numbers.var[5];
			$scope.book.original_no = $scope.details.var[0];
			$scope.book.title 		= $scope.details.var[1];
			$scope.book.title_eng	= $scope.details.var[2];
			$scope.book.book_type	= $scope.details.var[3];
			$scope.book.grade		= $scope.details.var[4];
			$scope.book.author		= $scope.details.var[5];
			$scope.book.translate 	= $scope.details.var[6];
			$scope.book.isbn 		= $scope.details.var[7];
			$scope.book.produce_no	= $scope.details.var[8];
		}

	}

	$scope.EditBook = function(){
		$scope.book.regis_date = $("#datepicker").datepicker('getDate')
		$scope.book.pub_year -= 543
		$scope.book.regis_date = $filter('date')($scope.book.regis_date,'yyyy-MM-dd HH:mm:ss');
		if($scope.master_prod != null){
			$scope.master_prod.finish_date = $("#datepickerProd").datepicker('getDate')
			$scope.master_prod.finish_date = $filter('date')($scope.master_prod.finish_date,'yyyy-MM-dd HH:mm:ss');
		}
		SetVariables("POST");
		if($scope.master_prod != null){
			$scope.book.prod_date = $scope.master_prod.finish_date;
			$scope.book.prod_id = $scope.master_prod.id;
		}else{
			$scope.book.prod_date = "0000-00-00 00:00:00";
			$scope.book.prod_id = 0;
		}
		BookService.editBookByID($scope.book,function(){
			$window.location.href = '/book/'+$rootScope.selected_book_id +'/';
		});
	};

	// Date Picker
	var InitDatePicker  = function(){
		$scope.regis_date_popup = { opened: false };
		$scope.master_date_popup = { opened: false };
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

	var init = function() {
		$scope.DateTimeService = DateTimeService;
		$scope.BookService = BookService;
		$scope.BookProductionService = BookProductionService;

		BookService.getBookByID(function(response) {
			$scope.book = response.data;
			$("#datepicker").datepicker({ language:'th-th', format: 'dd/mm/yyyy', isBuddhist: true});
			$("#datepickerProd").datepicker({ language:'th-th', format: 'dd/mm/yyyy', isBuddhist: true});
			$("#datepicker").datepicker('setDate', new Date($scope.book.regis_date.substring(0, 10)))
			if ($scope.master_prod) {
				$("#datepickerProd").datepicker('setDate', new Date($scope.master_prod.finish_date))
			}
			$scope.book.pub_year += 543 
			console.log(response);
			SetVariables("GET");
			$scope.SelectMaster();
			InitDatePicker();
		});
	};

	init();
});