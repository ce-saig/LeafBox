/*
*   This is Core Logic for Jquery on Application 
*/

$(document).ready(function() {
	userAJAX();
});

function userAJAX(){
	$('.del_user').click(function() {

		var del_url = $(this).attr('url');
		alert(del_url);
		//console.log("userId : " + userId);

		$.ajax({
			type: "POST",
			url: del_url,
			data: {}
		}).done(function(response) {
			if(response) alert('success');
		});
	});
}