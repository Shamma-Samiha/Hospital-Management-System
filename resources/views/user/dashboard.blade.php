@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Welcome, {{ Auth::user()->name }}!</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-calendar"></i> My Appointments</h4>
                </div>
                <div class="card-body">
                    @php
                        $appointments = \App\Models\requestedAppointment::where('email', Auth::user()->email)->orderBy('created_at', 'desc')->get();
                    @endphp
                    
                    @if($appointments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Date & Time</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td>
                                                @if($appointment->doctor)
                                                    {{ $appointment->doctor->name }}
                                                @else
                                                    <span class="text-muted">Doctor not assigned</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->stime)->format('M d, Y h:i A') }}</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>{{ $appointment->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fa fa-calendar-times fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No appointments found</h5>
                            <p class="text-muted">You haven't booked any appointments yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-plus"></i> Quick Actions</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-block mb-3">
                        <i class="fa fa-calendar-plus"></i> Book New Appointment
                    </a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-secondary btn-block" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
