<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function venues(){
        return view('User.Organizer.Venues.main');
    }

    public function event(){
        return view('User.Organizer.Event.main');
    }
}
