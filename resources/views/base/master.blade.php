<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @show
    {{-- ajoute le code css pour bootstrap --}}
    @section('stylesheet')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&family=Open+Sans&display=swap" rel="stylesheet">


        @show
    <title>{{ config('app.name', 'TP Présentation Laravel') }} - @yield('title', 'Accueil')</title>
</head>
<body class="antialiased">
@section('navbar')
    @if(auth()->check())
        <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background: linear-gradient(0.25turn, #25737d, #f69d3c);">
            <a class="navbar-brand" href="#"><img src="/images/logo.png"  alt="logo" height="50" width="50"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link"  style="color: white;font-weight: bold; font-size:15px;" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;font-weight: bold;font-size:15px;" href="/jeux">Nos jeux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;font-weight: bold;font-size:15px;" href="/login">Mon espace</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <a class="nav-link"
                               href="http://localhost:8000/logout" onclick="event.preventDefault();
                                this.closest('form').submit();
                                "style="color: white;font-weight: bold;font-size:15px;">
                                Déconnexion
                            </a>

                        </form>
                    </li>

                </ul>
            </div>
        </nav>
    @else
    <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background: linear-gradient(0.25turn, #25737d, #f69d3c);">
        <a class="navbar-brand" href="#"><img src="/images/logo.png"  alt="logo" height="50" width="50"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link"  style="color: white;font-weight: bold; font-size:15px;" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;font-weight: bold;font-size:15px;" href="/jeux">Nos jeux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;font-weight: bold;font-size:15px;" href="/login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;font-weight: bold;font-size:15px;" href="/register">Inscription</a>
                </li>

            </ul>
        </div>
    </nav>
    @endif
@show

@yield('header')

<div class="container contenu">
    @yield('content')
</div>


@section('footer')
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="container">
            <div class="row">

                <div class="col-6 col-md">
                    <h5>Nous contacter</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="https://www.linkedin.com/in/louis-barbier030/">Louis BARBIER</a></li>
                        <li><a class="text-muted" href="https://www.linkedin.com/in/valentin-hippolyte-b220751b9/">Valentin HIPPOLYTE</a></li>
                        <li><a class="text-muted" href="https://www.linkedin.com/in/quentin-sauvag">Quentin SAUVAGE</a></li>
                        <li><a class="text-muted" href="https://www.linkedin.com/in/maxime-nuter-821ba71b8/">Maxime NUTER</a></li>
                        <li><a class="text-muted" href="https://www.linkedin.com/in/antoine-pagnier-2b3bb31bb/">Antoine PAGNIER</a></li>
                        <li><a class="text-muted" href="https://www.linkedin.com/in/matthieu-goliot-56323b200/">Matthieu GOLIOT</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Ressources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="https://getbootstrap.com/">Bootstrap</a></li>
                        <li><a class="text-muted" href="https://www.canva.com/fr_fr/">Canva</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <p>Site web réalisé par l'équipe Road To Noël</p>
                </div>
            </div>
        </div>
    </footer>
@show

{{-- ajoute les scripts javascript pour bootstrap --}}
@section('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@show

</body>
</html>




