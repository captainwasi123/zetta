var host = '';


$(document).ready(function(){

    'use strict'

    host = $("meta[name='host']").attr("content");


    $('#imageUpload').change(function() {
      $('#profile_form').submit();
    });
// 



$('.searchForm').submit(function(event) {
    event.preventDefault(); 
    
    var $form = $(this);
    var values = getFormData($form);

    if(values['country'] == ''){
        alert('Please enter the valid address!');
    }else{
        $(this).unbind('submit').submit();
    }

});

    $(document).on('click', '.fav_act', function() {
         var id = $(this).data('id');
        var element = $(this);
        $.get(host + "/activity/add/" + id, function(data) {
            if (data == '1') {
              $(element).html('<i class="fa fa-heart col-purple"></i>');
            } else  {

                $(element).html('<i class="far fa-heart col-purple"></i>');;

            }
        });

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

    $(document).on('click', '.deleteItem', function(){
        var href = $(this).data('href');
        swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this record.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
           if (result.isConfirmed) {
               window.location.href = href;
           }else{
            swal.close()
           }
         });
      });


    
var kerywordss = [
                     'Ski',
                     'Snowboard',
                     'Dog Sledding',
                     'Snow Shoeing',
                     'Ice Climbing',
                     'Snowcat Tours',
                     'Ski Biking',
                     'Ice Skating',
                     'Mountaineering',
                     'Paragliding',
                     'Ski Joëring',
                     'Speed Skating',
                     'Ice driving',
                     'Ski Touring',
                     'Snow Tubing',
                     'Under Ice Diving',
                     'Sledging',
                     'Snowmobiling',
                     'Relaxing in the Spa',
                     'Winter Segway Rides',
                     'Luge/Wok Racing',
                     'Ice Fishing',
                     'Apres - ski',
                     'Slopestyle Snowboarding',
                     'Skeleton',
                     'Curling',
                     'Bobsled',
                     'Nordic Combined',
                     'Ski Jumping',
                     'Ice Hockey',
                     'Figure Skating',
                     'Alpine Skiing',
                     'Alpine Snowboarding',
                     'Freestyle skiing & snowboarding',
                     'Cross-country skiing',
                     'Swimming',
                     'Surfing',
                     'Waterskiing',
                     'Canoeing',
                     'Kayaking',
                     'Sailing',
                     'Snorkeling',
                     'Aquajogging',
                     'Artistic or synchronised swimming',
                     'Rescue swimming',
                     'Water basketball',
                     'Waterpolo',
                     'Water volleyball',
                     'Paddle / Stand-up Paddle',
                     'Kit surf',
                     'Wind surf',
                     'Wakeboard',
                     'Rowing',
                     'Boat racing',
                     'Boating',
                     'Cable skiing',
                     'Canoe polo',
                     'American Football',
                     'Baseball',
                     'Basketball',
                     'Dodgeball',
                     'Cheerleading',
                     'Cricket',
                     'Futsal',
                     'Handball',
                     'Field Hockey',
                     'Lacrosse',
                     'Rowing',
                     'Rugby',
                     'Soccer / Football',
                     'Softball',
                     'Kickball',
                     'Tennis (double)',
                     'Track and field',
                     'Volleyball',
                     'Air soft',
                     'Tchoukball',
                     'Ultimate Frisbee',
                     'Street hockey',
                     'Cricket',
                     'Beach football',
                     'Beach Volleyball',
                     'Polo',
                     'Under water hockey',
                     'Cycle polo',
                     'Segway polo',
                     'Kayaking',
                     'Athletics',
                     'Snorkeling',
                     'Rowing',
                     'Aerobics',
                     'Archery',
                     'Gymnastics',
                     'Cycling',
                     'Discus Throw',
                     'Equestrianism',
                     'Fencing',
                     'Long Jump',
                     'Pole Vault',
                     'Powerlifting',
                     'Tennis',
                     'Badminton',
                     'Bowling',
                     'Golf',
                     'Racquetball',
                     'Squash',
                     'Table Tennis / Ping-Pong',
                     'Javelin',
                     'Snooker',
                     'Chess',
                     'Darts',
                     'Skateboarding',
                     'Bicycling',
                     'Trampoline',
                     'Petanque',
                     'Local Race',
                     'Zorbing',
                     'Scuba Diving',
                     'Powerbocking',
                     'Marathon',
                     'Zorbing',
                     'Scuba Diving',
                     'Powerbocking',
                     'Blobbing',
                     'Mountain Boarding',
                     'Barefooting',
                     'Pogo',
                     'Rappelling',
                     'Hang Gliding',
                     'Paragliding',
                     'Half-Pipe',
                     'Ironman',
                     'Ice cross Downhill',
                     'Street Luge',
                     'Downhill Skateboarding',
                     'Downhill Mountain Biking',
                     'Waterfall Kayaking',
                     'Highlining',
                     'Cliff Diving',
                     'Free Climbing',
                     'Sky diving',
                     'Canyon Swinging',
                     'Base Jumping',
                     'Wingsuit flying',
                     'Dance',
                     'Tours',
                     'E - Sports',
                     'Yoga',
                     'Pilates',
                     'Stretching',
                     'Sport Food',
                     'SPA',
                     'Via Ferrata',
                     'Spartiates Race',
                     'Running of the bulls',
                     'Camping & Bivouac',
                     'Trail',
                     'Nordic’s walk',
                     'Hiking',
                     'Fishing',
                     'Helicopter flights',
                     'Off - road Racing',
                     'Rally Car',
                     'Air racing',
                     'Auto racing  ( car  racing )',
                     'Motor rallying',
                     'Rallycross',
                     'Motorcycle racing',
                     'Kart racing',
                     'Banger racing',
                     'Motorboat racing',
                     'Drone racing',
                     'Hovercraft racing',
                     'Lawn mower racing',
                     'Radio-controlled model racing',
                     'Snowmobile racing',
                     'Truck racing',
                     'Drifting',
                     'Demolition derby',
                     'Motorcycle trials',
                     'Freestyle Motocross',
                     'Tractor pulling',
                     'Motorcycling',
                     'Car Racing',
                     'Mix Martial Arts',
                     'Judo, Aikido',
                     'Karate',
                     'Jiu - jitsu',
                     'Wrestling',
                     'Boxing',
                     'Taekwondo',
                     'Capoeira',
                     'Fencing',
                     'Kickboxing',
                     'Krav Maga',
                     'Kung - Fu',
                     'Muay  Thai',
                     'Paintball',
                     'Sambo',
                     'Thai Boxing',
                     'Diving',
                     'Rink Hockey',
                     'Running',
                     'Paddle (tennis)',
                     'Building Jumping',
                     'Rollerblading',
                     'Urban Exploration',
                     'Longboarding',
                     'BMX',
                     'Farming',
                     'Urban Parachuting',
                     'Street Workout',
                     'Running / Jogging',
                     'Roller Freestyle',
                     'Scooter (trotinette)',
                     'Triathlon',
               ];

    $( "#keywords_val" ).autocomplete({
        source: function( request, response ) {
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
            response( $.grep( kerywordss, function( item ){
                return matcher.test( item );
            }));
        }
    });


    $(document).on('change', '#category_field', function() {
        $('#sports_id').html('<option value="">...</option>');
        var id =  $(this).find(":checked").val();
        let url = host+"/activity/sports/"+id;
        $.ajax({
            type : 'get',
            url : url,
            success:function(data){
                console.log(data);
                $('#sports_id').html(data);
            }
        });
    });


    $(document).on('click', '.deleteItem', function(){
        var href = $(this).data('href');
        swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this record.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) =>{
            if (result.isConfirmed) {
                window.location.href = href;
            } else {
                swal("Cancelled", "Your record is safe :)", "error");
            }
        });
      });

      $(document).on('click', '.addFriend', function(){
        var id = $(this).data('id');
        swal.fire({
            title: "Are you sure?",
            text: "You want this user as friend.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#994afe",
            confirmButtonText: "Yes, Add Friend!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) =>{
            if (result.isConfirmed) {
                window.location.href = host+"/friends/add/"+id;
            } else {
                swal.close();
            }
        });
      });

      $(document).on('click', '.approveFriendRequest', function(){
        var id = $(this).data('id');
        swal.fire({
            title: "Are you sure?",
            text: "You want to accept this request.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#994afe",
            confirmButtonText: "Accept Request!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = host+"/friends/acceptRequest/"+id;
            } else {
                swal.close();
            }
        });
      });

      $(document).on('click', '.rejectFriendRequest', function(){
        var id = $(this).data('id');
        swal.fire({
            title: "Are you sure?",
            text: "You want to reject this request.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#994afe",
            confirmButtonText: "Reject Request!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = host+"/friends/rejectRequest/"+id;
            } else {
                swal.close();
            }
        });
      });

      $(document).on('click', '.removeFriend', function(){
        var id = $(this).data('id');
        swal.fire({
            title: "Are you sure?",
            text: "You want to remove this from friendlist.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#994afe",
            confirmButtonText: "Yes, Remove Friend!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = host+"/friends/remove/"+id;
            } else {
            }
        });
      });

});


!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples
    SweetAlert.prototype.init = function() {

      
    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);



function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}