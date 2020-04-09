@extends('layouts.app')

@section('content')
<div class="container">
<h1>{{Auth::user()->firstname}} {{Auth::user()->name}}</h1>
<p>{{Auth::user()->age}}</p>
<p>{{Auth::user()->story}}</p>
</div>
@endsection
