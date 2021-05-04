<?php

namespace App\Http\Livewire;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteHandler extends Component
{
    public $imageId;
    public $bookmarked = false;
    public $image;

    public function render()
    {
        return view('livewire.favorite-handler');
    }

    public function mount()
    {
        $this->favoriteStatus();
    }

    public function favoriteStatus()
    {
        if ($this->image->favorites->where('user_id', Auth::user()->id)->count() > 0)
            $this->bookmarked = true;
        else
            $this->bookmarked = false;
    }

    public function favorite()
    {
        if ($this->bookmarked)
            $this->image->favorites->where('user_id', Auth::user()->id)->first()->delete();
        else {
            $favorite = new Favorite();
            $favorite->user_id = Auth::user()->id;
            $favorite->image_id = $this->imageId;
            $favorite->save();
        }
        $this->emitUp('refreshFavorites');
    }
}
