<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
   

    <link rel="stylesheet" href="/css/navbar.css">
    
       
    {{-- Estilos CSS --}}
    <link rel="stylesheet" href="/css/navbar.css">

    {{-- CONFIRMACIONES DE SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    {{-- LOGO TLACUALLI --}}
    <link rel="shortcut icon" href="https://i.ibb.co/DR7kFK5/LOGO-TLACUALLI.jpg">

    {{-- Mapa --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHaUJgSC86kmMnI1vjUIiEc33-DbxvZY"></script>

    {{-- Titulo dinámico --}}
    <title>@yield('titulo')</title>

    {{-- TAILWIND PURO --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    {{-- ESE ↓ ES PARA EL CARRUSEL --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>  

    
    {{-- FLOWBITE ↓ --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>--}}

    {{-- ÍCONOS DE FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 

    {{-- Para notificaciones de notyf --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    {{-- Mapa --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALHaUJgSC86kmMnI1vjUIiEc33-DbxvZY"></script>
    {{-- Titulo dinámico --}}
    <title>@yield('titulo')</title>

    {{-- Incluir todos los css adicionales que se lleguen a ocupar --}}

    @vite('resources/css/navbar.css')
    @vite('resources/css/images.css')
    @vite('resources/css/carrusel.css')
    @php
        // $cwd = getcwd();
        // $cssName = basename(glob($cwd . '/build/assets/*.css')[0], '.css');
        // $jsName = basename(glob($cwd . '/build/assets/*.js')[0], '.js');
        // $css = asset('build/assets/' . $cssName . '.css');
        // $js = asset('build/assets/' . $jsName . '.js');
        $cwd = getcwd();
    $cssFiles = glob($cwd . '/build/assets/*.css');
    $jsFiles = glob($cwd . '/build/assets/*.js');
    
    if (count($cssFiles) > 0 && count($jsFiles) > 0) {
        $cssName = basename($cssFiles[0], '.css');
        $jsName = basename($jsFiles[0], '.js');
        $css = asset('build/assets/' . $cssName . '.css');
        $js = asset('build/assets/' . $jsName . '.js');
    } else {
        $css = null;
        $js = null;
        // Puedes lanzar una excepción o registrar un error aquí si lo deseas
        // throw new Exception('No CSS or JS files found in the build/assets directory.');
    }    
    @endphp

    <link rel="stylesheet" href="{{ $css }}" id="css">
    <script src="{{ $js }}" id="js"></script>
    
</head>
<section class="bg-gray-200 dark:bg-yellow-100">
@include('partials.navbar')
   
<!-- rgb(228, 217, 201)  -->

<body style="background-color: rgb(255, 255, 255)">
    {{-- Estructura base: navbar, alertas y el resto del contenido --}}
    @yield('contenido') 

    {{-- Notificacion de notyf --}}
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    @include('partials.alertas')

</body>
<footer>
    @include('partials.footer')
</footer>
</section>
</html>


