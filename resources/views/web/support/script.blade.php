
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61150be4ed49ae9b"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{URL::to('/assets/website')}}/js/bootstrap.min.js"> </script>
  <script src="{{URL::to('/assets/website')}}/js/slick-slider.js"> </script>

  <script src="{{URL::to('/assets/website')}}/js/dev.js"> </script>
  <script src="{{URL::to('/assets/website')}}/js/functions.js"> </script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
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