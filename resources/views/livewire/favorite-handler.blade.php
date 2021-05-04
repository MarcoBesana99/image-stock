<div>
    <span>{{ $image->favorites->count() }}</span>
    @if ($bookmarked == true)
        <i wire:click="favorite" class="fas fa-bookmark text-primary bookmark" @if (Route::is('my-favorites')) x-on:click="show = false" @endif></i>
    @else
        <i wire:click="favorite" class="far fa-bookmark text-primary bookmark"></i>
    @endif
</div>
