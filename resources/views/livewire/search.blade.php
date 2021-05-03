<div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search images" aria-label="Search images"
            aria-describedby="Search images" wire:model.debounce.500ms="search">
    </div>
    <div class="row">
        @if ($message == '')
            @foreach ($images as $image)
                <livewire:image-card :key="rand() . $image->id" :image="$image">
            @endforeach
        @else
            <div class="pl-3 pr-3 w-100">
                <div class="alert alert-danger w-100">{{ $message }}</div>
            </div>
        @endif
    </div>
</div>
