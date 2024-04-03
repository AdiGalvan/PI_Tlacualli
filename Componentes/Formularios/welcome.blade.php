<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>FORMULARIOS_PRUEBAS</title>
    <link rel="shortcut icon" href=https://i.ibb.co/DR7kFK5/LOGO-TLACUALLI.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">


    {{-- EXTRAS --}}
    
</head>
<body style="background-color: rgb(228, 217, 201)" class="px-3">
    <h1 class="display-1 mt-4 text-center">Tlacualli</h1>
    <div class="mt-3 text-center">
       
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar_usuario">Registrar usuario</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar_publicacion"> Registrar publicación</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar_taller">Registrar taller</button> 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar_producto"> Registrar producto</button> 
 
    </div>
   


@include('partials.registrar_producto') 
</body>
</html>