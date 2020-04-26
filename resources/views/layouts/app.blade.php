<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Flamingo</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/1a8b210154.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('./images/flamingo_logo2.png')}}">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- {{Route::currentRoutename()}} --}}
    @if(Route::currentRoutename()==''|| Route::currentRoutename()=='home' || Route::currentRoutename()=='chat' || Route::currentRoutename()=='profile'|| Route::currentRoutename()=='findChat'|| Route::currentRoutename()=='findUser'|| Route::currentRoutename()=='admin')
    <nav id="menu" class="full-nav stroke">
    @elseif(Route::currentRoutename()=='album'|| Route::currentRoutename()=='story'|| Route::currentRoutename()=='tip'|| Route::currentRoutename()=='filter'|| Route::currentRoutename()=='editStory'|| Route::currentRoutename()=='detail'|| Route::currentRoutename()=='createStory' || Route::currentRoutename()=='filterstory'|| Route::currentRoutename()=='filtertypetip')
    <nav id="menu" class="more-nav stroke">
    @else
    <nav id="menu" class="less-nav stroke">
    @endif
    
        <ul class="nav">
            @guest
                <li><img class="nav-logo" src="{{asset('./images/flamingo_logo.png')}}"></li>
                <li><a  href="/"@if(Route::currentRoutename()=='')class="selected-link"@endif>Start pagina</a></li>
                <li><a  href="/privacy"@if(Route::currentRoutename()=== 'privacy')class="selected-link"@endif>Privacy</a></li>
                <li><a  href="{{ route('login') }}"@if(Route::currentRoutename()=== 'login')class="selected-link" @endif>{{ __('Login') }}</a></li>
                    <li ><a  href="/register"@if(Route::currentRoutename()==='register')class="selected-link" @endif>{{ __('Registreer') }}</a>
                    </li>
            @else
                <li><img class="nav-logo" src="{{asset('./images/flamingo_logo.png')}}"></li>
                <li><a href="{{route('home')}}" @if(Route::currentRoutename()=== 'home')class="selected-link"@endif>Start pagina</li>
                <li><a href="{{route('album')}}" @if(Route::currentRoutename()=== 'album')class="selected-link"@endif>Mijn herinneringen</li>
                <li><a href="{{route('story')}}" @if(Route::currentRoutename()=== 'story')class="selected-link"@endif>Verhalen</li>
                <li><a href="{{route('tip')}}" @if(Route::currentRoutename()=== 'tip')class="selected-link"@endif>Tips</li>
                <li><a href="{{route('chat')}}"@if(Route::currentRoutename()=== 'chat')class="selected-link"@endif>Chat</li>
                <li><a href="{{route('profile')}}"@if(Route::currentRoutename()=== 'profile')class="selected-link"@endif>{{Auth::user()->username}}</a></li>
                    
                <li>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>

    <div id="phoneMenu" class="phone-menu"><i class="fas fa-bars"></i></i>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</body>
@if(Route::currentRoutename() !== 'profile')
<footer class="footer-distributed">

    <div class="footer-left">

      <IMG SRC="{{asset('./images/flamingo_logo3.png')}}" ALT="" WIDTH=50 >
        @guest
        <p class="footer-links">
          <a  href="/">Start pagina</a>
          <a  href="/privacy">Privacy</a>
          <a  href="{{ route('login') }}">{{ __('Login') }}</a>
          <a  href="/register">{{ __('Registreer') }}</a>
        </p>
        @else

      <p class="footer-links">
        <a href="{{route('home')}}" >Start pagina</a>.
        <a href="{{route('album')}}" >Mijn herinneringen</a>.
        <a href="{{route('story')}}" >Verhalen</a>.
        <a href="{{route('tip')}}" >Tips</a>.
        <a href="{{route('chat')}}">Chat</a>.
        <a href="{{route('profile')}}">{{Auth::user()->username}}</a>      
      </p>
      @endguest

      <p class="footer-company-name"> &copy; 2019-2020 Anna De Langhe 3NMD-MMP</p>
    </div>

    <div class="footer-center">

      <div>
       <a href="https://www.arteveldehogeschool.be/"><img src="https://www.arteveldehotrgeschool.be/sites/all/themes/epsenkaas_theme/logo.svg"></a>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>09 234 90 00</p>
      </div>

      <div>
        <i class="fas fa-map-marker-alt"></i>
        <p>Industrieweg 232, 9030 Gent</p>
      </div>

    </div>
      
       <div class="footer-center footer-right">

      <div>
       <a href="https://www.district01.be/"><img class="width" src="https://pbs.twimg.com/profile_images/781045900445683713/4Z9wcGZv.jpg"></a>
      </div>

      <div>
        <i class="fas fa-envelope-open-text"></i>
        <p>info@district01.be</p>
      </div>

      <div>
        <i class="fas fa-map-marker-alt"></i>
        <p>Veldkant 35C, 2550 Kontich</p>
      </div>

    </div>

    

  </footer>
  @endif

    {{-- <p>Bachelorproef van Anna De Langhe - 3NMD-MMP</p> --}}
</html>

<script>
    window.addEventListener('load', function(){
        let menu = document.getElementById('menu');
        let phoneMenu = document.getElementById('phoneMenu');
        phoneMenu.addEventListener('click', function(){
            menu.style.display = "block"
        })
    })
</script>