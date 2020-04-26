@extends('layouts.app')

@section('content')
<div class="container">
  <div class="block block-bg-color block-left-less">
    <div class="images images-hover">
      @foreach($images as $image)
        <div>
          <form action="{{route('delete', $image->id)}}" method="get">
            <img src="{{asset($image->path  . '/' . $image->title)}}">
            <button class="delete-btn"><i class="fas fa-trash"></i></button>
          </form>
        </div>
      @endforeach
      @foreach($audios as $audio)
          <div>
            <form action="{{route('delete',$audio->id)}}" method="get">
              <audio controls style="height:54px;"><source src="{{asset($audio->path  . '/' . $audio->title)}}"></audio>
              <button class="delete-btn"><i class="fas fa-trash"></i></button>
            </form>
          </div>
      @endforeach
      @foreach($videos as $video)
          <div>
            <form action="{{route('delete',$video->id)}}" method="get">
              <video src="{{asset($video->path  . '/' . $video->title)}}" controls></video>
              <button class="delete-btn"><i class="fas fa-trash"></i></button>
            </form>
          </div>
      @endforeach
  </div>

  </div>
  <div class="block block-right-more block-stories border">
    <div class="flex  margin-top file-buttons">
      <form action="{{ route('imageUpload', $story->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="story_id" value="{{$story->id}}" hidden>
          <div>
            <label id="choseImage" for="file" class="text-basic padding-button" ><i class="far fa-images"></i> <span>Voeg afbeelding toe</span></label>
            <input type="file" name="file[]" id="file" enctype="multipart/form-data" hidden >
          </div>
        <button class="text-basic padding-button buttonfx slideleft btn-orange transparent" type="submit" id="submitImage">
          <i class="far fa-images"></i> 
        </button>
      </form>
      <form action="{{ route('audioUpload', $story->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="story_id" value="{{$story->id}}" hidden>
          <div>
            <label id="choseAudio" for="audio" class="text-basic padding-button" ><i class="fas fa-volume-up"></i> <span>Voeg audio toe</span></label>
            <input type="file" name="file[]" id="audio" enctype="multipart/form-data" hidden >
          </div>
        <button class="text-basic padding-button buttonfx slideleft btn-orange transparent" type="submit" id="submitAudio">
          <i class="fas fa-volume-up"></i>
          </button>
      </form>
  
      <form action="{{ route('videoUpload', $story->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="story_id" value="{{$story->id}}" hidden>
  
        <div>
          <label id="choseVideo" for="video" class="text-basic padding-button" ><i class="fas fa-video"></i> <span>Voeg een video toe</span></label>
          <input type="file" name="file[]" id="video" enctype="multipart/form-data" hidden >
        </div>
        <button class="text-basic padding-button buttonfx slideleft btn-orange transparent" type="submit" id="submitVideo">
       <i class="fas fa-video"></i> 
        </button>
      </form>
    </div>
    <div>
    <form class="" method="post" action="{{route('updateStory',$story->id)}}">
      @method("PATCH")
      @csrf
      <div class="flex">
        <h1 class="title-basic">Jou </h1>
        <select class="title-basic select" name="category">
        @foreach($categories as $category)
          <option @if($story->category_id == $category->id) selected @endif
          value='{{$category->id}}' >
          {{ ucfirst($category->type) }}
          </option>
        @endforeach
        </select>
      </div>
        
        <div class="input-icon">
          <input class="input-basic text-basic" placeholder="titel" name="title" value="{{$story->title}}">
        </div>

        <div class="input-icon">
          <textarea class="input-basic text-basic" placeholder="jou tekst" name="text">{{$story->text}}</textarea>
        </div>
        
        @if($story->category_id != 3)
        <p class="text-basic mood-box">Ik voel me / voelde me: </p>
        <div class="flex mood-box">
         
            @foreach($moods as $mood)
            <input @if($story->mood_id == $mood->id) checked @endif class="mood-input" type="radio" name="mood" id="mood_{{$mood->id}}" value={{$mood->id}} hidden>
            <label class="mood-label" class="flex" for="mood_{{$mood->id}}">{{$mood->mood}}<img src="{{'../../'.$mood->picturepath.'/'.$mood->picturetitle}}"></label>
            @endforeach
          
        </div>
        @endif
        @if($story->category_id != 1)
        <p class="text-basic mood-box">Soort amputatie</p>
        <div class="flex mood-box">
         
            @foreach($types as $type)
            <input  @if($story->type_id == $type->id) checked @endif class="mood-input" type="radio" name="type" id="type_{{$type->id}}" value={{$type->id}} hidden>
            <label class="mood-label" class="flex" for="type_{{$type->id}}">{{$type->type}}<img src="{{'../../'.$type->picturepath.'/'.$type->picturetitle}}"></label>
            @endforeach
          
        </div>
        @endif


        <button class=" margin-top buttonfx btn-orange padding-button slideleft" type="submit">Pas aan</button>
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            <ul>
            <li>{{ $error }}</li>
            </ul>
          </div>
        @endforeach
    </form>


    
  </div>
</div>
</div>
@endsection

<script>
  window.addEventListener('load', function(){
    let choseImage = document.getElementById('choseImage');
    let submitImage = document.getElementById('submitImage');
    let choseAudio = document.getElementById('choseAudio');
    let submitAudio = document.getElementById('submitAudio');
    let choseVideo = document.getElementById('choseVideo');
    let submitVideo = document.getElementById('submitVideo');

    choseImage.addEventListener('click', function(){
        choseImage.style.display = "none"
        submitImage.style.display = "block"
    })
    choseAudio.addEventListener('click', function(){
        choseAudio.style.display = "none"
        submitAudio.style.display = "block"
    })
    choseVideo.addEventListener('click', function(){
        choseVideo.style.display = "none"
        submitVideo.style.display = "block"
    })
  })
  
</script>
