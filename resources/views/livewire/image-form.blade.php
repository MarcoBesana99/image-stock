<div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="file-input">Image</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="file-input" aria-describedby="file-input">
            <label class="custom-file-label" for="file-input">Choose file</label>
        </div>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="tags-input">Tags</span>
        </div>
        <input type="text" class="form-control" aria-label="tags-input" aria-describedby="tags-input"
            wire:model.lazy="tag" wire:keydown.enter="addTag">
    </div>

    <div>
        @foreach ($tags as $tag)
            <div>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>
                    {{ $tag }}
                </p>
            </div>
        @endforeach
    </div>

</div>
