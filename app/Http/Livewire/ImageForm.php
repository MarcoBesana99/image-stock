<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ImageForm extends Component
{

    public $tags = array();
    public $tag;
    public $userId;


    public function addTag() {
        array_push($this->tags, $this->tag);
    }



    public function submit() {
        $this->userId = Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.image-form');
    }


}
