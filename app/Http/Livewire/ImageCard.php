<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ImageCard extends Component
{
    public $imageId;
    public $title;
    public $tags;
    public $image_path;
    public $user_id;

    protected $listeners = ['refreshComments' => 'render'];

    public function render()
    {
        return view('livewire.image-card');
    }

    public function mount($image) {
        $this->imageId = $image->id;
        $this->title = $image->title;
        $this->tags = $image->tags;
        $this->image_path = $image->image_path;
        $this->user_id = $image->user_id;
    }

    public function delete($id)
    {
        $user_id = Auth::user()->id;

        if ($user_id === $this->user_id)
            Image::where('id',$id)->delete();
    }
}
