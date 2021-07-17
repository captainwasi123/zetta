var host = '';


$(document).ready(function(){
    'use strict'

    host = $("meta[name='host']").attr("content");  

    $(document).on('click', '.open-login', function(){
        
        $('.register-modal').modal('hide');
        $('.login-modal').modal('show'); 
    });
    $(document).on('click', '.open-join', function(){
        $('.login-modal').modal('hide');
        $('.register-modal').modal('show'); 
    });

 });

//Ajax

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
            var elements    = '<input type="password" placeholder="New Password" name="password" required>';
            elements        += '<input type="password" placeholder="Confirm Password" name="confirmation_password" required>';
            elements        += 'I am a / an: <input type="radio" class="radio-button" name="user_type" value="1" checked> Buddy';
            elements        += '<input type="radio" class="radio-button" name="user_type" value="2" > Coach';
            $('#r_fields').html(elements);
        }

        console.log(data);
    })
    .fail(function(error) {
        $('#r_error').html('Something went wrong.');
        $('#r_error').css({display: 'block'});
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

