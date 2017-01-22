var app = angular.module('leafBox');

app.controller('ReportController', function($scope,$http,$window, BookProductionService) {
	$scope.books = {};
	$scope.prods = {};
	$scope.medias = {};
	$scope.columns = {};
	$scope.item = {};
	$scope.report = {};

	$scope.AutoSelect = function(index){
		if($scope.books.enabled[index] == true){
			$scope.columns.enabled[index] = true;
			$scope.books.style[index] = {'background-color': '#00cc44'};
		}else{
			$scope.columns.enabled[index] = false;
			$scope.books.style[index] = {'background-color': '#cccccc'};
		}
		if($scope.prods.enabled[index] == true){
			$scope.columns.enabled[index+7] = true;
			$scope.prods.style[index] = {'background-color': '#00cc44'};
		}else{
			$scope.columns.enabled[index+7] = false;
			$scope.prods.style[index] = {'background-color': '#cccccc'};
		}
	}

	$scope.ChangeColor = function(index){
		if($scope.medias.enabled[index] == true){
			$scope.medias.style[index] = {'background-color': '#00cc44'};
		}else{
			$scope.medias.style[index] = {'background-color': '#cccccc'};
		}
	}

	$scope.CreateReport = function(){
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
	      		data = response;
	      	}   
	      	$scope.report.book = data;
      		$http.post("/report/create_report_media",{media : $scope.medias, books : data}).success(function(response){
      			$scope.report.media = response;
      			console.log($scope.report);
    		});	
    	});		
	}

	$scope.check = function(index){
		console.log($scope.prods.model[0]);
	}

	var SetStyle = function(){
		$scope.books.style = [];
		$scope.prods.style = [];
		$scope.medias.style = [];
		for(i=0;i<$scope.books.enabled.length;i++){
			$scope.books.style[i] = {'color': '#333333','background-color': '#cccccc'};
		}
		for(i=0;i<$scope.prods.enabled.length;i++){
			$scope.prods.style[i] = {'color': '#333333','background-color': '#cccccc'};
		}
		for(i=0;i<$scope.medias.enabled.length;i++){
			$scope.medias.style[i] = {'color': '#333333','background-color': '#cccccc'};
		}
	}

	var init = function(){
		$scope.BookProductionService = BookProductionService;
		$scope.books.label = ["เลขไอดี", "ชื่อหนังสือ", "ผู้แต่ง", "ผู้แปล", "ปีที่พิมพ์", "สำนักพิมพ์", "ประเภทหนังสือ"];
		$scope.books.field = ["id", "title", "author", "translate", "pub_year", "publisher", "book_type"];
		$scope.books.model = [];
		$scope.books.enabled = [false, false, false, false, false, false, false];
		$scope.prods.label = ["เบรลล์", "คาสเซ็ท", "เดซี่", "ซีดี", "ดีวีดี"];
		$scope.prods.model = [];
		$scope.prods.enabled = [false, false, false, false, false];
		$scope.medias.label = ["ปกติ", "ชำรุด", "รอซ่อม", "หาย"];
		$scope.medias.model = [];
		$scope.medias.enabled = [false, false, false, false, false];
		$scope.columns.label = ["เลขไอดี", "ชื่อเรื่อง", "ผู้แต่ง", "ผู้แปล", "ปีที่พิมพ์", "สำนักพิมพ์", "ประเภทหนังสือ", "สถานะผลิตเบรลล์", "สถานะผลิตคาสเซ็ท", "สถานะผลิตเดซี่", "สถานะผลิตซีดี", "สถานะผลิตดีวีดี"];
		$scope.columns.enabled = [false, false, false, false, false, false, false, false, false, false, false, false];
		$scope.id_modes = ["=",">","<","-"];
		SetStyle();
	}

	init();
});