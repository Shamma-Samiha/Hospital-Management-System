@extends('layouts.app')
@section('content')
<div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/slider-bg.png');" {{ $app = App\Models\settings::latest()->first() }}>
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="text-contant">
               <h2>
                  
                  <a href="" class="typewrite" data-period="2000" data-type='[ "Welcome to Care Base", "We Take Care of Your Health", "We are Expert!" ]'>
                  <span class="wrap"></span>
                  </a>
               </h2>

            </div>
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</div>
<!-- end section -->
<div id="time-table" class="time-table-section">
   <div class="container">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="row">
            <div class="service-time one" style="background:#2895f1;">
               <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
               <h3>Emergency Case</h3>
               <p> Our 24/7 emergency department is fully equipped with advanced medical technology and experienced professionals to handle critical situations efficiently.

               </p>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="row">
            <div class="service-time middle" style="background:#0071d1;">
               <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
               <h3>Working Hours</h3>
               <div class="time-table-section">
                  <ul>
                     <li><span class="left">Monday - Friday</span><span class="right">8:00 AM – 11:00 PM</span></li>
                     <li><span class="left">Saturday</span><span class="right">8:00 AM – 9:00 PM</span></li>
                     <li><span class="left">Sunday</span><span class="right">8:00 AM – 8:00 PM</span></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="row">
            <div class="service-time three" style="background:#0060b1;">
               <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
               <h3>Clinic Timetable</h3>
               <p>Our hospital operates every day of the week to serve patients with flexible timing.For specialist consultations, please book an appointment in advance.</p>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="about" class="section wow fadeIn">
   <div class="container">
      <div class="heading">
         <h2>The CarBase Hospital</h2>
      </div>
      <!-- end title -->
      <div class="row">
         <div class="col-md-6">
            <div class="message-box">
               <h4>What We Do</h4>
               <h2>Hospital Service</h2>
               <p class="lead">CareBase offers a wide range of medical services tailored to meet your healthcare needs. We bring together expert doctors, modern equipment, and compassionate care. Our key services include:

                 General Medicine & Check-ups,Pediatric & Child Care,Gynecology & Maternity,Diabetes & Thyroid Care,
                 Diagnostic Lab Tests,Minor Surgery & Wound Care and Online Consultations.  </p>
               <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Learn More</a>
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
      <!-- end row -->
      <hr class="hr1">
      <div class="row">
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-widget">
               <div class="post-media wow fadeIn">
                  <a href="images/clinic_01.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                  <img src="images/clinic_01.jpg" alt="" class="img-responsive">
               </div>
               <h3>Digital Control Center</h3>
            </div>
            <!-- end service -->
         </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-widget">
               <div class="post-media wow fadeIn">
                  <a href="images/clinic_02.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                  <img src="images/clinic_02.jpg" alt="" class="img-responsive">
               </div>
               <h3>Hygienic Operating Room</h3>
            </div>
            <!-- end service -->
         </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-widget">
               <div class="post-media wow fadeIn">
                  <a href="images/clinic_03.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                  <img src="images/clinic_03.jpg" alt="" class="img-responsive">
               </div>
               <h3>Specialist Physicians</h3>
            </div>
            <!-- end service -->
         </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-widget">
               <div class="post-media wow fadeIn">
                  <a href="images/clinic_01.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                  <img src="images/clinic_01.jpg" alt="" class="img-responsive">
               </div>
               <h3>Digital Control Center</h3>
            </div>
            <!-- end service -->
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</div>
<div id="service" class="services wow fadeIn">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
             <div class="inner-services">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="images/service-icon1.png" alt="#" /></span>
                      <h4>PREMIUM FACILITIES</h4>
                      
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="images/service-icon2.png" alt="#" /></span>
                      <h4>LARGE LABORATORY</h4>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="images/service-icon3.png" alt="#" /></span>
                      <h4>DETAILED SPECIALIST</h4>
                      
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="images/service-icon4.png" alt="#" /></span>
                      <h4>CHILDREN CARE CENTER</h4>
                      
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="images/service-icon5.png" alt="#" /></span>
                      <h4>FINE INFRASTRUCTURE</h4>
                      
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="images/service-icon6.png" alt="#" /></span>
                      <h4>ANYTIME BLOOD BANK</h4>
                      
                   </div>
                </div>
             </div>
          </div>
          @auth
              @livewire('appointmentform')
          @else
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="appointment-form">
                      <h3><span>🔒</span> Book Appointment</h3>
                      <div class="form">
                          <div class="text-center" style="padding: 40px 20px;">
                              <h4 style="color: #007bff; margin-bottom: 20px;">Login Required</h4>
                              <p style="color: #666; margin-bottom: 30px;">Please log in to book an appointment with our doctors.</p>
                              <a href="{{ route('login') }}" class="btn btn-primary" style="padding: 12px 30px; font-size: 16px;">
                                  <i class="fa fa-sign-in-alt"></i> Login to Book
                              </a>
                              <div style="margin-top: 20px;">
                                  <p style="color: #999; font-size: 14px;">Don't have an account?</p>
                                  <a href="{{ route('register') }}" style="color: #007bff; text-decoration: underline;">Register here</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @endauth
       </div>
    </div>
 </div>
 <!-- end section -->

<!-- doctor -->

<div id="doctors" class="parallax section db" data-stellar-background-ratio="0.4" style="background:#fff;" data-scroll-id="doctors" tabindex="-1">
  <div class="container">

   <div class="heading">
         <h2>The CareBase Hospital</h2>
      </div>

      <div class="row dev-list text-center">
          @forelse($doctors as $index => $doctor)
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="{{ 0.2 + ($index * 0.2) }}s">
                  <div class="widget clearfix">
                      @if($doctor->image)
                          <img src="{{ asset('storage/' . $doctor->image) }}" alt="{{ $doctor->name }}" class="img-responsive img-rounded" style="width: 200px; height: 200px; object-fit: cover;">
                      @else
                          <img src="images/doctor_01.jpg" alt="{{ $doctor->name }}" class="img-responsive img-rounded" style="width: 200px; height: 200px; object-fit: cover;">
                      @endif
                      <div class="widget-title">
                          <h3>{{ $doctor->name }}</h3>
                          <small>{{ $doctor->specialty }}</small>
                          @if($doctor->qualification)
                              <br><small class="text-muted">{{ $doctor->qualification }}</small>
                          @endif
                      </div>
                      <!-- end title -->
                      <p>
                          @if($doctor->bio)
                              {{ Str::limit($doctor->bio, 100) }}
                          @else
                              Experienced {{ $doctor->specialty }} specialist with expertise in patient care and treatment.
                          @endif
                      </p>
                      
                      <div class="doctor-info">
                          <p><strong>Room:</strong> {{ $doctor->room }}</p>
                          <p><strong>Visiting Hours:</strong> {{ $doctor->visiting_hours }}</p>
                          <p><strong>Available Days:</strong> 
                              @if(is_array($doctor->visiting_days))
                                  {{ implode(', ', $doctor->visiting_days) }}
                              @else
                                  {{ $doctor->visiting_days }}
                              @endif
                          </p>
                          @if($doctor->email)
                              <p><strong>Email:</strong> {{ $doctor->email }}</p>
                          @endif
                      </div>

                      <div class="footer-social">
                          <a href="#" class="btn grd1"><i class="fa fa-envelope"></i></a>
                          @if($doctor->phone)
                              <a href="tel:{{ $doctor->phone }}" class="btn grd1"><i class="fa fa-phone"></i></a>
                          @endif
                          <a href="#" class="btn grd1"><i class="fa fa-calendar"></i></a>
                          <a href="#" class="btn grd1"><i class="fa fa-info"></i></a>
                      </div>
                  </div><!--widget -->
              </div><!-- end col -->
          @empty
              <div class="col-12">
                  <div class="alert alert-info text-center">
                      <h4>No Doctors Available</h4>
                      <p>Our medical team information will be displayed here once doctors are added to the system.</p>
                  </div>
              </div>
          @endforelse
      </div><!-- end row -->
  </div><!-- end container -->
</div>
<!-- end doctor section -->
              



<div id="testimonials" class="section wb wow fadeIn">
   <div class="container">
      <div class="heading">
         <h2>Testimonials</h2>
      </div>
      <!-- end title -->
      <div class="row">
         <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="testimonial clearfix">
               <div class="desc">
                  <h3><i class="fa fa-quote-left"></i> The amazing clinic! Wonderful Support!</h3>
                  <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
               </div>
               <div class="testi-meta">
                  <img src="images/testi_01.png" alt="" class="img-responsive alignleft">
                  <h4>James Fernando <small>- Manager of Racer</small></h4>
               </div>
               <!-- end testi-meta -->
            </div>
            <!-- end testimonial -->
         </div>
         <!-- end col -->
         <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
            <div class="testimonial clearfix">
               <div class="desc">
                  <h3><i class="fa fa-quote-left"></i> Thanks for Help us!</h3>
                  <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
               </div>
               <div class="testi-meta">
                  <img src="images/testi_02.png" alt="" class="img-responsive alignleft">
                  <h4>Andrew Atkinson <small>- Life Manager</small></h4>
               </div>
               <!-- end testi-meta -->
            </div>
            <!-- end testimonial -->
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
      <hr class="invis">
      <div class="row">
         <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
            <div class="testimonial clearfix">
               <div class="desc">
                  <h3><i class="fa fa-quote-left"></i> The amazing clinic! Wonderful Support!</h3>
                  <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
               </div>
               <div class="testi-meta">
                  <img src="images/testi_03.png" alt="" class="img-responsive alignleft">
                  <h4>Amanda DOE <small>- Manager of Racer</small></h4>
               </div>
               <!-- end testi-meta -->
            </div>
            <!-- end testimonial -->
         </div>
         <!-- end col -->
         <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
            <div class="testimonial clearfix">
               <div class="desc">
                  <h3><i class="fa fa-quote-left"></i> Thanks for Help us!</h3>
                  <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
               </div>
               <div class="testi-meta">
                  <img src="images/testi_01.png" alt="" class="img-responsive alignleft">
                  <h4>Martin Johnson <small>- Founder of Goosilo</small></h4>
               </div>
               <!-- end testi-meta -->
            </div>
            <!-- end testimonial -->
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</div>
<!-- end section -->

@livewire('contactus')


@endsection
