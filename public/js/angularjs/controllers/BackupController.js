var app = angular.module('leafBox');

app.controller('BackupController', function($scope,$http,$window) {
	$scope.hello = "hello";
	$scope.temp_sel = "NONE";
	$scope.canRestore = true;
	$scope.loading = false;

	var PermissionRestore = function(){
		for(i=0;i<$scope.select.length;i++){
			if($scope.select[i].value == 1){
				$scope.canRestore = false;
				i = $scope.files.length;
			}else{
				$scope.canRestore = true;
			}
		}
	}

	$scope.Selecting = function(index){
		$scope.select = [];
		for(i=0;i<$scope.files.length;i++){
			$scope.select[i] = {};
			if(index == i && $scope.temp_sel != i){
				$scope.select[i].value = 1;
				$scope.select[i].class = "glyphicon glyphicon-check";
				$scope.select[i].style = {'background-color': '#4d4d4d','color': 'white'};
				$scope.temp_sel = i;
			}else{
				$scope.select[i].value = 0;
				$scope.select[i].class = "glyphicon glyphicon-unchecked";
				$scope.select[i].style = {};
				if($scope.temp_sel == i){
					$scope.temp_sel = "NONE";
				}
			}
		}
		PermissionRestore();
	}

	$scope.DeleteFile = function(){
		$http.post("/php/Delete.php",{file:$scope.files[$scope.temp_sel].file}).success(function(data){
    		$scope.Init();
    	});
	}

	$scope.Backup = function(){
		$http.get("/php/Backup.php").success(function(data){
    		$scope.Init();
    	});
	}

	$scope.Restore = function(){
		$scope.loading = true;
		$http.post("/php/Restore.php",{file:$scope.files[$scope.temp_sel].file, used: $scope.used_file}).success(function(data){
      		$scope.Init();
      		$scope.loading =false;
    	});
	}

	$scope.Init = function(){
		$http.get("/php/Files.php").success(function(data){
      		$scope.files = [];
      		$scope.used_file == null;
      		var today = new Date();
      		var last_date = new Date(data[2].substring(1,5)+'/'+data[2].substring(6,8)+'/'+data[2].substring(9,11));
      		for(i=0;i<data.length-2;i++){
      			$scope.files[i] = {};
      			$scope.files[i].file = data[i+2];
      			$scope.files[i].date = data[i+2].substring(9,11)+' / '+data[i+2].substring(6,8)+' / '+data[i+2].substring(1,5);
      			$scope.files[i].time = data[i+2].substring(13,15)+' : '+data[i+2].substring(16,18)+" : "+data[i+2].substring(19,21);
      			if($scope.files[i].file.indexOf('_used') > 0){
      				$scope.used_file = $scope.files[i].file;
      			}
      			var date = new Date(data[i+2].substring(1,5)+'/'+data[i+2].substring(6,8)+'/'+data[i+2].substring(9,11) +" "+data[i+2].substring(13,15)+':'+data[i+2].substring(16,18)+":"+data[i+2].substring(19,21) );
      			if(last_date < date){
      				last_date = date;
      			}
      		}
      		last_date.setDate(last_date.getDate()+7);   		
      		if(today >= last_date){
      			$scope.Backup();
      		}
			$scope.Selecting("NONE");
    	});
	}
	$scope.Init();
});