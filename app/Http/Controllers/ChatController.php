<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;



class ChatController extends Controller
{
    public function chat()
    {
        $user = User::all();
        $users = User::all()->where('id', '!=', Auth::user()->id);
        $chats = Message::all()->groupby('chat_id');
        $last_chats = [];

        // dd($chats);
        foreach($chats as $chat){
            $last_chat = count($chat) - 1;
            if($chat[$last_chat]->sender_id == Auth::user()->id){
                array_push($last_chats, $chat[$last_chat]);
            }elseif($chat[$last_chat]->receiver_id == Auth::user()->id) {
                array_push($last_chats, $chat[$last_chat]);
            }
        }
        $last_chats= collect($last_chats)->sortBy('created_at')->reverse()->toArray();
        // dd($last_chats);

        return view('profile.chat')->with(compact('users', 'chats', 'last_chats', 'user'));
    }
    public function findUser(Request $request)
    {
        $user = User::where('username', request('user'))->first();
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
