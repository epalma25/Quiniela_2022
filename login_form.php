
<!doctype html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"><meta charset="utf-8">        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            @import "/css/ie.css";
            @import "/css/layout.css";
        </style>
        <script type="text/javascript" src="/jscripts/jquery-1.8.2.min.js"></script><script type="text/javascript" src="/jscripts/jquery.validate.min.js"></script><script type="text/javascript" src="/jscripts/hideshow.js" ></script><script type="text/javascript" src="/jscripts/jquery.tablesorter.min.js" ></script><script type="text/javascript" src="/jscripts/jquery.equalHeight.js"></script>                <title> Qatar 2022 Login</title>
    </head>
    <body>
        <div style="text-align:center">
            <!-- end of header bar --><!-- end of secondary bar --><!-- end of sidebar -->
            <script>


    $(document).ready(function() {

        $('#form1').validate({
            rules: {
                user: {
                    required: true
                },
                clave: {
                    required: true
                }

            },
            errorElement: "div"
        });


        $("#user").click(function() {

            $("#mensaje").html('&nbsp;');
        });

        $("#clave").click(function() {

            $("#mensaje").html('&nbsp;');
        });


        $("#submit").click(function() {

            //validando
            if (!$("#form1").valid())
                return false;

            var formData = $("#form1").serialize();

            $.ajax({
                type: "POST",
                url: "/main/login",
                cache: false,
                data: formData,
                success: function(data) {
                    data = $.trim(data);
                    
                    if (data > 0) {
                        $(location).attr('href', '/main/index');
                    } else {
                        $("#mensaje").html('<div class="warning">Error de usuario ó contraseña</div>');

                    }
                }
            });

            return false;
        });


        $("#registro").click(function() {

            var url = "/registro/nuevo";
            $(location).attr('href', url);

        });

    });
</script>

<section style="max-width: 450px;">

    <!-- end of stats article --><!-- end of content manager article --><!-- end of messages article -->

    <article class="module width_full">


        <h1><img src="images/wc2022.png"></h1>
        <div class="module_content">
            <form name="form1" id="form1">
                <fieldset>
                    <label for="user">Usuario:</label>
                    <input id="user" name="user">
                </fieldset>
                <fieldset>
                    <label for="clave">Clave:</label>
                    <input id="clave" name="clave" type="password">
                </fieldset>
            </form>
            <div id="mensaje">&nbsp;</div>

            <br>
            <input id="submit" type="submit" value="Entrar" style="width:80px;" class="alt_btn">
            <button id="registro" style="width:80px;" class="alt_btn">Registrate!!</button>
        </div>
        <footer>
            <div style="margin-top:8px;" align="center">
                ©&nbsp;<?= date("Y") . " Disfruta del mundial jugando la quiniela" ?> 
            </div>
        </footer>


    </article>




</section>

</section>            <p>&nbsp;</p>
        </div>
    </body>
</html>