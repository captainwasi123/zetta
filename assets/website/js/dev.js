var host = '';


$(document).ready(function(){
    'use strict'

    host = $("meta[name='host']").attr("content");

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


    $(document).on('click', '.stickman', function(){
        $('#resultBlock').html('<div class="col-12 stickmanLoader"><img src="'+host+'/assets/website/images/loaderr.gif"/></div>');
        $.post( host+'/stickman', $('form#stickmanForm').serialize(), function(data) {
            $('#resultBlock').html(data);
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
$( "#register-form-buddy" ).submit(function( event ) {

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
                $('#'+id).html('<i class="fa fa-heart col-purple"></i>');
            }else if(res.status == 300){
                $(this).html('<i class="far fa-heart col-purple"></i>');
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
            console.log(res)
            if(res.status == 200){
                $('#'+id).html('<i class="fa fa-heart col-purple"></i>');
            }else if(res.status == 300){
                $('#'+id).html('<i class="far fa-heart col-purple"></i>');
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
                $('#'+id).html('<i class="fa fa-heart col-purple"></i>');
            }else if(res.status == 300){
                $('#'+id).html('<i class="far fa-heart col-purple"></i>');
            }
        }
    });
});
