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
        $images = Image::orderBy('created_at','desc')->where('user_id', auth()->user()->id)->get();

        return view('my-images', compact('images'));
    }
}
