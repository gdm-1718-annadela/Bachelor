<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Comment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function contact(Request $request)
    {

        \request()->validate( [
            'email'=> 'required',
            'comment'=> 'required',
        ]);

        $user_id = User::where('email', $request->email)->first()->id;

        $data = [
            'user_id'=>$user_id,
            'comment'=>request('comment'),
        ];

        $comment= Comment::create($data);
        $comment_id = Comment::where('id',$comment->id)->first()->id;

        return redirect('/#Contact');
    }
}
