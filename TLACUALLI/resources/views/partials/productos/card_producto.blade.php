{{-- Cards de Productos --}}
@foreach ($consR as $item)
<div class="card-body">
    <div class="card h-100 shadow">
        <a href="#" class="img-wrap">
            <img src="https://5.imimg.com/data5/SELLER/Default/2021/11/MY/VT/ZQ/125956067/vermi-compost-5kg-pack-1000x1000.jpg" alt="Producto" class="card-img-top" style="height: 200px; object-fit: cover;">
        </a>
        <div class="card-body">
            <h5 class="card-title text-center">{{ $item->producto }}</h5>
            <div class="card-body d-flex justify-content-between align-items-center">
                <p class="card-text">{{ $item->costo }}</p>
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
            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#productosModal">{{-- <i class="bi bi-info-circle"></i> --}} Más información</button>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editarProducto{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminarProducto{{ $item->id }}"><i class="bi bi-trash3"></i></button>
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
                            <h2 class="mb-1 h1">{{ $item->producto }}</h2>
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
                                <span class="fw-bold text-dark">{{ $item->costo }}</span>
                                </div>
                                <br>
                                {{-- DESCRIPCIÓN DEL PRODUCTO --}}
                                <p>{{ $item->descripcion }}</p>
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
                                            <td>{{ $item->stock }}</td>
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

{{-- MODAL PARA ELIMINAR PRODUCTO --}}
<div class="modal fade" id="eliminarProducto{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('producto.destroy', ['id' => $item->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label class="form-label">Nombre producto</label>
                  <input type="text" class="form-control" name="producto" value="{{ $item->producto }}">
                  <p class="text-decoration-line-through">{{ $errors->first('producto')}}</p>
                </div>
                <div class="mb-3">
                  <label class="form-label">Proveedor</label>
                  <input type="text" class="form-control" name="proveedor" value="{{ $item->proveedor }}">
                  <p class="text-decoration-line-through">{{ $errors->first('proveedor')}}</p>
                </div>
                <div class="mb-3">
                  <label class="form-label">Descripción</label>
                  <input type="text" class="form-control" name="descripcion" value="{{ $item->descripcion }}">
                  <p class="text-decoration-line-through">{{ $errors->first('descripcion')}}</p>
                </div>
                <div class="mb-3">
                  <label class="form-label">Costo</label>
                  <input type="text" class="form-control" name="costo" value="{{ $item->costo }}">
                  <p class="text-decoration-line-through">{{ $errors->first('costo')}}</p>
                </div>
                <div class="mb-3">
                  <label class="form-label">Stock</label>
                  <input type="text" class="form-control" name="stock" value="{{ $item->stock }}">
                  <p class="text-decoration-line-through">{{ $errors->first('stock')}}</p>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger"><i class="bi bi-trash"></i> Eliminar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-arrow-return-left"></i> Cerrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- MODAL PARA EDITAR PRODUCTO --}}
<div class="modal fade" id="editarProducto{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('producto.update', ['id' => $item->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre producto</label>
                    <input type="text" class="form-control"  name="producto" value="{{ $item->producto }}">
                    <p class="text-decoration-line-through">{{ $errors->first('producto')}}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Proveedor</label>
                    <input type="text" class="form-control" name="proveedor" value="{{ $item->proveedor }}">
                    <p class="text-decoration-line-through">{{ $errors->first('proveedor')}}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $item->descripcion }}">
                    <p class="text-decoration-line-through">{{ $errors->first('descripcion')}}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Costo</label>
                    <input type="text" class="form-control" name="costo" value="{{ $item->costo }}">
                    <p class="text-decoration-line-through">{{ $errors->first('costo')}}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock" value="{{ $item->stock }}">
                    <p class="text-decoration-line-through">{{ $errors->first('stock')}}</p>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-success"><i class="bi bi-trash"></i> Editar</button>
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-arrow-return-left"></i> Cerrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>