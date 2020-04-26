@extends('layouts.app')

@section('content')
<div class="fullheight">
    <div class="block-bg-home">
    </div>
        <div class="intro">
            @if(Auth::user())
                <h1 class="title-basic">Welkom {{Auth::user()->firstname}}</h1>
                <div class="flex">
                    <div class="margin">
                        <h2 class="text-basic">Wat kan je doen?</h2>
                        <a href="#Wat"class="fullWidth text-align-center text-basic buttonfx slideleft btn-orange"> Bekijk</a>
                    </div>
                    <div class="margin">
                        <h2 class="text-basic">Contacteer ons!</h2>
                        <a href="#Contact"class="fullWidth text-align-center text-basic buttonfx slideleft btn-orange"> Contact</a>
                    </div>
                </div>
            @else
                <h1 class="title-basic">Welkom op flamingo!</h1>
                <h2 class="text-basic">Log je in om door te gaan!</h2>
                <a href={{route('login')}} class="button-width-basic text-basic buttonfx slideleft btn-orange">Login</a>
            @endif
        </div>
    </div>
</div>
<div id="Wat" class="fullheight flex center">
    <h1 class="title-basic">Wat kan je doen? </h1>
    <div class="flex toDo-block">
        <div class="toDo">
            <img src="../../images/puntje01.png">
            <h3>Lees verhalen en tips van lotgenoten</h3>
            <p>Je kan via het platform verhalen maken en deze delen met lotgenoten. Zij kunnen met jou verhaal een positive vibe krijgen, of jij kunt een persoon vinden die jou een handje toesteekt</p>
        </div>
        <div class="toDo">
            <img src="../../images/puntje02.png">
            <h3>Maak jou eigen herrinneringenboek</h3>
            <p>Het is soms hard om terug te denken aan alle pijnlijke momenten. Met dit herrinneringenboek kan je herinneringen plaatsen die jou aan leuke momenten doen denken. Maar om verdriet te kunnen verwerken kan je ook jou eigen aangepaste emotie toevoegen aan jou herinnering. Later kan je er misschien met een positive vibe naar terug kijken.</p>
        </div>
        <div class="toDo">
            <img src="../../images/puntje03.png">
            <h3>Stuur berichten!</h3>
            <p>Je kan mensen die een mooi verhaal geschreven hebben, of een leuke tip gedeeld hebben persoonlijk bedanken aan een berichtje. Steek ook zeker jou eigen lotgenoten een hart om de riem.</p>
        </div>
    </div>
</div>
<div id="Contact"class="fullheight flex center">
    <div class="bar flex">
        <div class="leaves"></div>
        <div class="fullWidth">
            <h2 class="title-basic">Contacteer ons</h2>
            <p class="text-basic">Is er een probleem? of wenst u iets te melden?</p>
            <form  action="{{ route('contact') }}" method="post">
                @csrf

                @if(Auth::user())
                <div class="input-icon">
                <input class="input-basic" name="email" type="email" placeholder="geef uw emailadress" value="{{Auth::user()->email}}">
                </div>
                @else
                <div class="input-icon">
                <input class="input-basic" name="email" type="email" placeholder="geef uw emailadress">
                </div>
                @endif
                <div class="input-icon">
                <textarea class="input-basic" name="comment" placeholder="schrijf hier uw mededeling"></textarea>
                </div>
                <div class="top">
                    <button type="submit" class="buttonfx slideleft bnt-orange">verzend</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection