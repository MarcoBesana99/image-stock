<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentHandler extends Component
{
    public $comment;
    public $imageId;
    public $amount = 1;

    protected $rules = [
        'comment' => 'required'
    ];

    public function render()
    {
        $allComments = Comment::where('image_id', $this->imageId);
        $comments = $allComments->orderBy('created_at', 'desc')->take($this->amount)->get();
        $numberOfComments = $allComments->count();
        $showMore = true;
        $showLess = false;
        if ($this->amount >= $numberOfComments) {
            $showMore = false;
            $showLess = True;
        }
        if ($this->amount == 2) {
            $showMore = true;
            $showLess = false;
        }
        if ($numberOfComments < 2) {
            $showMore = false;
            $showLess = false;
        }
        return view('livewire.comment-handler',compact('showMore','showLess','comments','numberOfComments'));
    }

    public function comment() {
        $this->validate($this->rules);
        $comment = new Comment();
        $comment->content = $this->comment;
        $comment->user_id = Auth::user()->id;
        $comment->image_id = $this->imageId;
        $comment->save();
        $this->comment = '';
    }

    public function showMore()
    {
        $this->amount += 2;
    }

    public function showLess()
    {
        $this->amount = 1;
    }
}
