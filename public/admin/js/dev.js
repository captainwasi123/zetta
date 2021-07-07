$(document).ready(function(){
	'use strict'
	var host = $("meta[name='host']").attr("content");


	//Settings

		//Accommodation

			//Property Type
				$(document).on('click', '.editType', function(){
					var id = $(this).data('id');
					$('#editType-modal').modal('show');
					$('#editType_content').html('<br><br><br><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><br><br><br>');
					
					$.get( host+"/settings/accommodation/editPropertyType/"+id, function( data ) {
					  $('#editType_content').html(data);
					});
				});

				$(document).on('click', '.deleteType', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to delete this.?')){
						window.location.href = host+"/settings/accommodation/deletePropertyType/"+id;
					}
				});

			//Amenities
				$(document).on('click', '.editAmenity', function(){
					var id = $(this).data('id');
					$('#editAmenity-modal').modal('show');
					$('#editAmenity_content').html('<br><br><br><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><br><br><br>');
					
					$.get( host+"/settings/accommodation/editAmenities/"+id, function( data ) {
					  $('#editAmenity_content').html(data);
					});
				});

				$(document).on('click', '.deleteAmenity', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to delete this.?')){
						window.location.href = host+"/settings/accommodation/deleteAmenities/"+id;
					}
				});

		//Collectibles
			//Categories
				$(document).on('click', '.editCat', function(){
					var id = $(this).data('id');
					$('#editCat-modal').modal('show');
					$('#editCat_content').html('<br><br><br><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><br><br><br>');
					
					$.get( host+"/settings/collectibles/editCategory/"+id, function( data ) {
					  $('#editCat_content').html(data);
					});
				});
				$(document).on('click', '.deleteCat', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to delete this.? This action will delete connected sub categories.')){
						window.location.href = host+"/settings/collectibles/deleteCategory/"+id;
					}
				});

			//Sub Categories
				$(document).on('click', '.editSubCat', function(){
					var id = $(this).data('id');
					$('#editSubCat-modal').modal('show');
					$('#editSubCat_content').html('<br><br><br><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><br><br><br>');
					
					$.get( host+"/settings/collectibles/editSubCategory/"+id, function( data ) {
					  $('#editSubCat_content').html(data);
					});
				});
				$(document).on('click', '.deleteSubCat', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to delete this.?')){
						window.location.href = host+"/settings/collectibles/deleteSubCategory/"+id;
					}
				});

		//Art & Portrait Customization
			//Categories
				$(document).on('click', '.editCatArt', function(){
					var id = $(this).data('id');
					$('#editCat-modal').modal('show');
					$('#editCat_content').html('<br><br><br><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><br><br><br>');
					
					$.get( host+"/settings/art/editCategory/"+id, function( data ) {
					  $('#editCat_content').html(data);
					});
				});
				$(document).on('click', '.deleteCatArt', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to delete this.?')){
						window.location.href = host+"/settings/art/deleteCategory/"+id;
					}
				});

			//Portrait Type
				$(document).on('click', '.editPortraitType', function(){
					var id = $(this).data('id');
					$('#editCat-modal').modal('show');
					$('#editCat_content').html('<br><br><br><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><br><br><br>');
					
					$.get( host+"/settings/art/editPortraitType/"+id, function( data ) {
					  $('#editCat_content').html(data);
					});
				});
				$(document).on('click', '.deletePortraitType', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to delete this.?')){
						window.location.href = host+"/settings/art/deletePortraitType/"+id;
					}
				});
				


	//Accommodation
		//Listing

			//Approve
				$(document).on('click', '.listingApprove', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to approve this.?')){
						window.location.href = host+"/accommodation/listing/approve/"+id;
					}
				});

			//Reject
				$(document).on('click', '.listingReject', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to reject this.?')){
						window.location.href = host+"/accommodation/listing/reject/"+id;
					}
				});


		//Members

			//Approve
				$(document).on('click', '.memberApprove', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to approve this.?')){
						window.location.href = host+"/accommodation/members/approve/"+id;
					}
				});

			//Reject
				$(document).on('click', '.memberReject', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to reject this.?')){
						window.location.href = host+"/accommodation/members/reject/"+id;
					}
				});

			//Block
				$(document).on('click', '.memberBlock', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to Block this.?')){
						window.location.href = host+"/accommodation/members/block/"+id;
					}
				});
		//Inquiries
			$(document).on('click', '.openInquiry', function(){
				var id = $(this).data('id');
				$('#inquiryDetail-modal').modal('show');
				$.get( host+"/accommodation/inquiries/open/"+id, function( data ) {
				  $('#inquiry_block').html(data);
				});
			});


	//Collectibles
		//Add Product
			$(document).on('change', '#catSelect', function(){
				var id = $(this).val();
				$('#subCatSelect').html('<option value="">...</option>');
				
				$.get( host+"/collectibles/products/getSubCategory/"+id, function( data ) {
				  $('#subCatSelect').html(data);
				});
			});


		//Products un-Publish
			$(document).on('click', '.unPublishProduct', function(){
				var id = $(this).data('id');
				if(confirm('Are you sure want to un-publish this?')){
					window.location.href =	host+"/collectibles/products/unPublish/"+id;
				}
			});

		//Products Publish
			$(document).on('click', '.publishProduct', function(){
				var id = $(this).data('id');
				if(confirm('Are you sure want to publish this?')){
					window.location.href =	host+"/collectibles/products/publish/"+id;
				}
			});

		//Sales
			//Number of Orders
			$.get( host+"/collectibles/sales/orderBadge", function( data ) {
			  $('#newOrders_badge').html(data);
			});

			//Process
				$(document).on('click', '.deliverSale', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to deliver this.?')){
						window.location.href = host+"/collectibles/sales/deliver/"+id;
					}
				});	




	//Art & Portrait Customization

		//Members

			//Approve
				$(document).on('click', '.memberApproveArt', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to approve this.?')){
						window.location.href = host+"/art/members/approve/"+id;
					}
				});

			//Reject
				$(document).on('click', '.memberRejectArt', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to reject this.?')){
						window.location.href = host+"/art/members/reject/"+id;
					}
				});

			//Block
				$(document).on('click', '.memberBlockArt', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to Block this.?')){
						window.location.href = host+"/art/members/block/"+id;
					}
				});

		//Products
			//Approve
				$(document).on('click', '.productApproveArt', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to approve this.?')){
						window.location.href = host+"/art/product/approve/"+id;
					}
				});

			//Reject
				$(document).on('click', '.productRejectArt', function(){
					var id = $(this).data('id');
					
					if(confirm('Are you sure want to reject this.?')){
						window.location.href = host+"/art/product/reject/"+id;
					}
				});
});