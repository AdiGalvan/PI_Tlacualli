document.addEventListener('DOMContentLoaded', function() {
    $('#edit_publicacion').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var id = button.data('id'); // Extraer información de los atributos data-*
        var nombre = button.data('nombre');
        var id_tipo = button.data('id_tipo');
        var descripcion = button.data('descripcion');

        // Actualiza los inputs del modal con la información recibida
        var modal = $(this);
        modal.find('#edit_nombre').val(nombre);
        modal.find('#edit_id_tipo').val(id_tipo);
        modal.find('#edit_descripcion').val(descripcion);

        // Actualiza la acción del formulario para incluir el ID del recurso a editar
        var action = '{{ route("publicaciones.update", ":id") }}';
        action = action.replace(':id', id);
        modal.find('#editForm').attr('action', action);
    });
});
