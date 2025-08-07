<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Doctors</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search doctors...">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <button wire:click="create" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add New Doctor
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
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
                                        <th>Visiting Days</th>
                                        <th>Contact</th>
                                        <th>Status</th>
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
                                            <td>
                                                <strong>{{ $doctor->name }}</strong>
                                                @if($doctor->qualification)
                                                    <br><small class="text-muted">{{ $doctor->qualification }}</small>
                                                @endif
                                            </td>
                                            <td>{{ $doctor->specialty }}</td>
                                            <td>
                                                @if(is_array($doctor->visiting_days))
                                                    @foreach($doctor->visiting_days as $day)
                                                        <span class="badge badge-info mr-1">{{ $day }}</span>
                                                    @endforeach
                                                @else
                                                    {{ $doctor->visiting_days }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($doctor->phone)
                                                    <div><i class="fa fa-phone"></i> {{ $doctor->phone }}</div>
                                                @endif
                                                @if($doctor->email)
                                                    <div><i class="fa fa-envelope"></i> {{ $doctor->email }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $doctor->is_active ? 'success' : 'danger' }}">
                                                    {{ $doctor->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <button wire:click="edit({{ $doctor->id }})" class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button wire:click="toggleStatus({{ $doctor->id }})" 
                                                        class="btn btn-sm btn-{{ $doctor->is_active ? 'warning' : 'success' }}">
                                                    <i class="fa fa-{{ $doctor->is_active ? 'pause' : 'play' }}"></i>
                                                </button>
                                                <button wire:click="delete({{ $doctor->id }})" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this doctor?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No doctors found.</td>
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

    <!-- Modal -->
    @if($isModal)
        <div class="modal fade show" style="display: block;" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $doctor_id ? 'Edit Doctor' : 'Add New Doctor' }}</h5>
                        <button type="button" class="close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="{{ $doctor_id ? 'update' : 'store' }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" wire:model="name" class="form-control" required>
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Specialty *</label>
                                        <input type="text" wire:model="specialty" class="form-control" required>
                                        @error('specialty') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input type="text" wire:model="qualification" class="form-control">
                                        @error('qualification') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" wire:model="phone" class="form-control">
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" wire:model="email" class="form-control">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" wire:model="image" class="form-control" accept="image/*">
                                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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
                                                       wire:model="visiting_days" 
                                                       value="{{ $day }}">
                                                <label class="custom-control-label" for="day_{{ $loop->index }}">
                                                    {{ $day }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('visiting_days') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Bio</label>
                                <textarea wire:model="bio" class="form-control" rows="3" placeholder="Doctor's biography..."></textarea>
                                @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active" wire:model="is_active">
                                    <label class="custom-control-label" for="is_active">Active</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ $doctor_id ? 'Update' : 'Create' }} Doctor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
