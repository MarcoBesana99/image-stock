<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentHandler extends Component
{
    public $comment;
    public $imageId;
    public $comments;
    public $amount = 1;
    public $numberOfComments;
    public $showMore = true;
    public $showLess = false;

    protected $rules = [
        'comment' => 'required'
    ];

    public function render()
    {
        return view('livewire.comment-handler');
    }

    public function mount() {
        $this->loadComments();
        $this->numberOfComments = Comment::where('image_id',$this->imageId)->count();
        $this->checkLoadingStatus();
    }

    public function checkLoadingStatus() {
        if ($this->amount >= $this->numberOfComments) {
            $this->showMore = false;
            $this->showLess = True;
        }
        if ($this->amount == 2) {
            $this->showMore = true;
            $this->showLess = false;
        }
        if ($this->numberOfComments <=2) {
            $this->showMore = false;
            $this->showLess = false;
        }
    }

    public function loadComments() {
        $this->comments =  Comment::where('image_id',$this->imageId)->orderBy('created_at', 'desc')->take($this->amount)->get();
    }

    public function comment() {
        $this->validate($this->rules);
        $comment = new Comment();
        $comment->content = $this->comment;
        $comment->user_id = Auth::user()->id;
        $comment->image_id = $this->imageId;
        $comment->save();
        $this->comment = '';
        $this->emitUp('refreshComments');
    }

    public function showMore()
    {
        $this->amount += 2;
        $this->loadComments();
        $this->checkLoadingStatus();
    }

    public function showLess()
    {
        $this->amount -= 2;
        $this->loadComments();
        $this->checkLoadingStatus();
    }
}
