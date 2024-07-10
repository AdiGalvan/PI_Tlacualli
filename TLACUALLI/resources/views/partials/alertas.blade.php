{{-- Script para el SweetAlert de AGREGAR PRODUCTO --}}
<script>
    function showSweetAlert() {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Producto Agregado Correctamente!",
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>

{{-- Script para el SweetAlert de REGISTRAR PRODUCTO --}}
<script>
    function showSweetAlert1() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-outline-success",
                cancelButton: "btn btn-outline-danger me-3" 
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, agregarlo",
            cancelButtonText: "No, cancelar",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "¡Agregado!",
                    text: "El producto fue agregado correctamente.",
                    icon: "success"
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelado",
                    text: "El producto no se agregó :)",
                    icon: "error"
                });
            }
        });
    }
</script>

@if(session()->has('Confirmacion_login'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('Confirmacion_login')}}',
        'success'
    )
</script>
@endif

@if(session()->has('Confirmacion_logout'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('Confirmacion_logout')}}',
        'success'
    )
</script>
@endif

@if(session()->has('Confirmacion_registro'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('Confirmacion_registro')}}',
        'success'
    )
</script>
@endif

@if(session()->has('Error_login'))
<script>
    Swal.fire(
        'Error',
        '{{ session('Error_login') }}',
        'error'
    )
</script>
@endif