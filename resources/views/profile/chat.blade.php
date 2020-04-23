@extends('layouts.app')
@section('content')
<div>
    <div class="chat-head ">
        <div class="profile-picture" @if(Auth::user()->picturetitle)style="background-image:url({{ Auth::user()->picturepath.'/'.Auth::user()->picturetitle}}"@endif></div>
        <h1 class="title-basic">Berichten</h1>
    </div>
    <div class="browse">
        <form action="{{route("findChat")}}" method="get" autocomplete="off">
            
            <button class="buttonfx slideleft btn-orange" type="submit"><i class="fas fa-search"></i></button>
            <input list="users" name="user">
            <datalist id="users">
            @foreach($users as $user)
                <option data-value={{$user->id}}>{{$user->username}}</option>
            @endforeach
            </datalist>
                
        </form>
    </div>

    <div class="block-chat">
    @foreach($last_chats as $last_chat)
        @if($last_chat['sender_id'] == Auth::user()->id)
            <div>
                <?php $id = $last_chat['receiver_id']?>
                <?php $receiver = $user->where('id', $id)->first()?>
                <a href="/chatuser?user={{$receiver->username}}">
                    <div class="flex chat-person">
                        <div class="profile-picture icon" style="background-image:url({{ asset($receiver->picturepath.'/'.$receiver->picturetitle)}}"></div>
                        <div class="flex chat-box">
                            <div class="chat-message">
                            <h3>{{$receiver->username}}</h3>
        @elseif($last_chat['receiver_id'] == Auth::user()->id)

                <?php $id = $last_chat['sender_id']?>
                <?php $sender = $user->where('id', $id)->first() ?>
                <a href="/chatuser?user={{$sender->username}}">
                    <div class="flex chat-person">
                        <div class="profile-picture icon" style="background-image:url({{ asset($sender->picturepath.'/'.$sender->picturetitle)}}"></div>
                        <div class="flex chat-box">
                            <div class="chat-message">
                            <h3>{{$sender->username}}</h3>
        @endif 
                            <p >{{substr($last_chat['message'], 0, 200)}}</p>
                        </div>
                        <p class="light-gray">{{Carbon\Carbon::parse($last_chat['created_at'])->format('Y-m-d, H:m')}}</p>
                        </div>
                    </div>
                </a>
    @endforeach
    </div>
</div>

@endsection