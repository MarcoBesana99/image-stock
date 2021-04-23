<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;

class ImageCard extends Component
{
    public $image;

    public function render()
    {
        return view('livewire.image-card');
    }

    public function delete($id)
    {
        Image::where('id',$id)->delete();
    }
}
