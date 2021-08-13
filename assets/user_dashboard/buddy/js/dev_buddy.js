var host = '';


$(document).ready(function(){

    'use strict'

    host = $("meta[name='host']").attr("content");


    $('#imageUpload').change(function() {
      $('#profile_form').submit();
    });


    $('input[name="participants"]').change(function() {
        var data = '<input type="text" value="1" name="group_members" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" required>';
        if (this.value == '0') {
            $('#participants_block').html('');
        }
        else if (this.value == '1') {
            $('#participants_block').html(data);
            $("input[name='group_members']").TouchSpin();
        }
    });

    $('input[name="activityType"]').change(function() {
        var data = '<div class="col-md-3 col-lg-3 col-12"><div class="field-name"><img src="'+host+'/../assets/user_dashboard/buddy/images/field-icon10.png"><h5> Friend Name </h5></div></div><div class="col-md-6 col-lg-6 col-12"><input type="text" placeholder="" class="form-field1" name=""></div>';
        if (this.value == '1') {
            $('#friend_block').html('');
        }
        else if (this.value == '2') {
            $('#friend_block').html(data);
        }
    });

    $(document).on('click', '.addLocationBlock', function(){
        var data = '<br><div class="location-field"><input type="text" placeholder="Location" class="form-field1" name="location[]" required></div>';
        $('#location_block').append(data);
    });

    $(document).on('change', '#id_proof_field', function(){
        $('#id_proof_form').submit();
    });

    $(document).on('change', '#add_proof_field', function(){
        $('#add_proof_form').submit();
    });

    $(document).on('click', '.coach-request', function(){
        $('#coach-request-model').modal('show');
    });

    $(document).on('click','.removeLng',function(){
        var id = $(this).data('id');

        if(confirm('Are you sure want to delete this?')){
            window.location.href = host+"/my-account/remove_lang/"+id;
        }
    });

    $(document).on('click','.removeEdu',function(){
        var id = $(this).data('id');

        if(confirm('Are you sure want to delete this?')){
            window.location.href = host+"/my-account/remove_edu/"+id;
        }
    });

    $(document).on('click','.removeCert',function(){
        var id = $(this).data('id');

        if(confirm('Are you sure want to delete this?')){
            window.location.href = host+"/my-account/remove_certificate/"+id;
        }
    });

});


!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples
    SweetAlert.prototype.init = function() {

      $(document).on('click', '.deleteItem', function(){
        var href = $(this).data('href');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                window.location.href = href;
            } else {
                swal("Cancelled", "Your record is safe :)", "error");
            }
        });
      });

      $(document).on('click', '.addFriend', function(){
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "You want this user as friend.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#994afe",
            confirmButtonText: "Yes, Add Friend!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                window.location.href = host+"/friends/add/"+id;
            } else {
            }
        });
      });

      $(document).on('click', '.removeFriend', function(){
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "You want to remove this from friendlist.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#994afe",
            confirmButtonText: "Yes, Remove Friend!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                window.location.href = host+"/friends/remove/"+id;
            } else {
            }
        });
      });
    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);
