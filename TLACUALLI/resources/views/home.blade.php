@extends('layouts.template')
@section('titulo','Inicio')
@section('contenido')


{{-- @include('partials.home.carrousel')  --}} 
{{-- Carrousel o Sección con imagen ↓↓  --}}
<section class="position-relative py-10 py-sm-12" style="background-image:url(https://sustentavel.com.br/wp-content/uploads/2018/07/composto.jpg); background-position: center left; background-size: cover;">
    <div class="bg-overlay bg-dark opacity-2"></div>
    <div class="container z-index-9 position-relative">
        <div class="row">
            <div class="col-xl-8 m-auto text-center py-xl-8">
                <h1 class="display-4 text-white mb-3 mt-5">Únete a nuestra comunidad TLACUALLI</h1>
                <h5 class="text-white mb-3">Somos una comunidad que permite la vinculación de administraciones restauranteras con agrupaciones encargadas del tratamiento de residuos orgánicos para la producción de composta y productos derivados.</h5>
                <a href="#" class="btn btn-lg btn-success mb-0 mb-5">Descubre Más</a>
            </div>
        </div> 
    </div>
</section>

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
                                How many free samples can i redeem?
                            </button>
                        </h2>
                        <div id="collapse7" class="accordion-collapse collapse show" aria-labelledby="heading7" data-bs-parent="#accordionExample3" style="">
                            <div class="accordion-body">
                                <p>Due to the limited quantity, each member's account is only entitled to 1 unique free sample. You can check out up to 4 free samples in each checkout. We take such matters very seriously and will look into individual cases thoroughly. </p>
                                <p class="mb-0">We provide digital transformation solutions, enabling companies to make their visions reality. With us at your side, you will find the IT solution to achieve your strategic and financial goals.</p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                What are the payment methods available?
                            </button>
                        </h2>
                        <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample3" style="">
                            <div class="accordion-body">
                                At the moment, we only accept Credit/Debit cards and Paypal payments. Paypal is the easiest way to make payments online. While checking out your order. Be sure to fill in correct details for fast &amp; hassle-free payment processing. A thing that looks beautiful and attractive always grabs eyeballs. The real challenge before companies in today's world is to make their products and services appealing to everyone. It can be the packaging of an item or the design of its website and Applications. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                Can i pay without a paypal account?
                            </button>
                        </h2>
                        <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                Yes! It is commonly misunderstood that a Paypal account is needed in order to make payments through Paypal. The truth is you DO NOT need one, although we strongly recommend you sign up to enjoy the added ease of use.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                How does the 30-day free trial work?
                            </button>
                        </h2>
                        <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                Go ahead, kick the tires. You have full access to all the features of wizixo Standard for 30 days. After 30 days you will need to provide a credit card to continue using the Standard features.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading11">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                What should I do if I miss my delivery?
                            </button>
                        </h2>
                        <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample3" style="">
                            <div class="accordion-body">
                                We make 3 attempts on 3 continuing business days. In case you miss the delivery, give us a call on (251) 854-6308 or contact us at help@wizixo.com
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading12">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                How can I get a refund in case I cancel my plan?
                            </button>
                        </h2>
                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                The refund is provided as per with our cancellation policy. The refund can be credited to the source of payment (Example: debit card, credit card, net banking).
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="widget bg-light p-3 border-0 rounded">
                    <h4>Have any question?</h4>
                    <p>If you need to send us mail regarding job opportunities, please write to us at <a class="text-primary" href="mailto:contact@example.com">career@knbh.com</a> for more information.</p> 
                    <p>or call us <a class="display-8 text-dark primary-hover" href="#">(251) 854-6308</a></p>
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
    

    <hr class="mt-5">

    @include('partials.home.footer')
    

@endsection
