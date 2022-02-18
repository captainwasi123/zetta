
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61150be4ed49ae9b"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{URL::to('/assets/website')}}/js/bootstrap.min.js"> </script>
  <script src="{{URL::to('/assets/website')}}/js/slick-slider.js"> </script>
  @php $sportss = \App\Models\sports::all(); @endphp
  <script type="text/javascript">
    var kerywordss = [
      @foreach($sportss as $val)  
        "{{ __('content.'.$val->name)}}",
      @endforeach
    ];

    @if(session()->has('loginValidate'))
      $(document).ready(function(){
          $('.login-modal').modal('show');
      });
    @endif
  </script>

  <script src="{{URL::to('/assets/website')}}/js/dev.js"> </script>
  <script src="{{URL::to('/assets/website')}}/js/functions.js"> </script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
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

  google.maps.event.addDomListener(window, 'load', initializee);
   function initializee() {
      var input = document.getElementById('madd-input');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      
      for (const component of place.address_components) {
        const componentType = component.types[0];

        switch (componentType) {
          case "country":
            $('#madd-country').val(component.long_name);
            break;
        }
      }
    });
  }
  </script>
  @if(Auth::check())
    <script type="text/javascript">
      $(document).ready(function(){
        'use strict'
        
        $.get("{{route('buddy.messages.getNotification')}}", function(data){
              
              if(data != 0){
                    $('#mnotiBadge').html('<b class="notif-icon2">'+data+'</b>');
              }
        });
      });
    </script>
  @endif