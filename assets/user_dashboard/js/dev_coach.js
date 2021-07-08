var host = '';


$(document).ready(function(){

    'use strict'

    host = $("meta[name='host']").attr("content");  

    
    $('#imageUpload').change(function() {
      $('#profile_form').submit();
    });

    
});