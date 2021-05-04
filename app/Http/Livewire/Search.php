<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;

class Search extends Component {
    public $images;
    public $search;

    public function render() {
        return view('livewire.search');
    }

    public function mount() {
        $this->loadImages();
    }

    public function loadImages() {
        $this->images = Image::orderBy('created_at', 'DESC')->take(10)->get();
    } 

    function getTags($image) {
        return $image->tags;
    }

    public function updated() {
        if($this->search == '') {
            $this->loadImages();
            return;
        }
        else {
            $allImages = new Image();
            $this->images = $allImages->orderBy('created_at', 'DESC')->where('tags', 'like', '%' . $this->search . '%')->get();
        }
    }
}
