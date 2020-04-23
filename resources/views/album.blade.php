@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="block block-center block-filter block-bg"> 
        <form class="mood-selection" action="{{route('filter')}}" method="post">
        <div class="flex ">
            @csrf
            @foreach($moods as $mood)
          <input type="submit" class="mood-input" type="radio" name="mood" id={{$mood->id}} value={{$mood->id}} hidden>
          <label class="mood-label" class="flex" for={{$mood->id}}><img src="{{'../../'.$mood->picturepath.'/'.$mood->picturetitle}}"></label>  
          @endforeach          
        </div>
    </form>
       <div class="story-line">
        @foreach($albums as $album)
            <a href="{{route('detail', ['id' => $album->id])}}"><div class="date">{{$album->created_at}}</div><div class="stripe"></div><div class="circle"></div></a>
            <div class="stripe-hoz"></div>
        @endforeach
       </div>
    </div>
    <div class="block block-stories border">
        <div class="flex space-between">
        <h1 class="title-basic">Mijn herinneringen</h1>
        <div class="addbutton"><a href="{{route('createStory', 1)}}"><i class="fas fa-plus"></i></a></div>  
        </div>
        @foreach($albums as $album)
            {{-- <div class="scroll" id="{{$album->id}}"></div> --}}
            <div class="stories">
                <div class="flex space-between fullWidth">
                    <h2>{{$album->title}}</h2>
                    <p>{{$album->created_at}}</p>
                </div>
                <p class="margin-top">{{$album->text}}</p>
                @if($album->mood)
                <p class="margin-top">voelt zich {{$album->mood->mood}}</p>
                @endif
                @if($album->images->first() != null)
                @if($album->images->first()->type == 'image')
                <img class="fullWidth margin-top" src="/{{ $album->images->first()['path'].'/'.$album->images->first()['title']}}">
                @elseif($album->images->first()->type == 'audio')
                <audio class="fullWidth margin-top" controls style="height:54px;"><source src="{{asset($album->images->first()['path']  . '/' . $album->images->first()['title'])}}"></audio>
                @elseif($album->images->first()->type == 'video')
                <video  class="fullWidth margin-top" src="{{asset($album->images->first()['path']  . '/' . $album->images->first()['title'])}}" controls></video>
                @endif
                @endif
                <div class="flex space-between fullWidth margin-top">
                <a class="buttonfx slideleft btn-width" href="{{route('detail', $album->id)}}">bekijk</a>
                <a class="buttonfx slideleft btn-width" href="{{route('editStory', $album->id)}}">edit</a>
                <a class="buttonfx slideleft btn-width" href="{{route('deleteStory', $album->id)}}">delete</a>
                </div>
            </div>
        @endforeach
    </div>
    



@endsection