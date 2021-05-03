<div class="search">
    <div class="input-group mb-3">
        <input
            type="text"
            class="form-control"
            placeholder="Search images"
            aria-label="Search images"
            aria-describedby="Search images"
            wire:model.debounce.500ms="search"
        >
    </div>
    @foreach ($images as $image)
        <livewire:image-card :key="$image->id" :image="$image">
    @endforeach
</div>
