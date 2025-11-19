(function ($) {
    $(document).ready(function () {

        // Menú hamburguesa
        var $hamburger = $(".hamburger");
        $hamburger.on("click", function(e) {
            $hamburger.toggleClass("is-active");
            if ($hamburger.hasClass("is-active")) {
                $('#myNav').css("width", "100%");
                $('body').css('overflow', 'hidden');
            } else {
                $('#myNav').css("width", "0%");
                $('body').css('overflow', 'auto');
            }
        });

        function cerrarOverlay() {
            $hamburger.removeClass("is-active");
            $('#myNav').css("width", "0%");
            $('body').css('overflow', 'auto');
        }

        $(document).on('keydown', function(e) {
            if (e.key === "Escape" || e.keyCode === 27) {
                if ($hamburger.hasClass("is-active")) {
                    cerrarOverlay();
                }
            }
        });

        $('#modalCanal').on('shown.bs.modal', function () {
            $('#modal-password').focus();
        });

        $('#modalCaso').on('shown.bs.modal', function () {
            $('#modal-id-caso').focus();
        });

    });

    var siteurl = "https://www.dualgas.es";

    // Toggle anónimo
    $("#anonimo").on('click', function(event) {
        $(".div-anon").toggleClass("hide show");
    });

    // CREAR CASO - Submit del formulario
    $(document).on('submit', '#form-crear-caso', function(e) {
        e.preventDefault();
        
        var password = $("#modal-password").val().trim();
        if (!password) {
            alert('Por favor, introduce una contraseña');
            return false;
        }

        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/crearCaso.php",
            data: { password: password },
            dataType: 'json',
            timeout: 15000,
            beforeSend: function() {
                $("#iniciar-canal").prop('disabled', true).text('Procesando...');
            },
            success: function(objJSON) {
                if (objJSON && objJSON.ok === 1) {
                    window.location.href = siteurl + "/chat-canal-comunicacion";
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ha ocurrido un error');
            },
            complete: function() {
                $("#iniciar-canal").prop('disabled', false).text('Iniciar sesión');
            }
        });
    });

    // RECUPERAR CASO - Submit del formulario
    $(document).on('submit', '#form-recuperar-caso', function(e) {
        e.preventDefault();
        
        var idCaso = $("#modal-id-caso").val().trim();
        var password = $("#modal-password-caso").val().trim();
        
        if (!idCaso || !password) {
            alert('Por favor, completa todos los campos');
            return false;
        }

        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/recuperarCanal.php",
            data: { 
                idCaso: idCaso,
                password: password 
            },
            dataType: 'json',
            timeout: 15000,
            beforeSend: function() {
                $("#recuperar-canal").prop('disabled', true).text('Procesando...');
            },
            success: function(objJSON) {
                if (objJSON && objJSON.ok === 1) {
                    window.location.href = siteurl + "/chat-canal-comunicacion";
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ha ocurrido un error');
            },
            complete: function() {
                $("#recuperar-canal").prop('disabled', false).text('Iniciar sesión');
            }
        });
    });

    $("#enviar-mensaje").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/enviarMensaje.php",
            data: { 
                mensaje: $("#input-chat-text").val(),
                codigo: $("#input-codigo-caso").val(),
                id: $("#input-id-caso").val(),
                id_agente: $("#input-id-agente").val()
            },
            dataType: 'json',
            success: function(objJSON) {
                if(objJSON && objJSON.ok == 1) {
                    window.location.replace(siteurl + "/chat-canal-comunicacion");
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

    $("#log-out").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/cerrarSesionCaso.php",
            data: { cerrar: 1 },
            dataType: 'json',
            success: function(objJSON) {
                if(objJSON && objJSON.ok == 1) {
                    window.location.replace(siteurl + "/chat-canal-comunicacion");
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

    $("#agent-login").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/iniciarSesion.php",
            data: { 
                 nick: $("#agent-nick").val(),
                 password: $("#agent-password").val()
            },
            dataType: 'json',
            success: function(objJSON) {
                if(objJSON && objJSON.ok == 1) {
                    window.location.replace(siteurl + "/admin-panel");
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

    $(".acceder-chat").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/recuperarCanal.php",
            data: { 
                id: $(this).closest('.chat').attr('id')
            },
            dataType: 'json',
            success: function(objJSON) {
                if(objJSON && objJSON.ok == 1) {
                    window.location.replace(siteurl + "/chat-canal-comunicacion");
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

    $(".button-cerrar-chat").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl + "/controllers/cerrarChat.php",
            data: { 
                id: $(this).closest('.chat').attr('id')
            },
            dataType: 'json',
            success: function(objJSON) {
                if(objJSON && objJSON.ok == 1) {
                    window.location.replace(siteurl + "/admin-panel");
                } else {
                    alert('Ha ocurrido un error');
                }
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

})(jQuery);