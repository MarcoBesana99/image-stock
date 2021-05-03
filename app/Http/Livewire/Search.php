<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;

class Search extends Component {
    public $images;
    public $search;
    public $matchedTags = array();

    public function render() {
        return view('livewire.search');
    }

    public function mount() {
        $this->images = Image::orderBy('created_at', 'DESC')->take(10)->get();
    }

    function getTags($image) {
        return $image->tags;
    }

    public function updated() {
        $allImages = new Image();
        $images = $allImages->orderBy('created_at', 'DESC')->take(10)->get();
        $allTagsArray = array_map(array($this, 'getTags'), json_decode($images));
        $searchedArray = explode(' ', $this->search);

        foreach($allTagsArray as $imageTagsString) {
            $imageTagsArray = explode(' ', $imageTagsString);

            foreach($imageTagsArray as $tag) {

                foreach($searchedArray as $searchedTag) {
                    $normalized = str_replace(',', '', $tag);

                    if ($normalized === $searchedTag)
                        array_push($this->matchedTags, $normalized);
                }
            }
        }


        if (count($this->matchedTags) > 0) {
            $newImages = array();

            foreach($this->matchedTags as $matchedTag) {

                foreach(json_decode($images) as $image) {

                    if (strpos($image->tags, $matchedTag) !== false)
                        array_push($newImages, $image);
                }
            }

            if (count($newImages) > 0)
                $this->images = $newImages;

            $this->matchedTags = array();
        }
    }
}
