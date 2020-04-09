@extends('layouts.app')

@section('content')

<h1>Tips for everyone</h1>
@foreach($tips as $tip)
<h1>{{$tip->title}}</h1>
@endforeach
@endsection