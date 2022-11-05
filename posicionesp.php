<?php
session_start();
$razsoc=$_SESSION['razsoc'] ;
$user_email=$_SESSION['user_email'];
include 'lib/core/Calendar.php';

$currentDate = date("d/m h:i:A");
$fecha=$currentDate;

$grupo=$_POST['grupo'];

$ronda="Primera Ronda, Posiciones  Grupos :"  .$grupo;

$lae="images/laeeb_full.png";
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
                </ul>
            </div>
  
        </nav>
  <div style="float: left">
          <img style="width: 150px; padding: 20px"  src="<?=$lae ?>">
    
    </div>
  <span style="text-height: 30px; font-weight: bolder; font-size: 16px; padding: 20px"><?= $ronda ?></span><br>
  <span style="text-height: 30px">Fecha actual: <b><?= $fecha ?></b></span> 
 <br>
     <a id="content1"  href="../qatar2022v1/Top_Rank.xlsx">Descargar Top Rank (Detalle)</a>
  <br>
           <br>
 

<table class="table table-responsive table-striped">
                  <thead>
                    <tr> 
                     
                        <th>Posicion</th>
                        <th>Usuario</th>
                        <th>Grupo</th>
                        <th>Puntos</th>
                      
                    </tr>
                 
                </thead>
          <tbody>
                  <?php 
  
                   $con=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña 
                
                  if(mysqli_connect_errno()){
                      echo 'Conexion Fallida : ', mysqli_connect_error();
                      exit();
                  }
                      mysqli_set_charset($con,'utf8');
                   //   SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id=3;
                  $tempDate = "";
                 if ($grupo=="Todos") {
                  $sql = "SELECT usuario_id,sum(puntaje) ,users.user_firstname,users.user_lastname,users.user_address FROM `usuario_partido`, users  WHERE  usuario_id=users.user_id  GROUP BY usuario_id ORDER BY sum(puntaje) desc;";
                 } else{
                    $sql = "SELECT usuario_id,sum(puntaje) ,users.user_firstname,users.user_lastname,users.user_address FROM `usuario_partido`, users  WHERE  usuario_id=users.user_id and users.user_address='$grupo'  GROUP BY usuario_id ORDER BY sum(puntaje) desc;";
                 
                 }
                   $result=mysqli_query($con,$sql); 
                   $pos = 1;
                  while ($ver = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?=$pos++?></td>
                            <td style="text-align: left; padding:2px 0 5px 5px"><?= $ver[2]. " " . $ver[3]; ?></td>
                             <td style="text-align: left; padding:2px 0 5px 5px"><?= $ver[4]; ?></td>
                             <td><?= $ver[1]; ?></td>
                            
                        </tr>
                  <?php } ?>
                  
                       
                  
                
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
<!-- consulta posiciones --
</body>
</html>
      