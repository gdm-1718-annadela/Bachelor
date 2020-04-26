@extends('layouts.app')

@section('content')

<div class="phone-screen">
    <div class="chat-head">
        <a href="{{route('findUser', $user->id)}}"><div class="profile-picture" @if($user->picturetitle)style="background-image:url({{$user->picturepath.'/'.$user->picturetitle}}"@endif></div></a>
        <h1 class="title-basic">stuur een bericht naar {{$user->username}}</h1>
    </div>
<div id="chat reverse" class=chat>
    @foreach($messages as $message)
    <div>
        @if($message->receiver_id == Auth::user()->id)
        <div class="chat-left flex">
            <div class="profile-picture icon" style="background-image:url({{ asset($user->picturepath.'/'.$user->picturetitle)}}"></div>
            <div class="width">
                <p>from: {{$user->username}}</p>
        @else
        <div class="chat-right flex">
            <div class="profile-picture icon" style="background-image:url({{ asset(Auth::user()->picturepath.'/'.Auth::user()->picturetitle)}}"></div>
            <div class="width">
                <p>from: you</p>
        @endif
                <p>{{$message->message}}</p>
            </div>
        </div>
    </div>
    @endforeach
    <div id="bottom"></div>
</div>

<div class="browse">
<form action="{{route("send")}}" method="post">
    @csrf
    <input type="text" name="receiver" value={{$user->id}} hidden>
    <textarea class="message" name="message"></textarea>
    <button type="submit" class="buttonfx slideleft btn-orange">Verzend</button>
</form>
</div>


<script>
    var winHeight = $(window).innerHeight();
    $(document).ready(function () {
    $("body").height(winHeight*$(".reverse").children("*").size());
    });

    $(window).on('scroll',function(){
    $(".reverse").css('bottom',$(window).scrollTop()*-1);
    });
    console.log($(".reverse").size());
</script>
@endsection

