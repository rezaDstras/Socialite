<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
//        $channels=Channel::orderBy('title')->get();
//        return view('channels.index',compact('channels'));
        return view('channels.index');
    }
}
