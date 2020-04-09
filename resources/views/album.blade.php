@extends('layouts.app')

@section('content')

<h1>My stories</h1>
@foreach($albums as $album)
<div>
<h4>{{$album->title}}</h4>
<p>{{$album->text}}</p>
<div>
@endforeach
@endsection