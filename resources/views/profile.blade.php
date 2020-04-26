@extends('layouts.app')

@section('content')

<div class="block-top block-bg margin-bottom"></div>
<div class="profile">
    @if(Auth::user()->picturetitle)
    <div class="profile-img" style="background-image:url({{ Auth::user()->picturepath.'/'.Auth::user()->picturetitle}})"></div>
    @else
    <div class="profile-img" style="background-image:url('../images/profile.png')"></div>
    @endif
    <h1 class="title-basic profile-username">{{Auth::user()->username}}</h1>
    <div class="info">
        <h1 class="title-basic">{{Auth::user()->firstname}} {{Auth::user()->name}}</h1>
        <br>
        <p class="text-basic">leeftijd: {{Auth::user()->age}}</p>
        <p class="text-basic">{{Auth::user()->story}}</p>
    </div>

<form class="addPicture" action="{{ route('profileImage', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="profile_id" value="{{Auth::user()->id}}" hidden>
    <input type="file" name="file[]" id="file" multiple class="file-btn" hidden>
    <label id="chose" class="profile-btn buttonfx slideleft btn-orange"for="file">Kies een foto</label>
    <button id="submit" class="profile-btn buttonfx slideleft btn-orange transparent" type="submit">
        Bevestig profielfoto keuze
    </button>
</form>
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


