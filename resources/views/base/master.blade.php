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
    <p>En attente d'un menu.</p>
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
