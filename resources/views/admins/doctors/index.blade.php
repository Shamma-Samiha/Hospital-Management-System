@extends('admins.layouts.app')

@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Doctors</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search doctors...">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add New Doctor
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Specialty</th>
                                    <th>Room</th>
                                    <th>Visiting Hours</th>
                                    <th>Visiting Days</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $doctor)
                                    <tr>
                                        <td>
                                            @if($doctor->image)
                                                <img src="{{ asset('storage/' . $doctor->image) }}" 
                                                     alt="{{ $doctor->name }}" 
                                                     class="rounded-circle" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fa fa-user text-white"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td><strong>{{ $doctor->name }}</strong></td>
                                        <td>{{ $doctor->specialty }}</td>
                                        <td>{{ $doctor->room }}</td>
                                        <td>{{ $doctor->visiting_hours }}</td>
                                        <td>
                                            @if(is_array($doctor->visiting_days))
                                                @foreach($doctor->visiting_days as $day)
                                                    <span class="badge badge-info mr-1">{{ $day }}</span>
                                                @endforeach
                                            @else
                                                {{ $doctor->visiting_days }}
                                            @endif
                                        </td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Are you sure you want to delete this doctor?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No doctors found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
