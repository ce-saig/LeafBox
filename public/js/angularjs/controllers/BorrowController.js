var app = angular.module('leafBox');

app.controller('BorrowController', function($scope, $uibModal){
	// Date Picker
	var today = new Date();
	var InitDatePicker  = function(){
		$scope.return_date_popup = { opened: false };
		$scope.return_date = today;
		$scope.return_date.setDate($scope.return_date.getDate()+7);
	};

	$scope.dateOptions = {
	    dateDisabled: Disabled,
	    formatYear: 'yy',
	    maxDate: new Date(3000, 5, 22),
	    minDate: new Date(),
	};

	function Disabled(data){
	    var date = data.date,
	    mode = data.mode;
	    return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
	}
  	// End Date Picker
  	InitDatePicker();
});