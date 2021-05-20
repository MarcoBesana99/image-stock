<?php

namespace App\Http\Controllers;

use App\Models\Image;

class MyImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = auth()->user()->images->sortByDesc('created_at');

        return view('my-images', compact('images'));
    }
}
