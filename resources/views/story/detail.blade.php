
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="block block-center block-bg"> 
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
            @foreach($stories as $story)
                <a href="{{route('detail', $story->id)}}"><div class="date">{{$story->created_at}}</div><div class="stripe"></div><div class="circle"></div></a>
                <div class="stripe-hoz"></div>
            @endforeach
        </div>
    </div>
    <div class="block block-stories border">
        <div class="flex space-between">
            <h1 class="title-basic">Dit is een {{$category->type}}</h1>
            <div class="addbutton"><a href="{{route('createStory', $story->category_id)}}"><i class="fas fa-plus"></i></a></div>  
        </div>

        <h2 class="text-basic">{{$album->title}}</h2>
        <div class="text-basic">{{$album->text}}</div>
        @if($album->user_id == Auth::user()->id)
        <a class="buttonfx btn-orange slideleft btn-width text-basic margin-top" href="{{route('editStory', $album->id)}}">edit</a>
        @endif
        <a class="buttonfx btn-green slideleft btn-width text-basic margin-top" href="{{route('album')}}">keer terug</a>
        <div class="images">
            @foreach($images as $image)
                <div><img src="{{asset($image->path  . '/' . $image->title)}}"></div>
            @endforeach
            @foreach($audios as $audio)
                <div><audio controls style="height:54px;"><source src="{{asset($audio->path  . '/' . $audio->title)}}"></audio></div>
            @endforeach
            @foreach($videos as $video)
                <div><video src="{{asset($video->path  . '/' . $video->title)}}" controls></video></div>
            @endforeach
        </div>
    </div>
</div>




@endsection