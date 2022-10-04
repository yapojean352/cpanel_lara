<?php use Illuminate\Support\Facades\Auth;?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, minimum-scale=0.5, initial-scale=1.0, user-scalable=yes">
    <title>VELO-HOME</title>
    <style>
    .cache {
        display: none
    }

    #map-canvas {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
        height: 420px;
    }

    #maps-canvas {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
        height: 420px;
    }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('css/base_h5bp.css') }}" type="text/css" media="screen"> -->
    <link rel="stylesheet" href="{{ asset('css/mainV1.css') }}" type="text/css" media="screen">
    <!-- <link rel="stylesheet" href="{{ asset('css/menus.css') }}" type="text/css" media="screen">  -->
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/upload.js') }}"></script>

    <!---- <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     icones!-->
    <!-- <link href="{{asset('css/fontawesome-all.css') }}" rel="stylesheet">  -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1angrr2-xG4i2f7S3PzndKA7CmBqQU5I&libraries=places">
    </script>

</head>

<body>
    <!-- Load Facebook SDK for JavaScript  -->
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/{{LaravelLocalization::getCurrentLocaleRegional()}}/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <header class="menu-principale">
        <nav id="nav-top" aria-label="Arborescence principale">
            <span id="logoVelo">
                <!-- <div id="logo"><a href="admine.php?page=infos"><img width="150" alt="logo " src=""></a></div> -->
                <a href="{{ route('acceuil')}}"><img src="{{ asset('image/logo-velo.png') }}"></a>
            </span>
            <div class="infosLan">

                <div class="recherche mg">@include("partials.recherche")</div>
                <ul class="log mg-ecran">
                    @guest
                    <li class="mc">
                        <a class="a-infos" href="{{ route('login') }}"> {{ __('menu.menu-connexion') }}</a>
                    </li>
                    @else
                    <li class="" aria-labelledby="">
                        <a class="a-infos" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('menu.menu-deconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>

                <span class="mg-ecran"> <a class="a-infos" href=""><i class="fas fa-question-circle"
                            style="font-size: 1em; color:  yellow;"></i>
                        {{ __('menu.menu-aide') }}</a></span>
                <ul class="mg-ecran-sh mg-ecran">
                <li class="sh">
                  @if( LaravelLocalization::getCurrentLocaleRegional() === 'fr_FR')
                  
                   <a class="" rel="alternate" hreflang="en"
                        href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                        English 
                    </a>
                   @else
                   <a class="" rel="alternate" hreflang="fr"
                        href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
                        Francais  
                    </a>
                  
                   @endif
                   
                </li>
                </ul>
              

            </div>

        
        </nav>
        <nav class="nav-bottom">
            <input class="menu-btn " type="checkbox" id="menu-btn" />
            <label class="menu-icon cadre-burger" for="menu-btn"><span class="navicon"></span></label>
            <ul id="menu-2">
                <li><a href="{{ route('acceuil')}}">{{ __('menu.menu-accueil') }}</a></li>
                <li> <a href="{{ route('listeVelos')}}">{{ __('menu.menu-liste') }} </a></li>
                <li> <a href="{{ route('historique')}}">{{ __('menu.menu-historique') }}</a></li>
                <li> <a href="{{ route('velos.create')}}">{{ __('menu.menu-creer') }}</a></li>

                @guest

                @else
                <li><a href="{{ route('velo.show')}}">{{ __('menu.menu-monvelo') }}</a></li>
                @endguest
                <li> <span class="m-mobile"> <a href=""><i class="fas fa-question-circle"
                                style="font-size: 1em; color:  yellow;"></i>
                            {{ __('menu.menu-aide') }}</a></span></li>
                @guest
                <li class="mc mc-grand">
                    <a class="" href="{{ route('login') }}">{{ __('menu.menu-connexion') }}</a>
                </li>
                <li> <a href="">{{ __('menu.menu-compte') }}</a></li>
                @if (Route::has('register'))
                <li class="">
                    <a class="" href="{{ route('register') }}">{{ __('menu.menu-enregistrer') }}</a>
                </li>
                @endif
                @else

                <li class="mc mc-grand" aria-labelledby="">
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('menu.menu-deconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                    </form>
                </li>

                @endguest
                <!-- <ul class="mg-ecran-sh">  -->
                 <li  class="mc mc-grand" >
                  @if( LaravelLocalization::getCurrentLocaleRegional() === 'fr_FR')
                  
                   <a class="" rel="alternate" hreflang="en"
                        href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                        English
                    </a>
                   @else
                   <a class="" rel="alternate" hreflang="fr"
                        href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
                      Francais
                    </a>
                  
                   @endif
                   
                </li>

            </ul>

        </nav>
    </header>
    <div class="caroussel">
        @include('partials.carrousel')
    </div>
    <main>
        <div class="conteneur-principale">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @yield('content')

            <!-- revoir le fichier htaccess ou utiiser laragon a  revoir -->

            <!-- inserer le contenu dans le gabarit par heritage   @yield('content')  @yield('listeB')-->
            <div class="ac"> @yield('monAcceuil') </div>
            @yield('listeV')
            @yield('info')
        </div>


    </main>
    </div>
</body>
@include("footer");

</html>