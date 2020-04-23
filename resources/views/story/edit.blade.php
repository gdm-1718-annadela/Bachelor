@extends('layouts.app')

@section('content')
<div class="container">
  <div class="block block-bg-color">
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
  <div class="block block-center">
    <div>
    <form class="" method="post" action="{{route('updateStory',$story->id)}}">
      @method("PATCH")
      @csrf
        <h1 class="title-basic">Jou </h1>
        <select class="title-basic select" name="category">
        @foreach($categories as $category)
          <option @if($story->category_id == $category->id) selected @endif
          value='{{$category->id}}' >
          {{ ucfirst($category->type) }}
          </option>
        @endforeach
        </select>
        
        <div class="input-icon">
          <input class="input-basic text-basic" placeholder="titel" name="title" value="{{$story->title}}">
        </div>

        <div class="input-icon">
          <textarea class="input-basic text-basic" placeholder="jou tekst" name="text">{{$story->text}}</textarea>
        </div>
        <p class="text-basic mood-box">Ik voel me / voelde me: </p>
        <div class="flex mood-box">
         
            @foreach($moods as $mood)
            <input @if($story->mood_id == $mood->id) checked @endif class="mood-input" type="radio" name="mood" id={{$mood->id}} value={{$mood->id}} hidden>
            <label class="mood-label" class="flex" for={{$mood->id}}>{{$mood->mood}}<img src="{{'../../'.$mood->picturepath.'/'.$mood->picturetitle}}"></label>
            @endforeach
          
        </div>

        <button type="submit">Update</button>
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            <ul>
            <li>{{ $error }}</li>
            </ul>
          </div>
        @endforeach
    </form>
    <form action="{{ route('imageUpload', $story->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="story_id" value="{{$story->id}}" hidden>
        <div>
          <span>Voeg afbeelding toe</span>
          <input type="file" name="file[]" id="file" enctype="multipart/form-data">
        </div>
      <button type="submit">
      Afbeelding posten
      </button>
    </form>
    <form action="{{ route('audioUpload', $story->id) }}" method="post" enctype="multipart/form-data">
    @csrf
      <input type="text" name="story_id" value="{{$story->id}}" hidden>
      <div>
        <span>Voeg audio toe</span>
        <input type="file" name="file[]" id="file" enctype="multipart/form-data">
      </div>
      <button type="submit">
      Audio posten
      </button>
    </form>
    <form action="{{ route('videoUpload', $story->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="story_id" value="{{$story->id}}" hidden>

      <div>
        <span>Voeg een video toe</span>
        <input type="file" name="file[]" id="file" enctype="multipart/form-data">
      </div>
      <button type="submit">
      Video posten
      </button>
    </form>
  </div>
</div>
</div>
@endsection

<script>
  </script>