jQuery(document).ready(function( $ ){

    var siteurl = "https://www.ametel.es";

    $("#anonimo").on('click', function(event) {
        //$(".div-anon").slideToggle(100);
        $(".div-anon").toggleClass("hide show");
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

    $("#iniciar-canal").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl+"/controllers/crearCaso.php",
            data: { 
                password: $("#modal-password").val() 
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1)
                    window.location.replace(siteurl+"/chat-canal-comunicacion");
                else
                    alert(objJSON.message);
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

    $("#recuperar-canal").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl+"/controllers/recuperarCanal.php",
            data: { 
                idCaso: $("#modal-id-caso").val(),
                password: $("#modal-password-caso").val() 
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1)
                    window.location.replace(siteurl+"/chat-canal-comunicacion");
                else
                    alert(objJSON.message);
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });

    $("#enviar-mensaje").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: siteurl+"/controllers/enviarMensaje.php",
            data: { 
                mensaje: $("#input-chat-text").val(),
                codigo: $("#input-codigo-caso").val(),
                id: $("#input-id-caso").val(),
                id_agente: $("#input-id-agente").val()
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1) {
                    window.location.replace(siteurl+"/chat-canal-comunicacion");
                    /*
                    $(".messages").append(
                        '<div class="message"><p>' + objJSON.message + '</p><span class="date">' + objJSON.date + '</span></div>'
                    );
                    */
                    console.log(objJSON.message + " " + objJSON.date);
                } else
                    alert(objJSON.message);
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
            url: siteurl+"/controllers/cerrarSesionCaso.php",
            data: { 
                cerrar: 1
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1) {
                    window.location.replace(siteurl+"/chat-canal-comunicacion");
                } else
                    alert(objJSON.message);
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
            url: siteurl+"/controllers/iniciarSesion.php",
            data: { 
                 nick: $("#agent-nick").val(),
                 password: $("#agent-password").val()
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1) {
                    window.location.replace(siteurl+"/admin-panel");
                } else
                    alert(objJSON.message);
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
            url: siteurl+"/controllers/recuperarCanal.php",
            data: { 
                id: $(this).closest('.chat').attr('id')
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1) {
                    window.location.replace(siteurl+"/chat-canal-comunicacion");
                } else
                    alert(objJSON.message);
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
            url: siteurl+"/controllers/cerrarChat.php",
            data: { 
                id: $(this).closest('.chat').attr('id')
            },
            success: function(result) {
                var objJSON = JSON.parse(result);
                if(objJSON.ok == 1) {
                    window.location.replace(siteurl+"/admin-panel");
                } else
                    alert(objJSON.message);
            },
            error: function(result) {
                alert('Ha ocurrido un error');
            }
        });
    });
});