@extends('layouts.app')

@section('content')
<h1>send message to {{$user->username}}</h1>
<div>
    @foreach($messages as $message)
    @if($message->receiver_id == Auth::user()->id)
        <p>from: {{$user->username}}</p>
    @else
        <p>from: you</p>
    @endif
    <p>{{$message->message}}</p>
    @endforeach
</div>
<form action="{{route("send")}}" method="post">
    @csrf
    <input type="text" name="receiver" value={{$user->id}} hidden>
    <textarea name="message"></textarea>
    <button type="submit">Verzend</button>
</form>
@endsection