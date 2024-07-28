@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

<<<<<<< Updated upstream
@section('contenido')
    <section class="content container-fluid mt-5">
=======
@section('content')
    <section class="content container-fluid">
>>>>>>> Stashed changes
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('productos.update', $producto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
