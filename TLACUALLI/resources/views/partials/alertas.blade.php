@php
    $notificaciones = [
        //login y perfil
        'Confirmacion_login' => 'success_login',
        'Error_login' => 'error',
        'Confirmacion_logout' => 'success_login',
        'Confirmacion_update' => 'user_update',
        'Confirmacion_registro' => 'register',
        'Confirmacion_cambio' => 'user_update',
        'Confirmacion_eliminacion' => 'user_delete',
        'Error_contraseña' => 'error',
        //publicaciones
        'success'=>'success',
        'error' => 'error',
        //Solicitudes
        'confirmacion'=>'success',
        'noResults' => 'error',
        //activacion-desactivacion
        'on' => 'on',
        'off' => 'off',
        'update' => 'update',
    ];
@endphp

<script>
    // Define color gradients
    var colors_notyf = {
        success: 'linear-gradient(to right, #1d9e49, #0a3d1a)',
        error: 'linear-gradient(to right, #b91c1c, #7f1d1d)',
        // Add other color gradients if needed
    };
</script>


@foreach ($notificaciones as $sessionKey => $type)
    @if(session()->has($sessionKey))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var notyf = new Notyf({
                    duration: 5000,
                    position: {
                        x: 'right',
                        y: 'bottom',
                    },
                    dismissible: true,
                    types: [
                        {
                            type: 'success_login',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'account_circle'
                            }
                        },
                        {
                            type: 'register',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'person_add'
                            }
                        },
                        {
                            type: 'user_delete',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'person_off'
                            }
                        },
                        {
                            type: 'user_update',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'manage_accounts'
                            }
                        },
                        {
                            type: 'success',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'check_circle'
                            }
                        },
                        {
                            type: 'error',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.error,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'report'
                            }
                        },
                        {
                            type: 'on',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'check_circle'
                            }
                        },
                        {
                            type: 'off',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'unpublished'
                            }
                        },
                        {
                            type: 'update',
                            className: 'notyf__toast--custom',
                            background: colors_notyf.success,
                            icon: {
                                className: 'material-icons notyf__icon-custom',
                                tagName: 'i',
                                text: 'published_with_changes'
                            }
                        }
                    ]
                });

                notyf.open({
                    type: '{{ $type }}',
                    message: '{{ session($sessionKey) }}',
                });
            });
        </script>
    @endif
@endforeach

@if($errors->first('_ca') || $errors->first('_ni') || $errors->first('_cp') || $errors->first('_edo') || $errors->first('_ne') || $errors->first('_col') || $errors->first('_mun')||$errors->first('_ca_fiscal')||$errors->first('_ni_fiscal')||$errors->first('_cp_fiscal')||$errors->first('_edo_fiscal')||$errors->first('_ne_fiscal')||$errors->first('_col_fiscal')||$errors->first('_mun_fiscal'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var notyf = new Notyf({
                duration: 5000,
                position: {
                    x: 'right',
                    y: 'center',
                },
                dismissible: true,
                types: [
                    {
                        type: 'error',
                        className: 'notyf__toast--custom',
                        background: colors_notyf.error,
                        icon: {
                            className: 'material-icons notyf__icon-custom',
                            tagName: 'i',
                            text: 'priority_high'
                        }
                    }
                ]
            });

            notyf.open({
                type: 'error',
                message: 'Para guardar una dirección, todos los campos son requeridos.',
            });
        });
    </script>
@endif
