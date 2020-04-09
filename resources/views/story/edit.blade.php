@extends('layouts.app')

@section('content')
<form method="post" action="{{route('updateStory',$story->id)}}">
    @method("PATCH")
    @csrf

    <select name="category">
        @foreach($categories as $category)
          <option @if($story->category_id == $category->id) selected @endif
          value='{{$category->id}}' >
            {{ ucfirst($category->type) }}
          </option>
        @endforeach
      </select>
<label>Titel</label>
<input name="title" value="{{$story->title}}">
<label>Text</label>
<textarea name="text">{{$story->text}}</textarea>
<div>
  @foreach($moods as $mood)
  <input type="radio" name="mood" id={{$mood->id}} value={{$mood->id}}>
  <label for={{$mood->id}}>{{$mood->mood}}</label>
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


@foreach($images as $image)
    <img style="width: 20px" src="{{asset($image->path  . '/' . $image->title)}}">
@endforeach
@foreach($audios as $audio)
<audio controls style="height:54px;"><source src="{{asset($audio->path  . '/' . $audio->title)}}"></audio>
@endforeach
@foreach($videos as $video)
<video  src="{{asset($video->path  . '/' . $video->title)}}" controls></video>
@endforeach

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

@endsection