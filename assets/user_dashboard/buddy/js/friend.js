var host = $("meta[name='host']").attr("content");

$(document).ready(function(){

	'use strict'

	$(document).on('keyup', '#userSearch', function(){
		var val = $(this).val();

		$.get(host+"/friends/search/"+val, function(data){
	    	$('#userSearchResult').html(data);
	  	});
	});
});