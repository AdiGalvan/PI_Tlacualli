@extends('layouts.template')
@section('titulo','Inicio')
@section('contenido')

{{-- @include('partials.home.carrousel')  --}} 
{{-- Carrousel o Sección con imagen ↓↓  --}}


<div class="row mt-3">
    <div class="col ms-3 me-3">
        @include('partials.carrusel_home')
    </div>
</div>  


@include('partials.home.misionVision')

<div class="container-fluid px-lg-5 mt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2>Publicaciones</h2>
        </div>
    </div>

    @include('partials.home.carrouselCard')

    
    <div class="row mb-4 mt-5">
        <div class="col-12 text-center">
            <h2>Preguntas Frecuentes</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5">
                <div class="accordion accordion-icon-gradient" id="accordionExample3">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading7">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                ¿Cuántas muestras gratis puedo canjear?
                            </button>
                        </h2>
                        <div id="collapse7" class="accordion-collapse collapse show" aria-labelledby="heading7" data-bs-parent="#accordionExample3" style="">
                            <div class="accordion-body">
                                <p>Debido a la cantidad limitada, cada cuenta de miembro solo tiene derecho a 1 muestra gratis única. Puedes seleccionar hasta 4 muestras gratis en cada compra. Tomamos estos asuntos muy en serio y examinaremos cada caso individualmente. </p>
                                <p class="mb-0">Ofrecemos soluciones de transformación digital, permitiendo a las empresas hacer realidad sus visiones. Con nosotros a tu lado, encontrarás la solución informática para alcanzar tus objetivos estratégicos y financieros.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                ¿Cuáles son los métodos de pago disponibles?
                            </button>
                        </h2>
                        <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample3" style="">
                            <div class="accordion-body">
                                En este momento, solo aceptamos pagos con tarjeta de crédito/débito y Paypal. Paypal es la forma más fácil de realizar pagos en línea. Al realizar tu pedido, asegúrate de completar los detalles correctos para un procesamiento de pago rápido y sin problemas. Una cosa que se ve hermosa y atractiva siempre llama la atención. El verdadero desafío para las empresas en el mundo actual es hacer que sus productos y servicios sean atractivos para todos. Puede ser el empaque de un artículo o el diseño de su sitio web y aplicaciones.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                ¿Puedo pagar sin una cuenta de PayPal?
                            </button>
                        </h2>
                        <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                ¡Sí! Es comúnmente malinterpretado que se necesita una cuenta de PayPal para realizar pagos a través de PayPal. La verdad es que NO necesitas una, aunque te recomendamos que te registres para disfrutar de la mayor facilidad de uso.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                ¿Cómo funciona la prueba gratuita de 30 días?
                            </button>
                        </h2>
                        <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                Adelante, prueba todo. Tienes acceso completo a todas las funciones de wizixo Standard durante 30 días. Después de 30 días, necesitarás proporcionar una tarjeta de crédito para seguir utilizando las funciones estándar.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading11">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                ¿Qué debo hacer si pierdo mi entrega?
                            </button>
                        </h2>
                        <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample3" style="">
                            <div class="accordion-body">
                                Realizamos 3 intentos en 3 días laborables consecutivos. En caso de que pierdas la entrega, llámanos al (251) 854-6308 o contáctanos en help@wizixo.com
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading12">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                ¿Cómo puedo obtener un reembolso en caso de cancelar mi plan?
                            </button>
                        </h2>
                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                El reembolso se proporciona según nuestra política de cancelación. El reembolso puede acreditarse a la fuente de pago (Ejemplo: tarjeta de débito, tarjeta de crédito, banca por Internet).
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="widget bg-light p-3 border-0 rounded">
                    <h4>¿Tienes alguna pregunta?</h4>
                    <p>Si necesitas enviarnos un correo electrónico respecto a oportunidades laborales, escríbenos a <a class="text-primary" href="mailto:contact@example.com">career@knbh.com</a> para obtener más información.</p> 
                    <p>o llámanos al <a class="display-8 text-dark primary-hover" href="#">(251) 854-6308</a></p>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row mb-4 mt-5">
        <div class="col-12 text-center">
            <h2>Aliados</h2>
        </div>
    </div>
    
    @include('partials.home.alidados')
    

    

    

@endsection
