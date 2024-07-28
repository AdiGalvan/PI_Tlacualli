@extends('layouts.template')
@section('titulo','Productos')
@section('contenido')

<head>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div class="md:w-1/3">
        <div class="container mx-2 mt-5">
            <div class="md:w-1/3 px-2">
                <div class="bg-white p-4 shadow-md mb-4">
                    <h2 class="text-lg text-green-600 font-semibold mb-2">Categories</h2>
                    <ul>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Abonos <span class="text-yellow-300">(4)</span></li>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Contenedores <span class="text-yellow-300">(1)</span></li>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Repelentes <span class="text-yellow-300">(2)</span></li>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Tierra <span class="text-yellow-300">(1)</span></li>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Fauna <span class="text-yellow-300">(8)</span></li>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Composta <span class="text-yellow-300">(3)</span></li>
                        <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Herramientas <span class="text-yellow-300">(2)</span></li>
                    </ul>
                </div>
                <div class="bg-white p-4 shadow-md">
                    <h2 class="text-lg text-green-600 font-semibold mb-4">Tags</h2>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Abono</button> 
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Plantas</button> 
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Tierra</button> 
    
                        </div>
                        <div>
                        </div>
                        <div>
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Kit herramientas </button> 
    
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Repelentes</button> 
                        </div>
                        <div>
                        </div>
                        <div class="mb-2">
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Fauna</button> 
                            <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Contenedores</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
    </div>
    </div>

    <div class="container mx-2 mt-5">
        <div class="md:w-1/3 px-2">
            <div class="bg-white p-4 shadow-md mb-4">
                <h2 class="text-lg text-green-600 font-semibold mb-2">Categories</h2>
                <ul>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Abonos <span class="text-yellow-300">(4)</span></li>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Contenedores <span class="text-yellow-300">(1)</span></li>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Repelentes <span class="text-yellow-300">(2)</span></li>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Tierra <span class="text-yellow-300">(1)</span></li>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Fauna <span class="text-yellow-300">(8)</span></li>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Composta <span class="text-yellow-300">(3)</span></li>
                    <li class="mb-2 text-gray-500 font-semibold hover:text-green-900">Herramientas <span class="text-yellow-300">(2)</span></li>
                </ul>
            </div>
            <div class="bg-white p-4 shadow-md">
                <h2 class="text-lg text-green-600 font-semibold mb-4">Tags</h2>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Abono</button> 
                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Plantas</button> 
                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Tierra</button> 

                    </div>
                    <div>
                    </div>
                    <div>
                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Kit herramientas </button> 

                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Repelentes</button> 
                    </div>
                    <div>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Fauna</button> 
                        <button type="button" class="focus:outline-none text-black bg-gray-100 font-semibold hover:text-white hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-500 font-medium rounded-sm text-sm px-2.5 py-0.5 dark:focus:ring-yellow-700">Contenedores</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="row mt-5">
   {{--  <div class="col-2">
        <div class="sticky-top">
            @include('partials.productos1.filtros')
        </div>
    </div> --}}
    <div class="col-8">  
        <h1 class="text-center">Productos</h1>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-2 d-flex justify-content-end">
                @if(session()->has('id_usuario'))
                <button type="button" class="btn btn-success" onclick="window.location.href='{{ url('/productos') }}'">
                    <i class="bi bi-bag-plus"></i> Productos
                </button>
                @endif
            </div>
        </div>
        <div class="row p-2">
            @foreach($productos as $producto)
                <div class="col-md-3 p-2">
                    @include('producto.card_producto', ['producto' => $producto])
                </div>
            @endforeach
        </div>
    </div> 
    <div class="col-2">
        <div class="sticky-top pe-3">
            <br>
            @include('partials.productos1.carrusel')
            <br>
            @include('partials.publicaciones.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>

@include('partials.productos1.script_productos')
@endsection
