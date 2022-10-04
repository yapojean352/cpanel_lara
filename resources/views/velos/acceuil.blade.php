@extends('layouts.app')
@section('monAcceuil')
<div class="conteneur cont">
    <article class="vignette ">
        <h1 class="contact-titre">{{ __('message.contact',['name'=>'.']) }}</h1>
        <p class="contact-text">
        {{ __('Taccueil.home-contactText.para1') }}
             <br>
             {{ __('Taccueil.home-contactText.para2') }}<br>
             {{ __('Taccueil.home-contactText.para3') }}
        </p>
    </article>
   <div class="titreConseil"><h2>     {{ __('Taccueil.home-ConseilTitre') }}</h2></div> 
    <div class="conseil1">
        <div class="cadenas">
            <div class="imgc"> <img src=<i class="fa fa-lock"  style="font-size: 4em; color: #087AB5 ;"></i> </div>
            <div class="titreS">
                <h3> {{ __('Taccueil.home-cadenas.titre') }}
                </h3>
            </div>
            <p> 
            {{ __('Taccueil.home-cadenas.para1') }} <br> <br>
            {{ __('Taccueil.home-cadenas.para2') }}
            </p>
        </div>
        <div class="support">
            <div class="imgc"><i class="fa fa-bicycle" style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
                <h3>{{ __('Taccueil.home-support.titre') }}
                </h3>
            </div>
            <p>
            {{ __('Taccueil.home-support.para1') }} <br> <br>
            {{ __('Taccueil.home-support.para2') }}
            </p>
        </div>
        <div class="endroit">
            <div class="imgc"><i class="fa fa-map-marker"  style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
                <h3>{{ __('Taccueil.home-endroit.titre') }}
                </h3>
            </div>
            <p>
            {{ __('Taccueil.home-endroit.para1') }} <br> <br>
            {{ __('Taccueil.home-endroit.para2') }}
            </p>
        </div>
        <div class="marqueD">
            <div class="imgc"><i class="fas fa-check-double"  style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
                <h3>{{ __('Taccueil.home-marque.titre') }}
                </h3>
            </div>
            <p> 
            {{ __('Taccueil.home-marque.para1') }} <br> <br>
            {{ __('Taccueil.home-marque.para2') }}
            </p>
        </div>
    </div>
    <div class="info"> {{ __('Taccueil.homeInfo') }}</div>
    <div class="conseil2">
        <div class="enreg">
            <div class="imgc"><i class="fas fa-cash-register" style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
                <h3>{{ __('Taccueil.home-enreg.titre') }}
                </h3>
            </div>
            <p> 
            {{ __('Taccueil.home-enreg.para1') }} <br> <br>
            {{ __('Taccueil.home-enreg.para2') }}
            </p>
        </div>
        <div class="serie">
            <div class="imgc"><i class="fas fa-barcode" style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
                <h3>{{ __('Taccueil.home-serie.titre') }}
                </h3>
            </div>
            <p> 
            {{ __('Taccueil.home-serie.para1') }} <br> <br>
            {{ __('Taccueil.home-serie.para2') }}
            </p>
        </div>
        <div class="caracteritique">
        <div class="imgc"><i class="fas fa-search-location" style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
                <h3>{{ __('Taccueil.home-carac.titre') }}
                </h3>
            </div>
            <p>
            {{ __('Taccueil.home-carac.para1') }} <br> <br>
            {{ __('Taccueil.home-carac.para2') }}
            </p>
        </div>
        <div class="burinage">
        <div class="imgc"><i class="far fa-folder" style="font-size: 4em; color: #087AB5 ;"></i></div>
            <div class="titreS">
            <h3>{{ __('Taccueil.home-burinage.titre') }}
                </h3>
            </div>
           <p> 
           {{ __('Taccueil.home-burinage.para1') }} <br> <br>
            {{ __('Taccueil.home-burinage.para2') }}
           </p> </div>

    </div>
    <div class="nb"><p>{{ __('Taccueil.home-nb') }}</p></div>
    @include('contact')
</div>

@endsection