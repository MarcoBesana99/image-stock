<form class="image-form container" wire:submit.prevent="submit" enctype="multipart/form-data">
    <div class="row">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="file-input">Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file-input" aria-describedby="file-input" required
                    wire:model="fileName">
                <label class="custom-file-label" for="file-input">Choose file</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="tag-input">Tag</span>
            </div>
            <input type="text" class="image-form__tag-input form-control" aria-label="tag-input"
                aria-describedby="tag-input" required wire:model.lazy="tag">
            <button type="button" class="btn btn-secondary" wire:click="addTag">Add</button>
        </div>
    </div>

    <div class="row">
        @for ($i = 0; $i < count($tags); $i++)
            <div class="image-form__tag">
                <p>
                    {{ $tags[$i] }}
                </p>
                <button type="button" class="close" aria-label="Close" wire:click="removeTag({{ $i }})">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endfor
    </div>

    <div class="row justify-content-end">
        <button type="submit" class="btn btn-primary right">Submit</button>
    </div>
</form>
