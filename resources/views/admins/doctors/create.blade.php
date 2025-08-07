@extends('admins.layouts.app')

@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Doctor</h4>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back to Doctors
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Doctor Name *</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="specialty">Specialty *</label>
                                    <input type="text" name="specialty" id="specialty" class="form-control @error('specialty') is-invalid @enderror" 
                                           value="{{ old('specialty') }}" required>
                                    @error('specialty')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room">Room *</label>
                                    <input type="text" name="room" id="room" class="form-control @error('room') is-invalid @enderror" 
                                           value="{{ old('room') }}" required>
                                    @error('room')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="visiting_hours">Visiting Hours *</label>
                                    <input type="text" name="visiting_hours" id="visiting_hours" class="form-control @error('visiting_hours') is-invalid @enderror" 
                                           value="{{ old('visiting_hours') }}" placeholder="e.g., 9:00 AM - 5:00 PM" required>
                                    @error('visiting_hours')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qualification">Qualification</label>
                                    <input type="text" name="qualification" id="qualification" class="form-control @error('qualification') is-invalid @enderror" 
                                           value="{{ old('qualification') }}">
                                    @error('qualification')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" 
                                           accept="image/*">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Visiting Days *</label>
                            <div class="row">
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" 
                                                   class="custom-control-input" 
                                                   id="day_{{ $loop->index }}"
                                                   name="visiting_days[]" 
                                                   value="{{ $day }}"
                                                   {{ in_array($day, old('visiting_days', [])) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="day_{{ $loop->index }}">
                                                {{ $day }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('visiting_days')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Add Doctor
                            </button>
                            <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
