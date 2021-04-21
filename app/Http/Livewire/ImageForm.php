<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageForm extends Component
{
    use WithFileUploads;
    public $fileName;

    public $tag;
    public $tags = array();

    public function addTag() {
        if (strlen($this->tag) > 0 )
            array_push($this->tags, $this->tag);
    }

    public function removeTag($index) {
        array_splice($this->tags, $index, 1);
    }

    public function submit() {
        $dataValid = $this->validate([
            'fileName' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
        ]);

        $dataValid['fileName'] = $this->fileName->store('images', 'public');

        $user_id = Auth::user()->id;

        if (count($this->tags) == 0)
            $tags_string = $this->tag;
        else
            $tags_string = join(', ', $this->tags);

        DB::insert("insert into images (image_path, tags, user_id) values (?, ?, ?)", [$this->fileName, $tags_string, $user_id]);

        session()->flash('message', 'File uploaded.');
    }

    public function render()
    {
        return view('livewire.image-form');
    }
}
