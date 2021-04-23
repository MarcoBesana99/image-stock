<div class="col-lg-4 col-md-12 col-12 mt-4" x-data="{show :true}" x-show="show">
    <div class="card image">
        <div class="card-body">
            <h2>{{ $image->title }}</h2>
        </div>
        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
        <div class="card-body">
            <h5>Tags</h5>
            <div>
                @foreach (explode(',', $image->tags) as $tag)
                    <span class="badge badge-primary p-1">{{ $tag }}</span>
                @endforeach
            </div>
            <button class="btn btn-danger mt-3"
                x-on:click="$wire.delete({{ $image->id }}); show = false">Delete</button>
        </div>
    </div>
</div>
