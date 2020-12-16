<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta charset="UTF-8">
    @show
    {{-- ajoute le code css pour bootstrap --}}
    @section('stylesheet')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @show
    <title>{{ config('app.name', 'TP Présentation Laravel') }} - @yield('title', 'Accueil')</title>
</head>
<body>
@section('navbar')
    <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background-color: #25737d;">
        <a class="navbar-brand" href="#"><img src="/images/logo.png"  alt="logo" height="50" width="50"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jeux">Nos jeux</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon espace </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="/login">Me connecter</a>
                        <a class="dropdown-item" href="/register">M'inscrire</a>
                        <a class="dropdown-item" href="/jeux/create">Ajouter un jeux</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
@show

<div class="container">
    @yield('content', 'En Attente d\'un contenu')
</div>

@section('footer')
    <p style="text-align: center">IUT de Lens - Département Info - TP Présentation Laravel</p>
@show

{{-- ajoute les scripts javascript pour bootstrap --}}
@section('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
@show

</body>
</html>
