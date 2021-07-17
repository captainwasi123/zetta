$(document).ready(function(){
	'use strict'
	var host = $("meta[name='host']").attr("content");

	//Settings
		//Sports Categories
			$(document).on('click', '.deleteCat', function(){
				var id = $(this).data('id');
				
				if(confirm('Are you sure want to delete this.?')){
					window.location.href = host+"/settings/category/delete/"+id;
				}
			});
			$(document).on('click', '.deleteCatRequest', function(){
				var id = $(this).data('id');
				
				if(confirm('Are you sure want to delete this.?')){
					window.location.href = host+"/settings/category/request/delete/"+id;
				}
			});
});