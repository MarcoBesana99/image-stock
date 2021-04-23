<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('My Images') }}
        </h2>
    </x-slot>

    <div class="row">
        @foreach ($images as $image)
            <livewire:image-card :image="$image" :key="$loop->index" />
        @endforeach
    </div>
</x-app-layout>
