var app = angular.module('leafBox');

app.controller('ReportController', function($scope,$http,$window, BookProductionService) {
	$scope.books = {};
	$scope.prods = {};
	$scope.medias = {};
	$scope.columns = {};
	$scope.item = {};
	$scope.report = {};
	$scope.can_create = false;
	$scope.book_table = true;
	$scope.loading = false;

	$scope.AutoSelect = function(index){
		if($scope.books.enabled[index] == true){
			$scope.columns.enabled[index] = true;
			$scope.books.style[index] = {'color': 'white', 'background-color': '#4d4d4d'};
		}else{
			$scope.columns.enabled[index] = false;
			$scope.books.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
		}
		if($scope.prods.enabled[index] == true){
			$scope.columns.enabled[index+7] = true;
			$scope.prods.style[index] = {'color': 'white', 'background-color': '#4d4d4d'};
			$scope.prods.model[index] = '0';
		}else{
			$scope.columns.enabled[index+7] = false;
			$scope.prods.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
			$scope.prods.model[index] = '';
		}
		
		Permission();
	}

	$scope.ChangeColor = function(index){
		if($scope.medias.enabled[index] == true){
			$scope.medias.style[index] = {'color': 'white', 'background-color': '#4d4d4d'};
		}else{
			$scope.medias.style[index] = {'color': 'grey', 'background-color': '#e6e6e6'};
		}
	}

	var Permission = function(){
		$scope.can_create = false;
		for(i=0;i<$scope.books.enabled.length;i++){
			if($scope.books.enabled[i] == true)
				$scope.can_create = true;
		}
		for(i=0;i<$scope.prods.enabled.length;i++){
			if($scope.prods.enabled[i] == true)
				$scope.can_create = true;
		}
	}

	$scope.CreateReport = function(){
		$scope.loading = true;
		var thread_media = false;
		var thread_prod = false;
		$http.post("/report/create_report_book",{book : $scope.books, prod : $scope.prods,id_mode : $scope.item.id_mode, book_id_init: $scope.item.book_id_init}).success(function(response){
			$scope.report.prod = response.prods;
			var enabled_count = response.count;
      		response = response.books;
      		if(enabled_count > 1){
	      		var data = [];
	      		var temp = [];
	      		var count = [];
	      		// set count[id] default to 0
	      		for(i=0;i<response.length;i++){
	 				for(j=0;j<response[i].length;j++){
	      				count[response[i][j].id] = 0;
	      			}
	      		}
	      		// count[id]++ when detect same book
	      		for(i=0;i<response.length;i++){
	 				for(j=0;j<response[i].length;j++){
	      				count[response[i][j].id]++;
	      			}
	      		}
	      		// push book that count[id] == enabled_count (all filter have this book)
	      		for(i=0;i<response.length;i++){
	 				for(j=0;j<response[i].length;j++){
	      				if(count[response[i][j].id] == enabled_count){
	      					temp.push(response[i][j]);
	      				}
	      			}
	      		}
	      		// delete same book
	      		data[0] = temp[0];
	      		for(i=1;i<temp.length;i++){
	 				var have = false;
	 				for(j=0;j<data.length;j++){
	      				if(data[j].id == temp[i].id){
	      					have = true;
	      				}
	      			}
	      			if(have == false){
	      				data.push(temp[i]);
	      			}
	      		}
	      	}else{
	      		data = response[0];
	      	}   
	      	$scope.report.book = data;
			$scope.hide_table = false;
      		$http.post("/report/create_report_media",{media : $scope.medias, books : data}).success(function(response){
      			$scope.report.media = response;
      			if(response.braille == null && response.cassette == null && response.daisy == null && response.cd == null && response.dvd == null){
      				$scope.hide_table = true;
      			}
      			CreateTable();
      			thread_media = true;
      			if(thread_prod == true){
      				$scope.loading = false;
      			}
    		});	
      		$http.post("/report/create_report_prod",{books : data}).success(function(response){
      			$scope.report.prod = response;
      			thread_prod = true;
				if(thread_media == true){
      				$scope.loading = false;
      			}
    		});		
	      	console.log($scope.report);
    	});		
	}

	$scope.DetailStatus = function(status){
		label = ['ปกติ', 'ชำรุด', 'รอซ่อม', 'หาย'];
		return label[status]; 
	}

	var CreateTable = function(){
		$scope.table = {};
		$scope.table.header = [];
		for(i=0;i<$scope.columns.enabled.length;i++){
			if($scope.columns.enabled[i] == true){
				$scope.table.header.push($scope.columns.label[i]);
			}
		}
	}

	$scope.ExportCSV = function(){
		$http.post("/report/export_csv",{'media':$scope.report.media}).success(function(response){
      		console.log(response);		
    	});
		
	}

	$scope.check = function(index){
	//	console.log($scope.prods.model[0]);
	}

	var SetStyle = function(){
		$scope.books.style = [];
		$scope.prods.style = [];
		$scope.medias.style = [];
		for(i=0;i<$scope.books.enabled.length;i++){
			$scope.books.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
		for(i=0;i<$scope.prods.enabled.length;i++){
			$scope.prods.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
		for(i=0;i<$scope.medias.enabled.length;i++){
			$scope.medias.style[i] = {'color': 'grey','background-color': '#e6e6e6'};
		}
	}

	var init = function(){
		$scope.BookProductionService = BookProductionService;
		$scope.books.label = ["เลขไอดี", "ชื่อหนังสือ", "ผู้แต่ง", "ผู้แปล", "ปีที่พิมพ์", "สำนักพิมพ์", "ประเภทหนังสือ"];
		$scope.books.field = ["id", "title", "author", "translate", "pub_year", "publisher", "book_type"];
		$scope.books.model = [];
		$scope.books.enabled = [false, false, false, false, false, false, false];
		$scope.prods.label = ["เบรลล์", "คาสเซ็ท", "เดซี่", "ซีดี", "ดีวีดี"];
		$scope.prods.field = ["bm_status", "setcs_status", "setds_status", "setcd_status", "setdvd_status"];
		$scope.prods.model = [];
		$scope.prods.enabled = [false, false, false, false, false];
		$scope.medias.label = ["ปกติ", "ชำรุด", "รอซ่อม", "หาย"];
		$scope.medias.model = [];
		$scope.medias.enabled = [false, false, false, false, false];
		$scope.columns.label = ["เลขไอดี", "ชื่อเรื่อง", "ผู้แต่ง", "ผู้แปล", "ปีที่พิมพ์", "สำนักพิมพ์", "ประเภทหนังสือ", "สถานะผลิตเบรลล์", "สถานะผลิตคาสเซ็ท", "สถานะผลิตเดซี่", "สถานะผลิตซีดี", "สถานะผลิตดีวีดี"];
		$scope.columns.enabled = [true, true, true, true, true, true, true, false, false, false, false, false];
		$scope.id_modes = ["=",">","<","-"];	
		$scope.media_label = ['ชื่อหนังสือ', 'ชนิดสื่อ', 'ไอดีสื่อ', 'ไอดีสื่อย่อย', 'ตอนที่', 'สถานะ'];
		SetStyle();
	}

	init();
});