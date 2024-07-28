@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

<<<<<<< Updated upstream
@section('contenido')
    <section class="content container-fluid mt-5">
=======
@section('content')
    <section class="content container-fluid">
>>>>>>> Stashed changes
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('productos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
