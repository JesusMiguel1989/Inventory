<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>prueba - @yield('title')</title>
        <meta name="descriptio" content="@yield('meta-descriptio','Defalt meta')">
    </head>
    <body class="antialiased">
        <!-- llamada a navegacion.blade.php -->
        @include('partials.navegacion')

        <!-- colocamos el contenido  -->

        @yield('content')
    </body>
</html>