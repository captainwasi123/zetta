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

    $(document).on('click', '.addLocationBlock', function(){
        var data = '<br><div class="location-field"><input type="text" placeholder="Location" class="form-field1" name="location[]" required></div>';
        $('#location_block').append(data);
    });

    $(document).on('click', '.addServicePackage', function(){
        var data = '<tr><td>  <textarea class="table-field1" placeholder="Service" name="service_basic[]"></textarea></td><td> <textarea class="table-field1" placeholder="Service" name="service_standard[]"></textarea></td><td> <textarea class="table-field1" placeholder="Service" name="service_premium[]"></textarea></td></tr>';
        $('#package_block').before(data);
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
    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);