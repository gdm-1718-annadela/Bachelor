@extends('layouts.app')

@section('content')
<h1>My chat</h1>
<form action="{{route("findChat")}}" method="get">

<input list="users" name="browser">
<datalist id="users">
@foreach($users as $user)
    <option data-value={{$user->id}}>{{$user->username}}</option>
@endforeach
</datalist>
<button type="submit">Chat</button>

</form>
@endsection