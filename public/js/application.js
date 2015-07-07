/*
*   This is Core Logic for Jquery on Application
*/

$(document).ready(function() {
	userAJAX();
});

function userAJAX(){
	$('.del_user').click(function() {
		var c = confirm("คุณต้องการจะลบจริงๆหรือไม่");
		if (c == true){
				var del_url = $(this).attr('url');
				var user_id = $(this).attr('user-id');

				$.ajax({
					type: "POST",
					url: del_url,
					data: {}
				}).done(function(response) {
					if(response) {
						$('#'+user_id).remove();
					}
				});

		}
	});
}
