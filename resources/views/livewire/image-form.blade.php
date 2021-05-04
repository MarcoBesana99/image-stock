<div class="justify-content-center row align-items-center flex-column">
    <h2>Upload your image</h2>
    <div class="col-lg-7 col-md-10 col-12 mt-4">
        <form class="image-form" wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            <div class="row flex-column">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="title-input">Title</span>
                    </div>

                    <div class="custom-file">
                        <input type="text" class="form-control" id="title-input" wire:model.lazy="title">
                    </div>
                </div>
                @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                @if ($file)
                    <h6>Preview</h6>
                    <img src="{{ $file->temporaryUrl() }}" class="image-form__img mb-3">
                @endif
            </div>

            <div class="row flex-column">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="file-input">Image</span>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file-input" aria-describedby="file-input"
                            accept=".jpg, .jpeg, .png, .svg, .gif" wire:model="file">
                        <label class="custom-file-label" for="file-input">Choose file</label>
                    </div>
                </div>
                @error('file') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="tag-input">Tag</span>
                    </div>
                    <input type="text" class="image-form__tag-input form-control" aria-label="tag-input"
                        aria-describedby="tag-input" wire:model.lazy="tag">
                    <button type="button" class="btn btn-secondary" wire:click="addTag">Add</button>
                </div>
            </div>

            <div class="row flex-column">
                <div class="image-form__tags mb-3">
                    <h6>Tags: </h6>
                    @for ($i = 0; $i < count($tags); $i++)
                        <div class="image-form__tag">
                            <p>
                                {{ $tags[$i] }}
                            </p>
                            <button type="button" class="close" aria-label="Close"
                                wire:click="removeTag({{ $i }})">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endfor
                </div>
                @error('tags') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row mt-3">
                <button type="submit" id="submitBtn" class="btn btn-primary btn-block">Submit</button>
            </div>

            @if (session()->has('message'))
                <div class="mt-3">
                    <div class="alert alert-success">{{ session('message') }}</div>
                </div>
            @endif


            <!-- TODO configure driver -->
            <!-- <button type="button" class="btn btn-primary" wire:click="export">Get image</button> -->
        </form>

    </div>
</div>
