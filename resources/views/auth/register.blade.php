@extends('layouts.app')

@section('content')
<div class="container">
    <div class="block block-left block-bg"></div>
        <div class="block block-right block-center">
            <form class="form-basic" method="POST" action="{{ route('register') }}">
                <h1 class="title-basic">Registreer</h1>
                <h2 class="text-basic">Hi, maak hier een account!</h2>
                @csrf
                <div class="input-icon">
                    <input placeholder="Gebruikersnaam" id="username" type="text" class="input-basic text-basic form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                    <i class="fas fa-user-tag"></i>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-icon">
                    <input placeholder="Naam" id="name" type="text" class="input-basic text-basic form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input placeholder="Voornaam" id="firstname" type="text" class="input-basic text-basic form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                    <i class="fas fa-user-edit"></i>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-icon">
                    <input placeholder="Email" id="email" type="email" class="input-basic text-basic form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <i class="fas fa-envelope-open-text"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-icon">
                    <input placeholder="Leeftijd" id="age" type="number" class="input-basic text-basic form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>
                    <i class="fas fa-birthday-cake"></i>
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-icon">
                    <textarea placeholder="Jou verhaal" id="story" type="text" class="input-basic text-basic form-control @error('story') is-invalid @enderror" name="story" value="{{ old('story') }}" autocomplete="story" autofocus></textarea>
                    <i class="fas fa-book-medical"></i>
                    @error('story')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-icon">
                    <input placeholder="Wachtwoord" id="password" type="password" class="input-basic text-basic form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input placeholder="Wachtwoord bevestigen" id="password-confirm" type="password" class="input-basic text-basic form-control" name="password_confirmation" required autocomplete="new-password">
                    <i class="fas fa-key"></i>
                </div>
        
                <div>
                    <button type="submit" class="registreer-btn buttonfx slideleft btn-orange">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
</div>
@endsection
