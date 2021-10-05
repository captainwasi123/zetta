 $(document).ready(function(){


 	var val1 = 0;

 	$('.navbar-handler').children("img").click(function(){

 		if(val1==0){
 			$(this).attr("src","images/cross.png")
 		$('.navbar-custom').slideToggle()

 		val1 = 1;
 	
 	}
 	else {
 		$('.navbar-custom').slideToggle()
 		$(this).attr("src","images/hamburger.png")
 		val1 = 0;

 	}
 	})
 })





  $(document).ready(function(){


 	var val2 = 0;

 	$('.search-handler').children("img").click(function(){

 		if(val2==0){
 			$(this).attr("src","images/cross.png")
 		$('.search-form').slideToggle()

 		val2 = 1;
 	
 	}
 	else {
 		$('.search-form').slideToggle()
 		$(this).attr("src","images/hamburger.png")
 		val2 = 0;

 	}
 	})
 })




function stickmanSub(id){
  $('.sub'+id).slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 8,
      slidesToScroll: 1,
      autoplay: false,
      focusOnSelect: false,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 7,
            slidesToScroll: 1
          }
        },

        {
          breakpoint: 768,
          settings: {
            slidesToShow: 6,
            slidesToScroll: 1
          }
        },

        {
          breakpoint: 700,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1
          }
        },

        {
          breakpoint: 600,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}




 $('.all-actions').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 8,
  slidesToScroll: 1,
  autoplay: false,
  focusOnSelect: false,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 7,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 700,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});









 $('.boxes-slider1').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: false,
  focusOnSelect: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 700,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});





 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});



 $(document).ready(function(){
         
            $('.category-sports').children("button").click(function(){
         
               $(this).parent(".category-sports").children("button").removeClass("active")
               $(this).addClass("active")
         
            })
         
         })







  $('.lesson-banner-image').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  focusOnSelect: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 700,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});





  $('.review-slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  focusOnSelect: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 700,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});








  $('.boxes-slider2').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: false,
  focusOnSelect: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 700,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});



// VERSION WITHOUT BOOTSTRAP 4 : https://codepen.io/seltix/pen/LygQXx

jQuery('.dropdown-menu.keep-open').on('click', function (e) {
  e.stopPropagation();
});

if(1) {
  $('body').attr('tabindex', '0');
}
else {
  alertify.confirm().set({'reverseButtons': true});
  alertify.prompt().set({'reverseButtons': true});
}

//-----JS for Price Range slider-----

$(function() {
  $( "#slider-range" ).slider({
    range: true,
    min: 130,
    max: 500,
    values: [ 130, 250 ],
    slide: function( event, ui ) {
    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    }
  });
  $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});






$(function() {
  $( "#slider-range2" ).slider({
    range: true,
    min: 5,
    max: 100,
    values: [ 5, 100 ],
    slide: function( event, ui ) {
    $( "#amount2" ).val(   ui.values[ 0 ] + "km"  + " - " +  ui.values[ 1 ] + " km" );
    }
  });
  $( "#amount2" ).val($( "#slider-range2" ).slider( "values", 0 ) +  "km" + " - " +  $( "#slider-range2" ).slider( "values", 1 ) + " km"    );
});




