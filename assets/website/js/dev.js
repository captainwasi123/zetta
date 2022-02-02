var host = '';


$(document).ready(function(){
    'use strict'


    host = $("meta[name='host']").attr("content");

    setTimeout(function(){
        var data = $('.at-expanding-share-button-toggle').html();
        $('.at-expanding-share-button-toggle').html('<label>Share</label>'+data);
    },100);

    //Forgot Password
    $(document).on('click', '.open-forgot', function(){
        $('.login-modal').modal('hide');
        $('.forgotPassword-modal').modal('show');
    });

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
        source: function( request, response ) {
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
            response( $.grep( kerywordss, function( item ){
                return matcher.test( item );
            }));
        } 
    });

    $( "#header_sports_val" ).autocomplete({
        source: function( request, response ) {
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
            response( $.grep( kerywordss, function( item ){
                return matcher.test( item );
            }));
        } 
    });

    $(document).on('click', '.getUserMessage', function(){
        var id = $(this).data('id');
        $('#getUserMessageModal').modal('show');
        $('#getUserMessageModalContent').html('<div class="col-12 stickmanLoader"><img src="'+host+'/assets/website/images/loaderr.gif"/></div>');
        $.get( host+'/getUserMessage/'+id, function(data) {
            $('#getUserMessageModalContent').html(data);
        });
    });

    $(document).on('keyup', '#couponField', function(){
        var val = $(this).val();
        var ele = $(this);
        var total = parseFloat($('#totalPrice').val());
        $.getJSON( host+'/getCoupon/'+val, function(data) {
            if(data.status == 100){
                $('#discountTray').css({display: 'none'});
                $('#finalTray').css({display: 'none'});
                ele.css({borderColor: '#ff4141', boxShadow: '0 0 0 0.2rem rgb(255 0 0 / 25%)'});
            }else if(data.status == 200){
                $('#discountTray').css({display: 'none'});
                $('#finalTray').css({display: 'none'});
                ele.css({borderColor: '#ff4141', boxShadow: '0 0 0 0.2rem rgb(255 0 0 / 25%)'});
            }else{
                ele.css({borderColor: 'rgb(65 255 167)', boxShadow: 'rgb(0 173 255 / 25%) 0px 0px 0px 0.2rem'});
                $('#discountTray').css({display: 'revert'});
                $('#discountTrayValue').html('- $'+data.price);
                $('#finalTray').css({display: 'revert'});
                $('#finalTrayValue').html('$'+(total-data.price));
            }
        });
    });

    

 });

$(document).on('submit', '.searchForm', function(event) {
    event.preventDefault(); 
    
    var $form = $(this);
    var values = getFormData($form);

    if(values['country'] == ''){
        alert('Please enter the valid address!');
    }else{
        $(this).unbind('submit').submit();
    }

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



// for buddy
$(document).ready(function(){
    'use strict'

    $(document).on('click', '.signUpStep2buddy', function(){
        if($('#signUpTerms').is(':checked')){
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
                      $('#r_content_buddy').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> Account successfully created.</p></div>');
                        setTimeout(function(){
                            window.location.href = host;
                        }, 2000);
                  }else if(data == 'nomatch'){
                      $('#r_error_buddy').html('Password does not match.');
                      $('#r_error_buddy').css({display: 'block'});
                  }else if(data == 'strong'){
                      $('#r_error_buddy').html('Password password is weak.');
                      $('#r_error_buddy').css({display: 'block'});
                  }else if(data == 'nodob'){
                      $('#r_error_buddy').html('Please fill all fields.');
                      $('#r_error_buddy').css({display: 'block'});
                  }
              })
              .fail(function(error) {
                  $('#r_error_buddy').html('Something went wrong.');
                  $('#r_error_buddy').css({display: 'block'});
                  console.log(error);
              });
          }else{
            alert('Please agree terms & conditions.');
          }
    });


    $(document).on('click', '.signUpStep2coach', function(){
        if($('#signUpTerms').is(':checked')){
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
                    //$('.modal').modal('hide');
                    $('.coachBecomeModal').modal('show');    
                  }else if(data == 'nomatch'){
                      $('#r_error_buddy').html('Password does not match.');
                      $('#r_error_buddy').css({display: 'block'});
                  }else if(data == 'strong'){
                      $('#r_error_buddy').html('Password password is weak.');
                      $('#r_error_buddy').css({display: 'block'});
                  }else if(data == 'nodob'){
                      $('#r_error_buddy').html('Please fill all fields.');
                      $('#r_error_buddy').css({display: 'block'});
                  }
              })
              .fail(function(error) {
                  $('#r_error_buddy').html('Something went wrong.');
                  $('#r_error_buddy').css({display: 'block'});
                  console.log(error);
              });
          }else{
            alert('Please agree terms & conditions.');
          }
    });
});


    
$(document).on('submit', '#register-form-buddy', function( event ) {
  // Stop form from submitting normally
  event.preventDefault();

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
                  elements        += '<label>Date of Birth</label><input type="text" id="dob_field" placeholder="dd-mm-yyyy" class="form-control" name="user_dob" required> ';
                  elements        += '<input type="hidden" class="radio-button" name="user_type" id="userTypeRegister"> ';
                  elements        += '<p style="display:flex;"><input type="checkbox" name="terms" id="signUpTerms">&nbsp;&nbsp; <label for="signUpTerms">I agree to <a href="'+host+'/terms" target="_blank">Terms & Conditions</a></label></p>';
                  elements        += '<button type="button" class="signUpStep2buddy halfContinue"> Continue as Sport Buddy </button> <button type="button" class="signUpStep2coach halfContinue"> Continue as Coach  </button>';
                  $('#r_fields_buddy').html(elements);
                  $("#dob_field").inputmask({"mask": "99-99-9999"});
              }
          })
          .fail(function(error) {
              $('#r_error_buddy').html('Something went wrong.');
              $('#r_error_buddy').css({display: 'block'});
              console.log(error);
          });
    });


$(document).on('submit', '#login-form', function( event ) {

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


//Forgot Password 

$(document).on('submit', '#forgot-form', function( event ) {

  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var $form = $( this ),
    em = $form.find( "input[name='email']" ).val(),
    url = $form.attr( "action" );

    var datastrings = $(this).serialize();
    // Send the data using post
    console.log(datastrings);
    var posting = $.post( url, datastrings );

    // Put the results in a div
    posting.done(function( data ) {
        if(data == 'error'){
            $('#fp_error').html('.');
            $('#fp_error').css({display: 'block'});
            return false;
        }if(data == 'incorrect'){
            $('#fp_error').html('Email is incorrect.');
            $('#fp_error').css({display: 'block'});
        }else{
            $('#fp_content').html('<div class="r_success_block"><img src="'+host+'/assets/images/success-gif.gif" class="success_gif" /><br><p> We have sent a email for reset password.');
            setTimeout(function(){
                window.location.href = host+data;
            }, 2000);
        }
    })
    .fail(function(error) {
        $('#fp_error').html('Something went wrong.');
        $('#fp_error').css({display: 'block'});
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
                $('#'+id).html('<i class="far fa-heart col-purple"></i>');
            }else if(res.status == 300){
                $('#'+id).html('<i class="fa fa-heart col-purple"></i>');
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

function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}