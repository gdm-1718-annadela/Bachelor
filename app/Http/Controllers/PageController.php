<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
 

class PageController extends Controller
{
    public function profile()
    {
        $userId = Auth::user();
        return view('profile')->with(compact('userId'));
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function find($id)
    {
        $user = User::where('id', $id)->first();
        // dd(User::where('id', $id));
        return view('profile.person')->with(compact('user'));
    }
}
