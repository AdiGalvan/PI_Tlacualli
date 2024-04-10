{{-- Cards de Productos --}}
<div class="card-body">

            <div class="card h-100 shadow">
                <a href="#" class="img-wrap">
                    <img src="https://5.imimg.com/data5/SELLER/Default/2021/11/MY/VT/ZQ/125956067/vermi-compost-5kg-pack-1000x1000.jpg" alt="Producto" class="card-img-top" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">Bio Abono - Vermin</h5>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <p class="card-text">$249.99</p>
                        <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                            <i id="heart-icon" class="bi bi-heart"></i>
                        </a>                                                               
                    </div>
                   <div class="mb-3 px-3">
                        <small class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </small>
                        <span>
                            <small>4.5</small>
                        </span>
                    </div> 
                    <hr>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#productosModal"><i class="bi bi-info-circle"></i> Más información</button>
                </div>
            </div>

</div>




{{-- Modal para Info de Producto --}}
<div class="modal fade" id="productosModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body p-8">
                <div class="position-absolute top-0 end-0 me-3 mt-3">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
            <div class="row">
                    {{-- CARROUSEL DE MODAL DE PRODUCTOS --}}
                    <div class="col-lg-6 mt-3 justify-content-end ">
                        <div class="container d-flex">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="max-width: 600px;">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://abono.in/wp-content/uploads/2022/04/1-Vermi-Bag-Copy-removebg-preview.jpg" class="d-block mx-auto" alt="Imagen1" style="max-width: 100%;" width="450px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://abono.in/wp-content/uploads/2022/04/2-Bags-With-Content.jpg" class="d-block mx-auto" alt="Imagen2" style="max-width: 100%;" width="450px">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>               
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                            <h2 class="mb-1 h1">Bio Abono - Vermin</h2>
                            <div class="mb-4">
                                {{-- ESTRELLAS --}}
                                <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </small>
                                <span>
                                    <small>4.5</small>
                                </span>
                                <div class="ms-2 badge bg-success">30 comentarios</a></div>
                                <div class="fs-4">
                                <span class="fw-bold text-dark">$249.99</span>
                                </div>
                                <br>
                                {{-- DESCRIPCIÓN DEL PRODUCTO --}}
                                <p>Abono Vermicompost es rico en NPK (nitrógeno 23%, potasio 1.85 - 2.25 y fósforo 1.55 - 2.25%) y micronutrientes, microbios beneficiosos para el suelo.</p>
                                <hr class="my-6">
                                <div class="mb-4">
                                <button type="button" class="btn btn-outline-secondary">250g</button>
                                <button type="button" class="btn btn-outline-secondary">500g</button>
                                <button type="button" class="btn btn-outline-secondary">1kg</button>
                                </div>
                                {{-- AGREGAR MÁS PRODUCTOS --}}
                                <div>
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity">
                                        <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input">
                                        <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity">
                                    </div>
                                </div>
                                <div class="mt-3 row justify-content-start g-2 align-items-center">
                                <div class="col-lg-4 col-md-5 col-6 d-grid">
                                    <button type="button" class="btn btn-outline-success"  onclick="showSweetAlert()">
                                    <i class="bi bi-cart-check"></i> Agregar al carrito
                                    </button>
                                </div>
                                <div class="col-md-4 col-5">
                                    <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare" onclick="toggleLike(this)">
                                        <i id="heart-icon" class="bi bi-heart"></i>
                                    </a>
                                </div>
                                </div>
                                <hr class="my-6">
                                <div>
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td>Código del Producto:</td>
                                            <td>FBB00255</td>
                                        </tr>
                                        <tr>
                                            <td>Disponibilidad:</td>
                                            <td>En stock</td>
                                        </tr>
                                        <tr>
                                            <td>Categoría:</td>
                                            <td>Abonos</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

