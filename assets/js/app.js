$(document).ready(function() {

    $("#loginForm").bind("submit", function() {

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm button[type=submit]").html("enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
                
                if (response.estado == "true") {
                    
                    window.location.href = "usuario.php";
                  
                } else {
                   alert('usuario o contraseña incorrectos');
                }

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                alert('usuario o contraseña incorrectos');

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });

        return false;
    });

});

/*   if (response.estado == "true") {
                    if (isset($_SESSION["usuario"])) {
                        if ($_SESSION["usuario"]["privilegio"] == 2) {
                            window.location.href = "usuario.php";
                        }
                    } else {
                        window.location.href = "admin.php";
                    }
                    */