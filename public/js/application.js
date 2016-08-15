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
	var data_offset = 0	;
	var object_count = 0;
	// hide pagination controller until user have search
	$('.search_next').hide();
	$('.search_previous').hide();

	//ajax search menu
	$('.search_submit').click(function() {
		genereate_search_result(data_offset);
		hide_button();
	});

	// User can press enter instead of click submit button
	$(document).keypress(function(e) {
		if(e.which == 13) {
				genereate_search_result();
		}
	});

	// function for checking paginate status is already be last or not ?
	function check_left_most(){
		if(data_offset+6 < object_count) return true;
		return false;
	}

	function check_right_most(){
		if(data_offset >= 6) return true;
		return false;
	}

	function hide_button(){
		// hide paginate controller if user already reached the last chuck of result.
		if(!check_right_most()){
			$('.search_previous').hide();
		}
		if(!check_left_most()){
			$('.search_next').hide();
		}
	}

	function genereate_search_result(data_offset) {
		//get data form form
		var search_val = $('#search_value').val();
		var search_type = $('#search_type').val();

		var post_path = $('.search_submit').attr('post-path');
		var card_path = $('#search-info').attr('card-link-path');

		// post ajax for get specific information
		$.ajax({
			type: "post",
			url: post_path,
			data: { search_type : search_type, search_value : search_val, data_offset : data_offset }
		}).done(function(response) {
			if(response[0] != undefined){
				// show paginate controller
				$('.search_next').show();
				$('.search_previous').show();
				// initialize paginate count
				if(object_count == 0)object_count = response[1];
				cardGenerate(response[0], card_path);
			}
		});
	}

	$('.search_next').click(function() {
		if(check_left_most()){
			data_offset += 6;
			genereate_search_result(data_offset);
			hide_button();
		}
	});

	$('.search_previous').click(function() {
		if(check_right_most()){
			data_offset -= 6;
			genereate_search_result(data_offset);
			hide_button();
		}
	});

	function cardGenerate(input_response, card_path) {
		var response = input_response
		var mediatype = ['เบรลล์', 'คาสเซ็ท', 'DVD', 'CD', 'Daisy'];
		var status_attr_type = ['bm_status','setcs_status','setdvd_status','setcd_status','setds_status'];
		$('.search_result').text('');

		// empty response
		if(response[0] == undefined){
			$('.search_result').append('<div class="alert alert-warning" role="alert">ไม่มีข้อมูลของหนังสือนี้ กรุณากรอกใหม่</div>');
			return
		}

		//append to node
		for(var i = 0;i < response.length; i++){
			//console.log(response[i].title);
			var id_book = response[i].id;
			var wrapper = $('<div class = "col-sm-4"></div>');
			var link_wrapper = $('<a></a>');
			link_wrapper.attr('href',card_path+'/'+id_book);

			var panel_wrapper = $('<div></div>').addClass('panel-hover panel panel-default');
			panel_wrapper.attr('style','display: none;');
			panel_wrapper.attr('style', 'margin-bottom:20px;');
			/* fixed height for good alignment. */
			panel_wrapper.attr('style', 'height: 150px;');
			var panel_header = $('<div></div>').addClass('panel-heading');
			panel_header.text( response[i].id + '.'+response[i].title +' - ' + response[i].author +' ('+response[i].pub_year+')');
			var panel_body = $('<div></div>').addClass('panel-body');
			var panel_body_inner = $('<div></div>').addClass('label-status');
			// TODO ********** : badge status node !!

			var outer_badge  = $('<div></div>').addClass('label-status');

			panel_wrapper.append(panel_header).append(panel_body);
			panel_body.append(panel_body_inner);

			for(label in mediatype){
				var badge = $('<div></div>').addClass('col-sm-6');
				badge.text(mediatype[label]);
				// console.log("response = " + response[i][status_attr_type]);
				// console.log("badge status = " + response[i][status_attr_type[label]] );
				var badgetag = badgeGenerator(response[i][status_attr_type[label]], mediatype[label]);
				// console.log(badgetag);
				badge.append(badgetag);
				outer_badge.append(badge);
			}


			panel_body.append(outer_badge);
			panel_wrapper.show('fast');
			link_wrapper.append(panel_wrapper);
			wrapper.append(link_wrapper);
			var row_div = $('<div></div>').addClass('row');
			row_div.append(wrapper);
			$('.search_result').append(wrapper);
		}
	}

	function badgeGenerator(status, label) {
		console.log(status + " " + label);
		if(status == 0){
			return '<span class="label label-warning">ไม่ผลิต</span>';
		}else if(status == 1){
			return '<span class="label label-success">ผลิต</span>';
		}
		else if((status == 2 && label == 'เบรลล์') || status == 3){
			return '<span class="label label-info">กำลังผลิต</span>';
		}
		else{
			return '<span class="label label-info">จองอ่าน</span>';
		}
	}
});
