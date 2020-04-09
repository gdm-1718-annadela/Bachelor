@extends('layouts.app')

@section('content')

<h1>Stories for everyone</h1>

<div><a href="{{route('createStory')}}">add story</a></div>

@foreach($stories as $story)
@if($story->images->first() != null)
@if($story->images->first()->type == 'image')
<img style="width: 300px" src="{{ $story->images->first()['path'].'/'.$story->images->first()['title']}}">
@elseif($story->images->first()->type == 'audio')
<audio controls style="height:54px;"><source src="{{asset($story->images->first()['path']  . '/' . $story->images->first()['title'])}}"></audio>
@elseif($story->images->first()->type == 'video')
<video  src="{{asset($story->images->first()['path']  . '/' . $story->images->first()['title'])}}" controls></video>
@endif
@endif

<h1><a href="{{route('detailStory', $story->id)}}">{{$story->title}}</a></h1>
@if($story->user->id != Auth::user()->id)
<p><a href="{{route('findUser', $story->user->id)}}">{{$story->user->username}}</p>
@else
<p>{{$story->user->username}}</p>
@endif
{{-- <p>{{$story->mood->mood}}</p> --}}
@endforeach
@endsection