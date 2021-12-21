@extends('web.support.master2')
@section('title', 'FAQ')
@section('addStyle')

<style type="text/css">
 .accordion {
  background-color: transparent;
  color: #fff;
  cursor: pointer;
  padding: 20px;
  width: 100%;
  border: 1px solid #fff;
  text-align: left;
  outline: none;
  font-size: 18px;
  transition: 0.6s;
  border-radius: 10px 10px 10px 10px;
}

.active, .accordion:hover {
  background-color: #fff; 
  color: #6C28A9;
  border: 0px solid #fff;
  border-bottom:1px;
  border-radius: 10px 10px 10px 10px;
}
.active, .accordion:active {
  background-color: #fff; 
  color: #6C28A9;
  border: 0px solid #fff;
  border-bottom:1px;
  border-radius: 10px 10px 0px 0px;
}

.panel {
  padding: 20px 20px;
  display: none;
  background-color: transparent;
  overflow: hidden;
  border:1px solid #fff;
  border-top:0px;
  color:#fff;
  border-radius: 0px 0px 10px 10px;
  font-size: 18px;
}
</style>

@endsection
@section('content')

<section class="action-bar">
   <div class="container">
      <div class="term-sec1">
         <h2>{{ __('content.FAQ') }}  </h2>


<body>


<button class="accordion">Section 1</button>
    <div class="panel">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

<button class="accordion">Section 2</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
   </div>
</section>
@endsection
