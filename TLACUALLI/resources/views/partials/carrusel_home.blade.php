<!-- <div x-data="imageSlider" class="relative mx-auto overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 w-screen">
    <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
        <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
    </div>

    <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
        <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
    </button>

    <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
        <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
    </button>

    <div class="relative h-96 w-full">
        <template x-for="(image, index) in images">
            <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0 w-full h-full">
                <img :src="image" alt="image" class="rounded-sm w-full h-full object-cover" />
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white text-lg space-y-4">
                    <p class="font-black font-sans text-4xl text-yellow-300">Únete a nuestra comunidad TLACUALLI</p>
                    <p class="font-black font-sans text-xl text-white ml-20">Somos una comunidad que permite la vinculación de administraciones restauranteras con agrupaciones encargadas del tratamiento de residuos orgánicos para la producción de composta y productos derivados.</p>
                </div>
            </div>
        </template>
    </div>
</div> -->


<div class="relative w-full ">
    <!-- Línea horizontal -->
    <!-- <div class="w-full border-t-4 border-gray-600 mb-0"></div> -->
    
    <!-- Carrusel -->
    <!-- <div id="default-carousel" class="relative w-full" data-carousel="slide"> -->
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-96 overflow-hidden rounded-none md:h-full w-full shadow-2xl">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <!-- -------------------------------------original----------------------------------------- -->
                <!-- <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <section class="position-relative py-10 py-sm-12" style="background-image:url(https://sustentavel.com.br/wp-content/uploads/2018/07/composto.jpg); background-position: center left; background-size: cover; height:100%;">
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
                </section> -->

                <!-- ----------------------------------sin fondo en el texto----------------------------------- -->
                <!-- <div class="relative h-full w-full">
                    <img src="https://sustentavel.com.br/wp-content/uploads/2018/07/composto.jpg" class="absolute block w-full h-full object-contain" alt="">
                    <div class="relative z-10 container  bg-black bg-opacity-10">
                        <div class="flex justify-center">
                            <div class="text-center xl:w-2/3 py-8">
                                <h1 class="text-4xl md:text-5xl text-yellow-300 font-black font-sans tracking-wider mb-3 mt-5">Únete a nuestra comunidad TLACUALLI</h1>
                                <h4 class="text-white font-medium tracking-wider mb-3">Somos una comunidad que permite la vinculación de administraciones restauranteras con agrupaciones encargadas del tratamiento de residuos orgánicos para la producción de composta y productos derivados.</h4>
                                <a href="#" class="btn btn-lg btn-success mb-0">Descubre Más</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="relative h-full w-full z-10">
                    <img src="https://sustentavel.com.br/wp-content/uploads/2018/07/composto.jpg" class="absolute block w-full h-full object-cover" alt="">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center py-8">
                            <h1 class="text-4xl md:text-5xl text-yellow-300 font-black font-sans tracking-wider mb-3">Únete a nuestra comunidad TLACUALLI</h1>
                            <h4 class="text-white font-black tracking-wider mb-3">Somos una comunidad que permite la vinculación de administraciones restauranteras con agrupaciones encargadas del tratamiento de residuos orgánicos para la producción de composta y productos derivados.</h4>
                            <a href="#" class="btn btn-lg btn-success mb-0">Descubre Más</a>
                        </div>
                    </div>
                </div> -->




                <!-- ----------------------------------con fondo en el texto----------------------------------- -->
                <!-- <section class="relative py-10 sm:py-12 bg-cover bg-center-left h-full" style="background-image: url('https://sustentavel.com.br/wp-content/uploads/2018/07/composto.jpg');"> -->
                <div class="relative bg-cover bg-center-left h-full" style="background-image: url('/images/carousel/carousel_1.jpg');">
                  <div class="absolute inset-0 "></div>
                  <div class="relative z-10">
                    <div class="flex justify-center">
                      <div class="text-center bg-black bg-opacity-50 h-screen">
                        <h1 class="text-4xl md:text-5xl text-yellow-300 font-black font-sans tracking-wider mb-3 mt-5">Únete a nuestra comunidad TLACUALLI</h1>
                        <h4 class="text-white font-semibold tracking-wider mb-3">Somos una comunidad que permite la vinculación de administraciones restauranteras con agrupaciones encargadas del tratamiento de residuos orgánicos para la producción de composta y productos derivados.</h4>
                        <a href="#" class="btn btn-lg btn-success mb-5">Descubre Más</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out w-full h-full" data-carousel-item>
                <!-- <img src="https://concytep.gob.mx/wp-content/uploads/2024/02/banner_becas_tesis-scaled.jpg" class="absolute block w-full h-full object-contain" alt="..."> -->
                <img src="/images/carousel/carousel_2.jpg" class="absolute w-full h-full object-cover" alt="...">
                <div class="relative z-10 ">
                    <div class="flex justify-start bg-black bg-opacity-50 h-screen ">
                        <div class="text-left xl:w-1/3 ">
                            <h4 class="text-3xl md:text-5xl text-yellow-300 font-extrabold font-sans tracking-wider ml-10 mt-3">No tires tus residuos orgánicos...</h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out w-full h-full" data-carousel-item>
                <!-- <img src="https://www.ull.es/portal/agenda/wp-content/uploads/sites/12/2022/09/Campustajes_Banner-eventos-nuevo.png" class="absolute block w-full h-full object-contain" alt="..."> -->
                <img src="/images/carousel/compost-419261_1920.jpg" class="absolute w-full h-full object-cover" alt="...">
                <div class="relative z-10">
                    <div class="flex justify-start bg-black bg-opacity-50 h-screen ">
                        <div class="text-start xl:w-1/3">
                            <h4 class="text-3xl md:text-5xl text-white font-extrabold font-sans tracking-wider ml-10 mt-3">Dales una segunda oportunidad...</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out w-full h-full" data-carousel-item>
                <!-- <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> -->
                <img src="/images/carousel/carousel_4.jpg" class="absolute block w-full h-full object-cover" alt="...">
                <div class="relative z-10">
                    <div class="flex justify-start bg-black bg-opacity-50 h-screen">
                        <div class="text-left xl:w-1/3 ">
                            <h4 class="text-3xl md:text-5xl text-yellow-300 font-extrabold font-sans tracking-wider ml-10 mt-3">Conviértelos en composta...</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out w-full h-full" data-carousel-item>
                <!-- <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> -->
                <img src="/images/carousel/carousel_5.jpg" class="absolute block w-full h-full object-cover" alt="...">
                <div class="relative z-10">
                    <div class="flex justify-start bg-black bg-opacity-50 h-screen">
                        <div class="text-left xl:w-1/3 ">
                            <h4 class="text-3xl md:text-5xl text-white font-extrabold font-sans tracking-wider ml-10 mt-3">A tus cultivos les hará bien. </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
    </div>
</div>