<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('User.Common.home');
    }

    public function profileSetting()
    {
        return view('User.Common.Profile.setting');
    }

    public function profile($id=null)
    {
        return view('User.Common.Profile.main');
    }

    public function venues(){
        return view('User.Common.Profile.main');
    }

    public function people($id=null){
        return view('User.Common.Profile.people');
    }

    public function explore(){
        return view('User.Common.Explore.main');
    }
}
