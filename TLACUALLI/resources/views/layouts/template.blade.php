<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="/css/navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="shortcut icon" href=https://i.ibb.co/DR7kFK5/LOGO-TLACUALLI.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    {{-- Titulo dinámico --}}
    <title>@yield('titulo')</title>

    {{-- Incluir todos los css adicionales que se lleguen a ocupar --}}
    {{-- @vite('resources/css/navbar.css') --}}
</head>
@include('partials.navbar')
@include('partials.alertas')    
<body style="background-color: rgb(228, 217, 201)"> 
    {{-- Estructura base: navbar, alertas y el resto del contenido --}}
    @yield('contenido') 
</body>
<footer>
    {{-- La página tendra algun footer? --}}
    {{-- @include('partials.footer') --}}
</footer>
</html>