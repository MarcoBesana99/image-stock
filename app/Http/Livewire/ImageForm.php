<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageForm extends Component
{
    use WithFileUploads;
    public $file;

    public $tag;
    public $tags = array();
    public $title;


    public function addTag() {
        $this->tag = preg_replace('/\s+/', '', $this->tag);

        if (strlen($this->tag) > 0 )
            array_push($this->tags, $this->tag);

        $this->tag = '';
    }

    public function removeTag($index) {
        array_splice($this->tags, $index, 1);
    }

    public function submit() {
        if (count($this->tags) === 0)
            $tags = $this->tag;
        else
            $tags = join(', ', $this->tags);

        $request = $this->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'tags' => 'required',
            'title' => 'required'
        ]);

        $file = $this->file->store('uploads', ['disk' => 'my_files']);
        $user_id = Auth::user()->id;

        $request['image_path'] = $file;
        $request['tags'] = $tags;
        $request['user_id'] = $user_id;
        $request['title'] = $this->title;

        Image::create($request);

        $this->tags = array();
        $this->tag = '';
        $this->file = null;
        $this->title='';

        session()->flash('message', 'File uploaded.');
    }

    public function render()
    {
        return view('livewire.image-form');
    }
}
