<div>
    <div class="mt-3 border border-left-0 border-right-0 border-bottom-0 comment-container">
        <div class="text-right mt-1 comments-number">{{ $numberOfComments }} comments</div>
        @foreach ($comments as $comment)
            <div class="comment bg-light p-2 rounded mt-2">
                <h5 class="font-weight-bold">{{ $comment->user->name }}</h5>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
    @if ($showMore)
        <div class="text-center mt-2">
            <a wire:click="showMore" class="show-link">Show More</a>
        </div>
    @else
        @if ($showLess)
            <div class="text-center mt-2">
                <a wire:click="showLess" class="show-link">Show Less</a>
            </div>
        @endif
    @endif
    @auth
        <form wire:submit.prevent="comment" class="mt-2">
            @csrf
            <textarea class="form-control" wire:model.lazy="comment" rows="1"></textarea>
            @error('comment') <div class="alert alert-danger mt-3" role="alert">{{ $message }}</div> @enderror
            <button type="submit" class="btn-block btn btn-primary mt-2 btn-comment">Submit comment</button>
        </form>
    @else
        <div class="text-center alert alert-warning mt-2">Log in order to be able to comment</div>
    @endauth
</div>
