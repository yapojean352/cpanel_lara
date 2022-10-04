<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <style>
        .cache {
            display: none
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('css/base_h5bp.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="{{ asset('js/main.js') }}"></script>
</head>

<body>
<header id="cellierBg">
<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$host =$_SERVER['HTTP_HOST'];

define('HOSTE', 'http://'.$host."/velo_lara/public");
//echo(HOSTE);

?>

<div id="enteteCellier">
    <div class="menuLogo">
        <div class="logoHd">
            <a href="?requete=cellier"><img id="logoCellier" src="./image/logo.png"></a>
        </div>
        <div class="menuHd">
            
            <nav id="menuMobile">
            
                <input class="menu-btn" type="checkbox" id="menu-btn" />
                  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                
                <ul id="menu_principal">
                <li>
                    <?php if(isset($_SESSION['users_id'])):?>
                     <?php endif;?>
                    <?php if(isset($_SESSION['users_id'])):?>
                    <a href="?requete=authentification">Deconnexion</a>
                    <?php endif;?>
                    </li>
                    <li> <a  href="<?= HOSTE ;?>/connexion">Connexion</a></li> 
                    <li> <a  href="<?= HOSTE ;?>/monCompte">Gerer mon compte</a></li>
                    <li><a href="<?= HOSTE ;?>/velo">Mon velo</a></li>
                    <li> <a  href="<?= HOSTE ;?>/ajouterNouveauVelos">Ajouter un vélo</a></li>  
                    <li> <a href="<?= HOSTE ;?>/listeVelos">liste vélos retrouvés</a></li>
                    <li> <a href="{{ route('utilisateurs.create')}}">Inscription</a></li>   
                    <li><a  href="<?= HOSTE ;?>">Acceuil</a></li> 
                    <!-- Authentication Links -->
                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>   
                </ul>
                
            </nav>

        </div>

    </div>

</div>



<h1>l'amour du vélo</h1>


</header>
   

    <!-- revoir le fichier htaccess ou utiiser laragon a  revoir -->
 
        <!-- inserer le contenu dans le gabarit par heritage   @yield('content')  @yield('listeB')-->
        <!-- @yield('monAcceuil')
        @yield('content')   
        @yield('listeV') 
        @yield('info')  -->
        

</body>
@include("footer");
</html>