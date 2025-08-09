@extends('layouts.app')

@section('content')
<div id="doctors" class="parallax section db" data-stellar-background-ratio="0.4" style="background:#fff;" data-scroll-id="doctors" tabindex="-1">
    <div class="container">
  
     <div class="heading">
           <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
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
                @if(($index + 1) % 3 == 0)
                    <div class="clearfix"></div>
                @endif
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

@endsection