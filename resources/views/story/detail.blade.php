@extends('layouts.app')

@section('content')

<h1>{{$category->type}}</h1>
<h1>{{$story->title}}</h1>
<div>{{$story->text}}</div>
@if($story->user_id == Auth::user()->id)
<a href="{{route('editStory', $story->id)}}">edit</a>
@endif

@endsection