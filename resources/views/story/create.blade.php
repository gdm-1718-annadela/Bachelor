@extends('layouts.app')

@section('content')
<div class="container">
  <div class="block block-bg block-left-less"></div>
  <div class="block block-right-more border block-stories">
    <form action="{{route("saveStory")}}" method="post">
      @csrf

      <h1 class="title-basic">Maak een

        <select class="title-basic select" name="category">
          @foreach($categories as $category)
            <option class="text-basic" @if($category->id == (int)$type) selected @endif value='{{$category->id}}' >
            {{ ucfirst($category->type) }}
            </option>
          @endforeach
        </select>
      </h1>

      <div class="input-icon">
      <input class="text-basic input-basic" placeholder="Geef jou herinnering een titel" name="title" type="text" value="{{ old('title') }}">
      </div>

      <button class="padding-button buttonfx slideleft btn-orange" type="submit">Ga verder</button>
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
@endsection