@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

@section('contenido')
    <section class="content container-fluid mt-5">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"> Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action=""  role="form" enctype="multipart/form-data">
                            
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
