<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('My Images') }}
        </h2>
    </x-slot>

    <div class="row">
        @forelse ($images as $image)
            <livewire:image-card :image="$image" :key="$loop->index" />
        @empty
            <div class="alert alert-danger">You haven't uploaded any images yet.</div>
        @endforelse
    </div>
</x-app-layout>
