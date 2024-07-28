@extends('layouts.template')
@section('titulo','Publicaciones')
@section('contenido')


<div class="row mt-3">
    <div class="col-10 pt-5 ps-5">

        @include('partials.publicaciones.carrusel')
        <div class="row mt-3">
            <div class="col-2">
                <div class="container sticky-top">
                    <div class="sticky-top">
                        @include('partials.publicaciones.filtros')
                    </div>
                </div>
            </div>
            <div class="col-10">
                
                <div class="container">
                    <p class="text-center text-5xl font-bold mt-5">Publicaciones</p>
                    <div class="flex flex-col lg:flex-row items-center justify-end px-5">
                        <div class="w-full lg:w-auto flex mt-2 lg:mt-0 lg:order-2">
                            @include('partials.talleres.buscar')
                        </div>
                        <div class="w-full lg:w-auto flex justify-end mt-2 lg:mt-0 lg:order-1">
                            @if(session()->has('id_usuario')) 
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#registrar_publicacion" class="text-white bg-green-700 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <i class="bi bi-bag-plus"></i> Registrar 
                            </button>
                        @endif 
                        </div>
                    </div>
                    <div class="row p-2">
                        @for ($i = 1; $i <= 10; $i++)
                            @include('partials.publicaciones.acordion_publicaciones')
                        @endfor
                    </div>
                                        
                    <div class="flex justify-center mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex -space-x-px text-sm">
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-2">
        <div class="sticky-top pe-3">
            <br>
            @include('partials.productos1.carrusel')
            <br>
            @include('partials.talleres.carrusel')
        </div>
    </div>
</div>


@include('partials.publicaciones.registrar_publicacion')
@endsection



