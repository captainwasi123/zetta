var host = '';


$(document).ready(function(){

    'use strict'

    host = $("meta[name='host']").attr("content");


    $('#imageUpload').change(function() {
      $('#profile_form').submit();
    });

    $('input[name="participants"]').change(function() {
        var data = '<input type="text" value="1" name="group_members" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" readonly required>';
        if (this.value == '0') {
            $('#participants_block').html('');
            $('#dateTimeBlock').css({display: 'none'});
        }
        else if (this.value == '1') {
            $('#participants_block').html(data);
            $("input[name='group_members']").TouchSpin();
            $('#dateTimeBlock').css({display: 'block'});
        }
    });


    $(document).on('click', '.addServicePackage', function(){
        var data = '<tr><td>  <textarea class="table-field1" placeholder="Service" name="service_basic[]"></textarea></td><td> <textarea class="table-field1" placeholder="Service" name="service_standard[]"></textarea></td><td> <textarea class="table-field1" placeholder="Service" name="service_premium[]"></textarea></td></tr>';
        $('#package_block').before(data);
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

    $(document).on('keyup','.find-friend-seach', function(){
        let value=$(this).val();
        let url = host+"/friends/search";
        $.ajax({
            type : 'get',
            url : url,
            data:{'search':value},
            datatype: JSON,
            success:function(data){
                console.log(data);
                $('.show-search-friends').html(data);
            }
        });
    });



    $(document).on('change', '#category_field', function() {
        $('#sports_id').html('<option value="">...</option>');
        var id =  $(this).find(":checked").val();
        let url = host+"/lessons/sports/"+id;
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
});
