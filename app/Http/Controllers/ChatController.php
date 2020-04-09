<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    public function chat()
    {
        $users = User::all()->where('id', '!=', Auth::user()->id);
        return view('profile.chat')->with(compact('users'));
    }
    public function findUser(Request $request)
    {
        $user = User::where('username', request('browser'))->first();
        $chatCombo = Auth::user()->id.'_'.$user->id;
        $chatCombo = array($user->id, Auth::user()->id);
        sort($chatCombo);
        $key = implode("_", $chatCombo);
        // dd($chatCombo);
        $messages= Message::with('user')->where('chat_id', $key)->get();
        return view('chat.chat')->with(compact('user', 'messages'));
    }
    public function saveChat(Request $request)
    {
        // dd($request);
        \request()->validate( [
            'message'=> 'required',
            'receiver'=> 'required',
        ]);

        $chatCombo = array((int)request('receiver'), (int)Auth::user()->id);
        sort($chatCombo);
        $key = implode("_", $chatCombo);


        $data = [
            'message'=>request('message'),
            'sender_id'=> Auth::user()->id,
            'receiver_id'=>request('receiver'),
            'chat_id'=>$key,
        ];
        
        $message = Message::create($data);
        return redirect()->back();

    }
}
