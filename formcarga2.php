<?php
session_start();
$razsoc=$_SESSION['razsoc'] ;
$user_id=$_SESSION['user_id'] ;
$user_email=$_SESSION['user_email'];
if(!$_SESSION['admin_username'])
{

  //  header("Location: ../index.php");
  //usar esta linea para cargar resultados solo si es administrador
}
include 'lib/core/Calendar.php';

$currentDate = date("d/m h:i:A");
$fecha=$currentDate;
$ronda="Primera Ronda " ;
$lae="images/laeeb_full.png" ;
$waiting_day = 1668938400;
                                $time_left = $waiting_day - time();

                                $days = floor($time_left / (60*60*24));
                                $time_left %= (60 * 60 * 24);

                                $hours = floor($time_left / (60 * 60));
                                $time_left %= (60 * 60);

                                $min = floor($time_left / 60);
                                $time_left %= 60;

                                $sec = $time_left;
        
     			        $contador= "Remaing time: " . $days. " days , ". $hours. " . hours , "  .$min. " min and " .$sec . " sec left";
?>



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $razsoc?></title>
	 <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

  <link rel="stylesheet" href="AlertifyJS/css/alertify.min.css" />
	<link rel="stylesheet" href="AlertifyJS/css/themes/semantic.min.css" />
	<script src="AlertifyJS/alertify.min.js"></script>
 <script src="videoyoutube.js"></script> 
   
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/datatables.min.js"></script>

   
    
</head>
<body>
     <script>

            const app = document.getElementById('app');

window.onload = function() {
  document.addEventListener("contextmenu", function(e){
    e.preventDefault();
  }, false);
} 

app.addEventListener('click', () => {
  alert('click izquierdo')
});
     </script>    
 <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo $razsoc?></a>
            </div>
           <!----colocar aqui menu lateral ---->
           <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <?php include("mlateral.php") ?>
                   

                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_email; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">


        <div id="page-wrapper">
          
          <script type="text/javascript" src="/jscripts/jquery-1.8.2.min.js"></script><script type="text/javascript" src="/jscripts/jquery.validate.min.js"></script><script type="text/javascript" src="/jscripts/hideshow.js" ></script><script type="text/javascript" src="/jscripts/jquery.tablesorter.min.js" ></script><script type="text/javascript" src="/jscripts/jquery.equalHeight.js"></script>        <script type="text/javascript">
          // validar solo numeros
          function validaNumericos(event) {
                if(event.charCode >= 48 && event.charCode <= 57){
                  return true;
                 }
                 return false;        
			}
          // hasta aqui
          function mensaje(){	
		    //alertify.alert("Debe registrarse").set('label', 'Aceptar');
		   
		    alertify.error('Debe Iniciar Sesion');
		    alertify.alert('RACI V1.0', 'Debe iniciar Sesion!', function () { });
		    
		}
          
          
          
          
          
          
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
          
          
                <script>
    $(document).ready(function() {
       
        $("#submit1").click(function() {
           
            $("#mensaje").html('&nbsp');
            var formData = $("#form1").serialize();
            $.ajax({
                type: "POST",
                url: "juego/save1",
                cache: false,
                data: formData,
                success: function(response) {
                  
                    $("#mensaje").html('<b>Completado con exito</b>');
                    if (response != '') {$("#mensaje").html('<b>Completado con exito save1 </b>');}
                }
            });
            return false;
        });
        $("#submit").click(function() {
     var progreso = document.getElementById('elemento');
             document.getElementById("elemento").style.display = "block";
         alertify.success('Procesando Datos');
           $("#mensaje").html('&nbsp');
           var formData = $("#form1").serialize();
          
           $.ajax({
               type: "POST",
               url: "juego/save1.php",
               cache: false,
               data: formData,
               success: function(response) {
                 document.getElementById("elemento").style.display = "none";
                  
                  $("#mensaje").html(response);
               }
           });
           return false;
       });
    });
</script>
                <title> Qatar 2022 Mi Quiniela</title>
          
         <article class="module width_full">

<div style="float: left">
          <img style="width: 150px; padding: 20px"  src="<?=$lae ?>">
    </div>
  <br>
           <br>
  <span style="text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px"><?= $ronda ?></span><br>
            <span style="text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px"><?= $fecha ?></span><br>

         <br>
             <div class="nav-link js-scroll-trigger">
                                <button class="btn-success" onclick="alertify.YoutubeDialog('iCWekM4soT0').set({frameless:true});">Poema al fútbol™  Online</button>
                            </div>
           
    <form name="form1" id="form1">
        <table align="left" border="0" style="text-align: center; width: 450px">
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
                
                $marcador1="";
                $marcador2="";
                ////grupo por fecha 
                $date2 =  $ver[2];
                $date2 = date("Y-m-d", strtotime($date2));
                $fecha =  $date2;
              
               $query = $con -> query ("SELECT `usuario_id`, `partido_id`, `ronda_id`, `marcador1`, `marcador2`, `estatus`, `puntaje` FROM `usuario_partido` WHERE usuario_id='$user_id' and partido_id='$idp' and ronda_id=1");
                while ($valores = mysqli_fetch_array($query)) {
                    $marcador1=$valores[3];
                    $marcador2=$valores[4];
                }
              
              
              
              
            ?>

                <?php
                if ($date2 != $tempDate) {
                   echo "<tr><td colspan='6'><p><b><b></p></td></tr>";
                    echo "<tr><td colspan='6'><p><b>Jornada: $date2<b></p></td></tr>";
                    echo "<tr><td colspan='6'><p><b><b></p></td></tr>";
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
                            <input type="number"onkeypress='return validaNumericos(event)'  min="0" max="15" name="<?= $idp . "_m1" ?>" value="<?= $marcador1 ?>" style="width: 35px; text-align: center">
                        <?php } ?>
                    </td>
                    <td><b>Vs</b></td>
                    <td>
                        <?php if (!isInTime($fecha)) { ?>
                            <span class="cell-disable"><?= $marcador2 ?></span>
                        <?php } else { ?>
                            <input type="number" onkeypress='return validaNumericos(event)' min="0" max="15" name="<?= $idp . "_m2" ?>" value="<?= $marcador2 ?>" style="width: 35px; text-align: center">
                        <?php } ?>
                    </td>
                    <td><img src="<?=  $flag2 ?>"></td>
                    <td style="text-align: left"><?= $name2 ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan='6'>
                    <div style="text-align: center; margin-top: 14px; width: auto">
                        <input id="submit" type="submit" value="Guardar" style="width:120px; font-size: 15px" class="btn btn-primary btn-lg">
                      
                    </div>
                     <div id="elemento" class="loadingraci"  style="display:none;"   >
                          Enviando...<br />
                          <br />
                          <img src="loader.gif"  height: 25px alt=""  />
   					 </div> 
                    <div id="mensaje"></div>
                   <input hidden type="number" min="0" max="15" name="user_id" value="<?= $user_id ?>" style="width: 35px; text-align: center">
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        
    </form>
</article>
          
           
<!--- para seleccionar el grupo para mostrar en la consulta de posiciones -->

	<!-- Mediul Modal -->
        <div class="modal fade" id="setposicion" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
           
          
          <div class="modal-dialog modal-sm">
            <div style="color:black;background-color:#008CBA" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 style="color:white" class="modal-title" id="myModalLabel">Seleccionar Grupo</h3>
              </div>
              <div class="modal-body">




				 <form enctype="multipart/form-data" method="post" action="posicionesp.php">
                   <fieldset>

                     

              <p>Seleccion un Grupos:</p>
              <div class="form-group">
                
                
               <!--   <input class="form-control" placeholder="grupo" name="user_grupo" type="text" value="<?php  echo $user_address; ?>" required>-->
                
                    <select name="grupo"  class="form-select" aria-label="Default select example" >
                      <!-- Opciones de la lista -->
                      <option value="Todos">Todos</option>
                      
                   
                
                
                
                <?php 
  
                   $con=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña 
                
                  if(mysqli_connect_errno()){
                      echo 'Conexion Fallida : ', mysqli_connect_error();
                      exit();
                  }
                      mysqli_set_charset($con,'utf8');
                   //   SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id=3;
                  $tempDate = "";
                  $sql = "SELECT DISTINCT (user_address) FROM `users`order by user_address;";
                  $result=mysqli_query($con,$sql); 
                   $pos = 1;
                  while ($ver = mysqli_fetch_array($result)) { ?>
                   <?php  echo '<option value="' .$ver[0] .'">'. $ver[0]. '</option>'; ?>
                        
                  <?php } ?>
                  
                   </select>
							</div>


							

							

							

							<div class="form-group">



							</div>








					 </fieldset>


              </div>
              <div class="modal-footer">

                <button class="btn btn-block btn-success btn-md" name="user_save">Ejecutar</button>

				 <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancelar</button>


				   </form>
              </div>
            </div>
          </div>
        </div>
<!-- consulta posiciones --


</body>
</html>