$(document).ready(function(){
	// grid, toggle active/inactive
	$(".navigation_active").live('click', function(){
		var str = $(this).html();
		var $this = $(this);
		$.ajax({
			url: $(this).attr('target'),
			dataType: 'json',
			success: function(response){					
				if(str == 'Active'){
					str = 'Inactive';
				}else{
					str = 'Active';
				}
				if(response.success){
					$this.html(str);
				}
			}
		});
	});
					
    // check
	adjust_component_view();
	//Penyuluh
	$("#field-beasiswa-false").click(function(){
		adjust_component_view();
	});
	$("#field-beasiswa-true").click(function(){
		adjust_component_view();
	});
});

function adjust_component_view(){
    // plhSerKom
	var active = $("#field-beasiswa-true").is(':checked');
	if(active){
		$("div#lama_studi_field_box").show();
		$("div#rekomendasi_field_box").show();
	}else{
		$("div#lama_studi_field_box").hide();
		$("div#rekomendasi_field_box").hide();
	}
}
// JavaScript Document