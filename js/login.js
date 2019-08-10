jQuery(document).on('submit', '#login', function (event) {
    event.preventDefault();

    jQuery.ajax({
        url: './controller/ClassControllerLogin.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function () {
            $('Enviar').val('Validando...');

        }
    })

            .done(function (respuesta) {
                console.log(respuesta);
                if (!respuesta.error) {
                    if (respuesta.tipo == 'ESC') {
                        location.href = 'views/estudiantes/index.php';
                    } else if (respuesta.tipo == 'DOC') {
                        location.href = 'views/docentes/index.php';
                    } else if (respuesta.tipo == 'AMD') {
                        location.href = 'views/admin/index.php';

                    }

                } else {
                    $('.error').slideDown('slow');
                    setTimeout(function () {
                        $('.error').slideUp('slow');
                    }, 3000);
                    $('.Envio').val('INICIAR SESION')

                }
            })
            .fail(function (resp) {
                console.log(resp.responseText);
            })
            .always(function () {
                console.log("complete");
            });

});