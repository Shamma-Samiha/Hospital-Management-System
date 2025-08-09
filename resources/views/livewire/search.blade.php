<div class="serch-bar">
    <div id="custom-search-input">
        <div class="input-group col-md-12">
            <input type="search" wire:model.debounce.500ms="item" class="form-control input-lg" placeholder="Search doctors by name or specialty" />
            <span class="input-group-btn">
                <button class="btn btn-info btn-lg" wire:click="search" type="button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </span>
        </div>
    </div>

    @if(!empty($results))
        <div class="search-results bg-white border mt-2 rounded shadow-sm" style="max-height: 300px; overflow-y: auto;">
            @forelse($results as $doctor)
                <a href="{{ url('docters') }}" class="d-block py-1 px-2 border-bottom text-dark text-decoration-none" style="line-height: 1.2;">
                    <strong>{{ $doctor->name }}</strong> - <small>{{ $doctor->specialty }}</small>
                </a>
            @empty
                <div class="p-2 text-muted">No results found.</div>
            @endforelse
        </div>
    @endif
</div>
