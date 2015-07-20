/*
*   This is Core Logic for Jquery on Application
*/

/*
########### User #############
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

/*
########### Search #############
*/
$(document).ready(function() {
	//ajax search menu
	$('.search_submit').click(function() {
		genereate_search_result();
	});

	// User can press enter instead of click submit button
	$(document).keypress(function(e) {
		if(e.which == 13) {
				genereate_search_result();
		}
	});

	function genereate_search_result() {
		//get data form form
		var search_val = $('#search_value').val();
		var search_type = $('#search_type').val();

		var post_path = $('.search_submit').attr('post-path');
		var card_path = $('#search-info').attr('card-link-path');

		// post ajax for get specific information
		$.ajax({
			type: "post",
			url: post_path,
			data: { search_type : search_type, search_value : search_val }
		}).done(function(response) {
			cardGenerate(response, card_path);
		});
	}

	function cardGenerate(response, card_path) {

		var mediatype = ['เบลล์ ', 'คาสเซ็ท ', 'DVD ', 'CD ', 'Daisy '];
		var status_attr_type = ['bm_status','setcm_status','setdvd_status','setcd_status','setdm_status'];
		console.log(response);
		$('.search_result').text('');

		// empty response
		if(response[0] == undefined){
			$('.search_result').append('<div class="alert alert-warning" role="alert">ไม่มีข้อมูลของหนังสือนี้ กรุณากรอกใหม่</div>');
			return
		}

		//append to node
		for(var i = 0;i < response.length; i++){
			console.log(response[i].title);
			var id_book = response[i].id;
			var wrapper = $('<div class = "col-md-4"></div>');
			var link_wrapper = $('<a></a>');
			link_wrapper.attr('href',card_path+'/'+id_book);

			var panel_wrapper = $('<div></div>').addClass('panel-hover panel panel-default');
			panel_wrapper.attr('style','display: none;');
			panel_wrapper.attr('style', 'margin-bottom:20px;');
			var panel_header = $('<div></div>').addClass('panel-heading');
			panel_header.text( response[i].id + '.'+response[i].title +' - ' + response[i].author +' ('+response[i].pub_year+')');
			var panel_body = $('<div></div>').addClass('panel-body');
			var panel_body_inner = $('<div></div>').addClass('label-status');
			// TODO ********** : badge status node !!

			var outer_badge  = $('<div></div>').addClass('label-status');

			panel_wrapper.append(panel_header).append(panel_body);
			panel_body.append(panel_body_inner);

			for(label in mediatype){
				var badge = $('<div></div>').addClass('col-md-6');
				badge.text(mediatype[label]);
				console.log("badge status = " + response[i][status_attr_type[label]] );
				var badgetag = badgeGenerator(response[i][status_attr_type[label]]);
				console.log(badgetag);
				badge.append(badgetag);
				outer_badge.append(badge);
			}


			panel_body.append(outer_badge);
			panel_wrapper.show('fast');
			link_wrapper.append(panel_wrapper);
			wrapper.append(link_wrapper);
			$('.search_result').append(wrapper);

		}
	}

	function badgeGenerator(status) {

			if(status == 0){
				return '<span class="label label-danger">ไม่ทำการผลิต</span>';
			}else if(status == 1){
				return '<span class="label label-success">ผลิตเสร็จ</span>';
			}else if(status == 2){
				return '<span class="label label-warning">รอการผลิต</span>';
			}else if(status == 3){
				return '<span class="label label-info">กำลังอ่าน</span>';
			}else{
				return '<span class="label label-warning">ข้อมูลไม่ถูกต้อง</span>';
			}
	}
});
