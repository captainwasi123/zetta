/*jslint browser: true*/
/*global $, jQuery, alert*/
var host = $("meta[name='host']").attr("content");

$(function () {

    "use strict";

    $('.chat-left-inner > .chatonline').slimScroll({
        height: '100%',
        position: 'right',
        size: "5px",
        color: '#dcdcdc'

    });
    $('.chat-list').slimScroll({
        position: 'right'
        , size: "5px"
        , height: '100%'
        , color: '#dcdcdc'
     });
    
    var cht = function () {
            var topOffset = 445;
            var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            $(".chat-list").css("height", (height) + "px");
    };
    $(window).ready(cht);
    $(window).on("resize", cht);
    
    

    // this is for the left-aside-fix in content area with scroll
    var chtin = function () {
            var topOffset = 270;
            var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            $(".chat-left-inner").css("height", (height) + "px");
    };
    $(window).ready(chtin);
    $(window).on("resize", chtin);
    
    


    $(".open-panel").on("click", function () {
        $(".chat-left-aside").toggleClass("open-pnl");
        $(".open-panel i").toggleClass("ti-angle-left");
    });


    $(document).on('click', '.emojies', function(){
        $('.emoji-menu').toggle(); 
    });


    $(document).on('change', '#fileAttach', function() {
      var file = $('#fileAttach')[0].files[0].name;
      $('#fileAttachName').text(file);
    });

});

//Inbox Chat

$( "#sendchat" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 

    // Get form
        var form = $('#sendchat')[0];

        // Create an FormData object 
        var data = new FormData(form);

        // disabled the submit button
        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: host+'/inbox/messageSend',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                $("textarea[name='message']").val(null);
                $(".emoji-wysiwyg-editor").html(null);
                $('#fileAttachName').html(null);
                $('#talksall').append(data);
                chatScrollDown();

            },
            error: function (e) {
                $('#l_error').html('Something went wrong.');
                $('#l_error').css({display: 'block'});
                console.log(e);


            }
        });
});


function chatScrollDown(){
    $('#talksall').scrollTop($('#talksall').prop("scrollHeight"));

}
function notiSound() {
  $('#newMessInd').css({display: 'inline-block'});
  const audio = new Audio(host+'/../assets/user_dashboard/audio/noti.mp3');
  audio.play();
}