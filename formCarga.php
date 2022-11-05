<?php
include 'lib/core/Calendar.php';

$currentDate = date("d/m h:i:A");
$fecha=$currentDate;
$ronda="Primera Ronda";
$lae="images/laeeb_full.png" 

?>

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
        <script type="text/javascript" src="/jscripts/jquery-1.8.2.min.js"></script><script type="text/javascript" src="/jscripts/jquery.validate.min.js"></script><script type="text/javascript" src="/jscripts/hideshow.js" ></script><script type="text/javascript" src="/jscripts/jquery.tablesorter.min.js" ></script><script type="text/javascript" src="/jscripts/jquery.equalHeight.js"></script>        <script type="text/javascript">
            $(document).ready(function()
            {
                $(".tablesorter").tablesorter();

            }
            );

        </script>
        <script type="text/javascript">
            $(function() {
                $('.column').equalHeight();
            });
        </script>
                <title> Qatar 2022 Mi Quiniela</title>
    </head>

    <body>
        <header id="header">
            <div class="myUser">
                <span style="font-weight: bold">
                    Usuario:&nbsp;Sandra Santeliz                </span><br>
                <span style="font-weight: bold">
                    <a href="/main/logout">Cerrar</a>
                </span>
            </div>
        </header> <!-- end of header bar -->

        <section>
            <script>
    $(document).ready(function() {
       
        $("#submit1").click(function() {
           
            $("#mensaje").html('&nbsp');
            var formData = $("#form1").serialize();
            $.ajax({
                type: "POST",
                url: "/juego/save1",
                cache: false,
                data: formData,
                success: function(response) {
                  
                    $("#mensaje").html('<b>Completado con exito</b>');
                    if (response != '') {$("#mensaje").html('<b>Completado con exito </b>');}
                }
            });
            return false;
        });
        $("#submit").click(function() {
         
           $("#mensaje").html('&nbsp');
           var formData = $("#form1").serialize();
          
           $.ajax({
               type: "POST",
               url: "/juego/save1",
               cache: false,
               data: formData,
               success: function(response) {
                   $("#mensaje").html('<b>Completado con exito</b>');
                 
               }
           });
           return false;
       });
    });
</script>

<article class="module width_full">

<div style="float: left">
          <img style="width: 130px; padding: 20px" onclick="location.replace('/main/index')" src="<?=$lae ?>">
    </div>
  
   <span style="text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px"><?= $ronda ?></span><br>
  <span style="text-height: 30px">Fecha actual: <b><?= $fecha ?></b></span> 
    <form name="form1" id="form1">
        <table align="center" border="0" style="text-align: center; width: 350px">
            <?php
                function isInTime($match) {
                    return (diffTime($match) >= 1) ? true : false;
                }
                function diffTime($match) {

                    $date1 = strtotime($match);
                    return intval(floor(($date1 - time()) / 3600));
                }

          //  $con=new mysqli("localhost:3307","root","","worldcup_db"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
       $con=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña 
                
            if(mysqli_connect_errno()){
                echo 'Conexion Fallida : ', mysqli_connect_error();
                exit();
            }
                mysqli_set_charset($con,'utf8');
             //   SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id=3;
            $tempDate = "";
            $sql = "SELECT `id`, `ronda_id`, `fecha`, `equipo1_id`, `marcador1`, `equipo2_id`, `marcador2`, `ganador`, `estatus` FROM `partido` order by fecha,id";
            $result=mysqli_query($con,$sql); 
            while ($ver = mysqli_fetch_array($result)) {
                


           // while ($row = $partidos->getRowFields()) {
                $team1 =  $ver[3];
                $name1 =  "nombre1_" .$ver[3];
                $flag1 = "/images/band/ecu.png";
                $query = $con -> query ("SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id=$team1");
                while ($valores = mysqli_fetch_array($query)) {
                    $flag1 = "/images/band/" .$valores[2];
                    $name1=$valores[1];
                }

               
            

                $team2 =  $ver[5];
                $name2 =  "nombre2_" .$ver[5];
                $flag2  ="/images/band/ecu.png";

                $query = $con -> query ("SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id=$team2");
                while ($valores = mysqli_fetch_array($query)) {
                    $flag2 = "/images/band/" .$valores[2];
                    $name2=$valores[1];
                }
                $idp= $ver[0];
                
                $marcador1=0;
                $marcador2=0;
                ////grupo por fecha 
                $date2 =  $ver[2];
                $date2 = date("Y-m-d", strtotime($date2));
                $fecha =  $date2;
            ?>

                <?php
                if ($date2 != $tempDate) {
                    echo "<tr><td colspan='6'><p><b>Jornada: $date2<b></p></td></tr>";
                   
                    $tempDate = $date2;
                }
                ?>
                <tr>
                    <td style="text-align: right"><?= $name1 ?></td>
                    <td><img src="<?=$flag1 ?>"></td>
                    <td>
                        <?php if (!isInTime($fecha)) { ?>
                            <span class="cell-disable"><?= $marcador1 ?></span>
                        <?php } else { ?>
                            <input type="number" min="0" max="15" name="<?= $idp . "_m1" ?>" value="<?= $marcador1 ?>" style="width: 35px; text-align: center">
                        <?php } ?>
                    </td>
                    <td><b>Vs</b></td>
                    <td>
                        <?php if (!isInTime($fecha)) { ?>
                            <span class="cell-disable"><?= $marcador2 ?></span>
                        <?php } else { ?>
                            <input type="number" min="0" max="15" name="<?= $idp . "_m2" ?>" value="<?= $marcador2 ?>" style="width: 35px; text-align: center">
                        <?php } ?>
                    </td>
                    <td><img src="<?=  $flag2 ?>"></td>
                    <td style="text-align: left"><?= $name2 ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan='6'>
                    <div style="text-align: center; margin-top: 14px; width: auto">
                        <input id="submit" type="submit" value="Guardar" style="width:120px; font-size: 15px" class="alt_btn">
                    </div>
                    <div id="mensaje"></div>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        
    </form>
</article>
</body>





</html>
