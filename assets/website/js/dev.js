var host = '';


$(document).ready(function(){
    'use strict'


    host = $("meta[name='host']").attr("content");

    setTimeout(function(){
        var data = $('.at-expanding-share-button-toggle').html();
        $('.at-expanding-share-button-toggle').html('<label>Share</label>'+data);
    },100);
    // for coach
    $(document).on('click', '.open-login', function(){
        $('.register-modal').modal('hide');
        $('.register-modal-buddy').modal('hide');
        $('.login-modal').modal('show');
    });

    // for buddy
    $(document).on('click', '.open-join-buddy', function(){
        $('.login-modal').modal('hide');
        $('.register-modal').modal('hide');
        $('.register-modal-buddy').modal('show');
    });

    $(document).on('click', '.open-join', function(){
        $('.login-modal').modal('hide');
        $('.register-modal-buddy').modal('hide');
        $('.register-modal').modal('show');
    });


   /* $(document).on('mouseover', '.subCategory', function(){
        var id = $(this).data('id');
        $('#subCategoryBlock').html('<div class="col-12"><img src="'+host+'/assets/website/images/loaderr.gif"/></div>');
        $.get( host+'/stickman/subCategory/'+id, function(data) {
            $('#subCategoryBlock').html(data);
            $('.all-actions_sub').slick('unslick');
            stickmanSub();
        });
    });*/


    $(document).on('click', '.stickman', function(){
        var id = $(this).data('id');
        $('#resultBlock').html('<div class="row"><div class="col-12 stickmanLoader"><br><br><br><br><br><img src="'+host+'/assets/website/images/loaderr.gif"/><br><br><br><br><br><br><br><br><br><br></div></div>');
        $.post( host+'/stickman', $('form#stickmanForm').serialize(), function(data) {
            console.log(data);
            $('#resultBlock').html(data);
            $('#subCategoryBlock').html('<div class="col-12"><img src="'+host+'/assets/website/images/loaderr.gif"/></div>');
            $.get( host+'/stickman/subCategory/'+id, function(data) {
                $('#subCategoryBlock').html(data);
                stickmanSub(id);
            });
        });
    });

    $( "#keywords_val" ).autocomplete({
      source: kerywordss
    });

    $( "#header_sports_val" ).autocomplete({
        source: kerywordss
    });

    $(document).on('click', '.getUserMessage', function(){
        var id = $(this).data('id');
        $('#getUserMessageModal').modal('show');
        $('#getUserMessageModalContent').html('<div class="col-12 stickmanLoader"><img src="'+host+'/assets/website/images/loaderr.gif"/></div>');
        $.get( host+'/getUserMessage/'+id, function(data) {
            $('#getUserMessageModalContent').html(data);
        });
    });

 });


jQuery(function ($) {
   // init the state from the input
   $(".image-checkbox").each(function () {
       if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
           $(this).addClass('image-checkbox-checked');
       }
       else {
           $(this).removeClass('image-checkbox-checked');
       }
   });

   // sync the state to the input
   $(".image-checkbox").on("click", function (e) {
       if ($(this).hasClass('image-checkbox-checked')) {
           $(this).removeClass('image-checkbox-checked');
           $(this).find('input[type="checkbox"]').first().removeAttr("checked");
       }
       else {
           $(this).addClass('image-checkbox-checked');
           $(this).find('input[type="checkbox"]').first().attr("checked", "checked");
       }

       e.preventDefault();
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




//Ajax

// for coach
$( "#register-form" ).submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var $form = $( this ),
    em = $form.find( "input[name='email']" ).val(),
    token = $form.find( "input[name='_token']" ).val(),
    url = $form.attr( "action" );
    var datastrings = $(this).serialize();
    // Send the data using post
    var posting = $.post( url, datastrings );

    // Put the results in a div
    posting.done(function( data ) {
        if(data == 'exist'){
            $('#r_error').html('Email already exists.');
            $('#r_error').css({display: 'block'});
        }else if(data == 'success'){
            $('#r_content').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> Account created. Please <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> Sign In </a> here.</p></div>');
        }else if(data == 'nomatch'){
            $('#r_error').html('Password does not match.');
            $('#r_error').css({display: 'block'});
        }else{
            $('#r_social').remove();
            $('#r_error').css({display: 'none'});
            $('.email_reg').prop('readonly',true);
            var elements = '<input type="text" name="username" placeholder="Username" required>';
            elements  += '<input type="password" placeholder="New Password" name="password" required>';
            elements  += '<input type="password" placeholder="Confirm Password" name="confirmation_password" required>';
            // elements        += 'I am a / an: <input type="radio" class="radio-button" name="user_type" value="1" checked> Buddy';
            elements        += '<input type="hidden" class="radio-button" name="user_type" value="2" > ';
            $('#r_fields').html(elements);
        }
    })
    .fail(function(error) {
        $('#r_error').html('Something went wrong.');
        $('#r_error').css({display: 'block'});
        console.log(error);
    });
});


// for buddy

$(document).ready(function(){
    'use strict'

    
$( "#register-form-buddy" ).submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();

        var $form = $('#register-form-buddy'),
          em = $form.find( "input[name='email']" ).val(),
          token = $form.find( "input[name='_token']" ).val(),
          url = $form.attr( "action" );
          var datastrings = $('#register-form-buddy').serialize();
          // Send the data using post
          var posting = $.post( url, datastrings );

          // Put the results in a div
          posting.done(function( data ) {
              if(data == 'exist'){
                  $('#r_error_buddy').html('Email already exists.');
                  $('#r_error_buddy').css({display: 'block'});
              }else if(data == 'success'){
                  $('#r_content_buddy').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> Account created. Please <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> Sign In </a> here.</p></div>');
              }else if(data == 'nomatch'){
                  $('#r_error_buddy').html('Password does not match.');
                  $('#r_error_buddy').css({display: 'block'});
              }else{
                  $('#r_social_buddy').remove();
                  $('#r_error_buddy').css({display: 'none'});
                  $('.email').prop('readonly',true);
                  var elements = '<input type="text" name="username" placeholder="Username" required>';
                  elements    += '<input type="password" placeholder="New Password" name="password" required>';
                  elements        += '<input type="password" placeholder="Confirm Password" name="confirmation_password" required>';
                  elements        += '<input type="hidden" class="radio-button" name="user_type" id="userTypeRegister"> ';
                  elements        += '<button type="button" class="signUpStep2buddy halfContinue"> Continue as Sport Buddy </button> <button type="button" class="signUpStep2coach halfContinue"> Continue as Coach  </button>';
                  $('#r_fields_buddy').html(elements);
              }
          })
          .fail(function(error) {
              $('#r_error_buddy').html('Something went wrong.');
              $('#r_error_buddy').css({display: 'block'});
              console.log(error);
          });
    });


    $(document).on('click', '.signUpStep2buddy', function(){
        $('#userTypeRegister').val('1');

        var $form = $('#register-form-buddy'),
          em = $form.find( "input[name='email']" ).val(),
          token = $form.find( "input[name='_token']" ).val(),
          url = $form.attr( "action" );
          var datastrings = $('#register-form-buddy').serialize();
          // Send the data using post
          var posting = $.post( url, datastrings );

          // Put the results in a div
          posting.done(function( data ) {
              if(data == 'exist'){
                  $('#r_error_buddy').html('Email already exists.');
                  $('#r_error_buddy').css({display: 'block'});
              }else if(data == 'success'){
                  $('#r_content_buddy').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> Account created. Please <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> Sign In </a> here.</p></div>');
              }else if(data == 'nomatch'){
                  $('#r_error_buddy').html('Password does not match.');
                  $('#r_error_buddy').css({display: 'block'});
              }else{
                  $('#r_social_buddy').remove();
                  $('#r_error_buddy').css({display: 'none'});
                  $('.email').prop('readonly',true);
                  var elements = '<input type="text" name="username" placeholder="Username" required>';
                  elements    += '<input type="password" placeholder="New Password" name="password" required>';
                  elements        += '<input type="password" placeholder="Confirm Password" name="confirmation_password" required>';
                  elements        += '<input type="hidden" class="radio-button" name="user_type" id="userTypeRegister"> ';
                  elements        += '<button type="button" class="signUpStep2buddy halfContinue"> Continue as Sport Buddy </button> <button type="button" class="signUpStep2coach halfContinue"> Continue as Coach  </button>';
                  $('#r_fields_buddy').html(elements);
              }
          })
          .fail(function(error) {
              $('#r_error_buddy').html('Something went wrong.');
              $('#r_error_buddy').css({display: 'block'});
              console.log(error);
          });
    });

    $(document).on('click', '.signUpStep2coach', function(){
        $('#userTypeRegister').val('2');
        
        var $form = $('#register-form-buddy'),
          em = $form.find( "input[name='email']" ).val(),
          token = $form.find( "input[name='_token']" ).val(),
          url = $form.attr( "action" );
          var datastrings = $('#register-form-buddy').serialize();
          // Send the data using post
          var posting = $.post( url, datastrings );

          // Put the results in a div
          posting.done(function( data ) {
              if(data == 'exist'){
                  $('#r_error_buddy').html('Email already exists.');
                  $('#r_error_buddy').css({display: 'block'});
              }else if(data == 'success'){
                //$('.modal').modal('hide');
                $('.coachBecomeModal').modal('show');    
              }else if(data == 'nomatch'){
                  $('#r_error_buddy').html('Password does not match.');
                  $('#r_error_buddy').css({display: 'block'});
              }else{
                  $('#r_social_buddy').remove();
                  $('#r_error_buddy').css({display: 'none'});
                  $('.email').prop('readonly',true);
                  var elements = '<input type="text" name="username" placeholder="Username" required>';
                  elements    += '<input type="password" placeholder="New Password" name="password" required>';
                  elements        += '<input type="password" placeholder="Confirm Password" name="confirmation_password" required>';
                  elements        += '<input type="hidden" class="radio-button" name="user_type" id="userTypeRegister"> ';
                  elements        += '<button type="button" class="signUpStep2buddy halfContinue"> Continue as Sport Buddy </button> <button type="button" class="signUpStep2coach halfContinue"> Continue as Coach  </button>';
                  $('#r_fields_buddy').html(elements);
              }
          })
          .fail(function(error) {
              $('#r_error_buddy').html('Something went wrong.');
              $('#r_error_buddy').css({display: 'block'});
              console.log(error);
          });
    });
});


/*$( "#register-form-buddy" ).submit(function( event ) {

    // Stop form from submitting normally
    event.preventDefault();

    // Get some values from elements on the page:
    var $form = $( this ),
      em = $form.find( "input[name='email']" ).val(),
      token = $form.find( "input[name='_token']" ).val(),
      url = $form.attr( "action" );
      var datastrings = $(this).serialize();
      // Send the data using post
      var posting = $.post( url, datastrings );

      // Put the results in a div
      posting.done(function( data ) {
          if(data == 'exist'){
              $('#r_error_buddy').html('Email already exists.');
              $('#r_error_buddy').css({display: 'block'});
          }else if(data == 'success'){
              $('#r_content_buddy').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> Account created. Please <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> Sign In </a> here.</p></div>');
          }else if(data == 'nomatch'){
              $('#r_error_buddy').html('Password does not match.');
              $('#r_error_buddy').css({display: 'block'});
          }else{
              $('#r_social_buddy').remove();
              $('#r_error_buddy').css({display: 'none'});
              $('.email').prop('readonly',true);
              var elements = '<input type="text" name="username" placeholder="Username" required>';
              elements    += '<input type="password" placeholder="New Password" name="password" required>';
              elements        += '<input type="password" placeholder="Confirm Password" name="confirmation_password" required>';
              elements        += '<input type="hidden" class="radio-button" name="user_type" value="1" > ';
              $('#r_fields_buddy').html(elements);
          }
      })
      .fail(function(error) {
          $('#r_error_buddy').html('Something went wrong.');
          $('#r_error_buddy').css({display: 'block'});
          console.log(error);
      });
});
*/


$( "#login-form" ).submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var $form = $( this ),
    em = $form.find( "input[name='email']" ).val(),
    token = $form.find( "input[name='_token']" ).val(),
    url = $form.attr( "action" );

    var datastrings = $(this).serialize();
    // Send the data using post
    var posting = $.post( url, datastrings );

    // Put the results in a div
    posting.done(function( data ) {
        if(data == 'error'){
            $('#l_error').html('Account has been suspended, please contact site administrator.');
            $('#l_error').css({display: 'block'});
            return false;
        }if(data == 'incorrect'){
            $('#l_error').html('Email or Password is incorrect.');
            $('#l_error').css({display: 'block'});
        }else{
            $('#l_content').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> You are successfully Logged In.');
            setTimeout(function(){
                window.location.href = host+data;
            }, 2000);
        }
    })
    .fail(function(error) {
        $('#l_error').html('Something went wrong.');
        $('#l_error').css({display: 'block'});
        console.log(error);
    });
});



// add fave activity

$(".fav_act").click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = host+"/favourite/activity/add/"+id;
    $.ajax({
        type: "get",
        url: url,
        data: {},
        success: function (res) {
            if(res.status == 200){
                $('#'+id).html('<i class="fa fa-heart col-purple"></i>');
            }else if(res.status == 300){
                $('#'+id).html('<i class="far fa-heart col-purple"></i>');
            }
        }
    });
});


// add fave lesson

$(".fav_lesson").click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = host+"/favourite/lesson/add/"+id;
    $.ajax({
        type: "get",
        url: url,
        data: {},
        success: function (res) {
            if(res.status == 200){
                $('#fl'+id).html('<i class="fa fa-heart col-purple"></i>');
            }else if(res.status == 300){
                $('#fl'+id).html('<i class="far fa-heart col-purple"></i>');
            }
        }
    });
});


// add fave lesson

$(".fav_coach").click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = host+"/favourite/coach/add/"+id;
    $.ajax({
        type: "get",
        url: url,
        data: {},
        success: function (res) {
            if(res.status == 200){
                $('#'+id).html('');
            }else if(res.status == 300){
                $('#'+id).html('');
            }
        }
    });
});

// add fave buddy

$(".fav_buddy").click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = host+"/favourite/buddy/add/"+id;
    $.ajax({
        type: "get",
        url: url,
        data: {},
        success: function (res) {
            if(res.status == 200){
                $('#'+id).html('');
            }else if(res.status == 300){
                $('#'+id).html('');
            }
        }
    });
});


   const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";
 
$(window).on("load resize", function() {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $dropdown.hover(
      function() {
        const $this = $(this);
        $this.addClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "true");
        $this.find($dropdownMenu).addClass(showClass);
      },
      function() {
        const $this = $(this);
        $this.removeClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "false");
        $this.find($dropdownMenu).removeClass(showClass);
      }
    );
  } else {
    $dropdown.off("mouseenter mouseleave");
  }
});

   $(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 600) {
    //$('.bottomMenu').fadeIn();
    $('#bottomMenu').css({marginTop: '0px'});
  } else {
    //$('.bottomMenu').fadeOut();
    $('#bottomMenu').css({marginTop: '-110px'});
  }
});
