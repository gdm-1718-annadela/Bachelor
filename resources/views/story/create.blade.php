@extends('layouts.app')

@section('content')
<form action="{{route("saveStory")}}" method="post">
    @csrf

    <h1>make a new

    <select name="category">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->type}}</option>
    @endforeach
    </select>
</h1>

    <label>title</label>
    <input name="title" type="text" value="{{ old('title') }}">

    <input type="submit">
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      <ul>
  
        <li>{{ $error }}</li>
  
      </ul>
    </div>
    @endforeach


</form>

@endsection