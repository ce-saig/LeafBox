var app = angular.module('leafBox');

app.controller('UserController', function($scope, $rootScope,$http, $window) {
	$scope.alert_edit = "";

	$scope.Edit = function(id, name, username, email, role){
		$scope.user = {};
		$scope.user.id = id;
		$scope.user.name = name;
		$scope.user.username = username;
		$scope.user.email = email;
		$scope.user.role = role;
		$scope.user.password = "";
		$scope.user.conf_password = "";
	}

	$scope.AcceptEdit = function(){
		$scope.alert_edit = "";
		if($scope.user.password != ""){
			if($scope.user.password != $scope.user.conf_password){
				$scope.alert_edit = "รหัสผ่านใหม่กับยืนยันรหัสผ่านใหม่ของท่านไม่ตรงกัน";
			}
			if($scope.user.conf_password == ""){
				$scope.alert_edit = "กรุณาใส่ยืนยันรหัสผ่านใหม่ของท่าน";
			}	
		}
		if($scope.alert_edit == ""){
			$http.post('/user/update/'+ $scope.user.id, $scope.user).then(function(respond){
				
			});
		}
	}

});