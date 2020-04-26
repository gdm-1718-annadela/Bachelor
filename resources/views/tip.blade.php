@extends('layouts.app')

@section('content')
<div class="container">
    <div class="block block-left-less block-bg "> 
        <button class="filter-button" id="choseType">Type amputatie</button>

        <form class="mood-selection" action="{{route('filtertypetip')}}" method="post">
            <div id="allTypes" class="flex none">
                @csrf
                @foreach($types as $type)
                <input type="submit" class="mood-input" type="radio" name="type" id={{$type->id}} value={{$type->id}} hidden>
                <label  class="mood-label" class="flex" for={{$type->id}}>{{$type->type}}<img src="{{'../../'.$type->picturepath.'/'.$type->picturetitle}}"></label>  
                @endforeach       
                <a href="{{asset("tip")}}">
                    <i class="far fa-times-circle"></i>
                    <label class="mood-label" class="flex">Alles</label>  
                      </a>
            </div>
        </form>
    </div>
    <div class="block block-stories block-right-more border">
        <div class="flex space-between">
        <h1 class="title-basic">Tips</h1>
        <div class="addbutton"><a href="{{route('createStory', 3)}}"><i class="fas fa-plus"></i></a></div>  
        </div>
        @foreach($stories as $story)
            <div class="scroll" id="{{$story->id}}"></div>
            <div class="stories">
                <div class="profile-picture" style="background-image: url('/{{ $story->user->picturepath.'/'.$story->user->picturetitle}}')"></div>
                <a class="user" href="{{route('findUser', $story->user_id)}}"><h2>{{$story->user->username}}</h2></a>

                <div class="flex space-between fullWidth margin-top">
                    <h1>{{$story->title}}</h1>

                    <p>{{$story->created_at}}</p>
                </div>
                <p class="margin-top">{{$story->text}}</p>
                @if($story->type)
                <div class="flex">
                    {{$story->type->type}}
                    <img style="width:60px" src="{{asset($story->type->picturepath  . '/' . $story->type->picturetitle)}}">
                </div>
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

<script>
    window.addEventListener('load', function(){
        let ontype = "false";
        let types = document.getElementById('allTypes');
        let buttontype = document.getElementById('choseType')
        buttontype.addEventListener('click', function(){
            if(ontype == "false"){
                types.style.display = "block"
                ontype = "true"
            }else {
                types.style.display = "none"
                ontype = "false"
            }
        })
    })
   
    
</script>