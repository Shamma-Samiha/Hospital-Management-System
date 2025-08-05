@extends('layouts.app')

@section('content')
<div id="about" class="section  wow fadeIn">
    <div class="container">
      <div class="heading">
         <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
         <h2>The CareBase Hospital</h2>
      </div>
      <!-- end title -->
      <div class="row">
         <div class="col-md-6">
            <div class="message-box">
               <h4>What We Do</h4>
               <h2>Hospital Service</h2>
               <p class="lead">At CareBase, we offer a wide range of essential healthcare services, including general check-ups, child care, maternity and gynecology, diabetic and thyroid care, diagnostic lab tests, wound treatment, minor surgeries, and online consultations.</p>
               <p>Our general check-ups help detect health issues early and keep you updated on your well-being. Pediatric care ensures that children receive the right medical attention as they grow. For women, we offer complete maternity and gynecological services including prenatal, delivery, and postnatal care. Our specialized diabetic and thyroid units monitor and manage long-term conditions with expert care. We also provide fast and reliable diagnostic lab tests for accurate results. Minor surgeries and wound care services are available for quick treatments without the need for hospital admission. Plus, for your convenience, we offer online doctor consultations so you can get medical advice from home. </p>
            </div>
            <!-- end messagebox -->
         </div>
         <!-- end col -->
         <div class="col-md-6">
            <div class="post-media wow fadeIn">
               <img src="images/about_03.jpg" alt="" class="img-responsive">
               <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
            </div>
            <!-- end media -->
         </div>
         <!-- end col -->
      </div>

   </div>
   <!-- end container -->
</div>
@endsection
