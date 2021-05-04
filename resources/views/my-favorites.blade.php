<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('My Favorites') }}
        </h2>
    </x-slot>

    <div class="row">
        @foreach ($images as $image)
            @if ($image->favorites->contains('user_id', auth()->user()->id))
                <livewire:image-card :image="$image" :key="$loop->index" />
            @endif
        @endforeach
    </div>
</x-app-layout>
