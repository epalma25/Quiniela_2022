<?php
session_start();
$razsoc=$_SESSION['razsoc'] ;
$user_email=$_SESSION['user_email'];
include 'lib/core/Calendar.php';

$currentDate = date("d/m h:i:A");
$fecha=$currentDate;
$ronda="Primera Ronda";
$lae="images/laeeb_full.png" ;
$lae1="felicidad.jpg" ;
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

   
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 <script src="js/datatables.min.js"></script>
 <!-- mensajes estilos Edwin 15-01-2020 -->
     <link rel="stylesheet" href="alertify.min.css" />
	<link rel="stylesheet" href="semantic.min.css" />
	<script src="AlertifyJS/alertify.min.js"></script>
    <script src="videoyoutube.js"></script>
    
</head>
<body>
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
               
            </div>
  
        </nav>
  <div style="float: left">
          <img style="width: 150px; padding: 20px" onclick="location.replace('/main/index')" src="<?=$lae ?>">
    </div>
  <br>
          <br>
 <span style="text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px"><?= $ronda ?></span>
  


<table class="table table-responsive table-striped">
    <tbody>
      <tr>
       
      </tr>
      
       <tr>
         <td>
    <li style = "text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px">Para participar debe llenar la quiniela al menos 1 dia antes de cada juego (no es necesario
                        llenarla completa de una vez)</li>
         </td>
      </tr>
      <tr>
        <td>
                        <li style = "text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px">Los puntos son: (5) acertar resultado, (3) acertar ganador, (1) acertar un empate</li>
           </td>
      </tr>
      <tr>
        <td>              
         <li style = "text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px">Se premiarán 1ero (50%) , segundo (30%) y tercer lugar (20%) por cada ronda (Por Filtros Empresa,Grupos,etc)</li>
        </td>
      </tr>
      <tr>
        <td>   
      <li style = "text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px">En caso de empate, se divide el premio entre el total de participantes empatados</li>
          </td>
      </tr>
      
         <tr>
        <td>  
      <li style = "text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px">El Último invita las cervezas</li>
    </td>
      </tr>
      
      <tr>
        <td>  
    
    </td>
      </tr>
      
      
         <tr>
        <td >  
      <div style="float: center">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <img style="width: 450px; padding: 20px" onclick="location.replace('/qatar2022v1/index.php')" src="<?=$lae1 ?>">
    </div>
    </td>
      </tr>
         <tr>
        <td>  
  
    </td>
      </tr>
     </tbody>
  
</table>


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




				 <form enctype="multipart/form-data" method="post" action="posiciones.php">
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
<!-- consulta posiciones -->
  
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
   
      </body>
</html>