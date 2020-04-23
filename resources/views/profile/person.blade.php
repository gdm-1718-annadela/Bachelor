@extends('layouts.app')

@section('content')

<div class="block-top block-bg"></div>
<div class="profile">
    @if($user->picturetitle)
    <div class="profile-img" style="background-image:url({{ '../../'.$user->picturepath.'/'.$user->picturetitle}})">

    @else
    <div class="profile-img" style="background-image:url('../images/profile.png')">
    @endif
    <h1 class="title-basic profile-username">{{$user->username}}</h1>
    <div class="info">
        <h1 class="title-basic">{{$user->firstname}} {{$user->name}}</h1>
        <br>
        <p class="text-basic">leeftijd: {{$user->age}}</p>
        <p class="text-basic">{{$user->story}}</p>
    </div>

    <a  class="addPicture buttonfx btn-orange slideleft profile-btn" href="/chatuser?user={{$user->username}}">Stuur mij een bericht!</a>

</div>


<script>
    let chose = document.getElementById('chose');
    let submit = document.getElementById('submit');
    console.log(chose)

    chose.addEventListener('click', function(){
        chose.style.display = "none"
        submit.style.display = "block"
    })
</script>
@endsection


