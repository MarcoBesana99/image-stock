<div class="col-lg-4 col-md-12 col-12 mt-4" x-data="{show :true}" x-show="show">
    <div class="card image">
        <div class="card-body">
            <h2>{{ $title }}</h2>
        </div>
        <img src="{{ asset('/' . $image_path) }}" alt="{{ $title }}">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Tags</h5>
                    <div>
                        @foreach (explode(',', $tags) as $tag)
                            <span class="badge badge-primary p-1">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                @if (!Route::is('my-images'))
                    @auth
                        <livewire:favorite-handler :key="rand() . $imageId" :imageId="$imageId" :image="$image" />
                    @endauth
                @endif
            </div>
            @if (Route::is('my-images'))
                <button class="btn btn-danger mt-3"
                    x-on:click="$wire.delete({{ $imageId }}); show = false">Delete</button>
            @endif
            @if (!Route::is('my-images'))
                <livewire:comment-handler :key="rand() . $imageId" :imageId="$imageId" />
            @endif
        </div>
    </div>
</div>
