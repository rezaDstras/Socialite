<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
//        $channels=Channel::orderBy('title')->get();
//        return view('posts.create',compact('channels'));
        return view('posts.create');
    }
}
