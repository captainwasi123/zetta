$(document).ready(function(){
	'use strict'
	var host = $("meta[name='host']").attr("content");



	//Users
		$(document).on('click', '.blockUser', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to block this user?')){
				window.location.href = host+"/users/block/"+id;
			}
		});
		$(document).on('click', '.activeUser', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to activate this user?')){
				window.location.href = host+"/users/activate/"+id;
			}
		});


		$(document).on('click', '.approveIDProof', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to approve this?')){
				window.location.href = host+"/users/idProof/approve/"+id;
			}
		});
		$(document).on('click', '.rejectIDProof', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to reject this?')){
				window.location.href = host+"/users/idProof/reject/"+id;
			}
		});

		$(document).on('click', '.approveAddProof', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to approve this?')){
				window.location.href = host+"/users/addProof/approve/"+id;
			}
		});
		$(document).on('click', '.rejectAddProof', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to reject this?')){
				window.location.href = host+"/users/addProof/reject/"+id;
			}
		});


	//Lessons
		$(document).on('click', '.blockLesson', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to block this lesson?')){
				window.location.href = host+"/lessons/block/"+id;
			}
		});
		$(document).on('click', '.activeLesson', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to activate this lesson?')){
				window.location.href = host+"/lessons/activate/"+id;
			}
		});


	//Activity
		$(document).on('click', '.blockActivity', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to block this activity?')){
				window.location.href = host+"/activities/block/"+id;
			}
		});
		$(document).on('click', '.activeActivity', function(){
			var id = $(this).data('id');
			
			if(confirm('Are you sure want to activate this activity?')){
				window.location.href = host+"/activities/activate/"+id;
			}
		});


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