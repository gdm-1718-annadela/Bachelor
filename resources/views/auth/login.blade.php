@extends('layouts.app')

@section('content')
<div class="container">
<div class="block block-left block-bg"></div>
<div class="block block-right block-center">
    <form class="form-basic" method="POST" action="{{ route('login') }}">
        <h1 class="title-basic">login</h1>
        <h2 class="text-basic">Hi, log je hier in!</h2>
        @if (Route::has('password.request'))
        <a class="text-basic a-basic" href="{{ route('password.request') }}">
            Of bent u uw wachtwoord vergeten?
        </a>
    @endif
        @csrf
        <div>
            <div>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input class="input-basic text-basic" placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <div class="input-icon">
                    <i class="fas fa-key"></i>
                    <input class="input-basic text-basic" placeholder="Wachtwoord" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>

                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex go-block">
            <div class="pretty p-icon p-default p-smooth p-plain">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <div class="state p-warning p-on">
                    <i class="icon mdi mdi-check"></i>
                    <label class="text-basic p-on" for="remember">
                        {{ __('Onthou mij') }}
                    </label>
                </div>
            </div>

            <button class="padding-button buttonfx slideleft btn-orange" type="submit">
                Login <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
</div>
@endsection
