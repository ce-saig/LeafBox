var app = angular.module('leafBox');

app.factory('DateTimeService', function($filter){
	return {
		convertToSQLFormat: function(date, includeTime = false) {
			if(typeof date == 'string')
				date = new Date(date);
			date = $filter('date')(date, "dd/mm/yyyy") + " 00:00:00";
			return date;
		},
		convertToNormalFormat: function(date, includeTime = false) {
			if(typeof date == 'string')
				date = new Date(date);
/*			sec = date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds();
			min = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
			hour = date.getHours() < 10 ? '0' + date.getHours() : date.getHours();
			day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
			month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
			year = date.getFullYear();

*/		
			date = date.toISOString();
			if(includeTime)
				return date.substring(0,10) + ' 00:00:00';
		//		return '' + day + '-' + month + '-' + year + ' ' + hour + ':' + min + ':' + sec;
		//	return '' + day + '-' + month + '-' + year;
			return date.substring(0,10);
		}
	}
});