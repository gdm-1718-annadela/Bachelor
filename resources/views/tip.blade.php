@extends('layouts.app')

@section('content')
<div class="container">
    <div class="block block-center block-bg "> 
        <form class="mood-selection" action="{{route('filterstory')}}" method="post">
        <div class="flex ">
            @csrf
            @foreach($moods as $mood)
          <input type="submit" class="mood-input" type="radio" name="mood" id={{$mood->id}} value={{$mood->id}} hidden>
          <label class="mood-label" class="flex" for={{$mood->id}}><img src="{{'../../'.$mood->picturepath.'/'.$mood->picturetitle}}"></label>  
          @endforeach          
        </div>
    </form>
       {{-- <div class="story-line">
        @foreach($stories as $story)
            <a href="{{route('detailStory', $story->id)}}"><div class="date">{{$story->created_at}}</div><div class="stripe"></div><div class="circle"></div></a>
            <div class="stripe-hoz"></div>
        @endforeach
       </div> --}}
    </div>
    <div class="block block-stories  border">
        <div class="flex space-between">
        <h1 class="title-basic">Tips</h1>
        <div class="addbutton"><a href="{{route('createStory', 3)}}"><i class="fas fa-plus"></i></a></div>  
        </div>
        @foreach($stories as $story)
            <div class="scroll" id="{{$story->id}}"></div>
            <div class="stories">
                <div class="profile-picture" style="background-image: url('/{{ $story->user->picturepath.'/'.$story->user->picturetitle}}')"></div>
            <h1>{{$story->title}}</h1>
                <div class="flex space-between fullWidth margin-top">
                <a href="{{route('findUser', $story->user_id)}}"><h2>{{$story->user->username}}</h2></a>
                    <p>{{$story->created_at}}</p>
                </div>
                <p class="margin-top">{{$story->text}}</p>
                @if($story->mood)
                <p class="margin-top">voelt zich {{$story->mood->mood}}</p>
                @endif


                <div class="images">
                    @foreach($images as $image)
                        @if($image->story_id == $story->id)
                        <div><img src="{{asset($image->path  . '/' . $image->title)}}"></div>
                        @endif
                    @endforeach
                    @foreach($audios as $audio)
                        @if($audio->story_id == $story->id)
                            <div><audio controls style="height:54px;"><source src="{{asset($audio->path  . '/' . $audio->title)}}"></audio></div>
                        @endif
                    @endforeach
                    @foreach($videos as $video)
                        @if($video->story_id == $story->id)
                            <div><video src="{{asset($video->path  . '/' . $video->title)}}" controls></video></div>
                        @endif
                    @endforeach
                </div>

                @if(Auth::user()->id == $story->user_id)
                <div class="flex space-between fullWidth margin-top">
                    <a class="buttonfx slideleft btn-width" href="{{route('detail', $story->id)}}">bekijk</a>
                    <a class="buttonfx slideleft btn-width" href="{{route('editStory', $story->id)}}">edit</a>
                    <a class="buttonfx slideleft btn-width" href="{{route('deleteStory', $story->id)}}">delete</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    



@endsection