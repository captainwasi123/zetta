<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/jquery/jquery.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/jquery.slimscroll.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/waves.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/sidebarmenu.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/custom.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/calendar/jquery-ui.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/moment/moment.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/calendar/dist/fullcalendar.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/calendar/dist/cal-init.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/raphael/raphael-min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/morrisjs/morris.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/dashboard1.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/dev_coach.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{URL::to('/')}}/assets/user_dashboard/plugins/sweetalert/sweetalert.min.js"></script>
{{-- <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/summernote/dist/summernote.min.js"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {
            var input = document.getElementById('add-input');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                  var place = autocomplete.getPlace();

                  for (const component of place.address_components) {
                        const componentType = component.types[0];

                        switch (componentType) {
                            case "country":
                              $('#add-country').val(component.long_name);
                              break;
                        }
                  }
            });
      }


      $(document).ready(function(){
            'use strict'

            $.get("{{route('buddy.friends.getNotification')}}", function(data){
                  if(data != 0){
                        $('#fnotiBadge').html('<b class="notif-icon1">'+data+'</b>');
                  }
            });

            $.get("{{route('coach.messages.getNotification')}}", function(data){
                  if(data != 0){
                        $('#mnotiBadge').html('<b class="notif-icon2">'+data+'</b>');
                  }
            });
      });
</script>