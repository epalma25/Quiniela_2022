<?php
session_start();
error_reporting( ~E_NOTICE );
$razsoc=$_SESSION['razsoc'] ;
if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>
<!-- llama a los datos del usuario -->
<?php
 include("config.php");
 extract($_SESSION);
		$stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_email =:user_email');
		$stmt_edit->execute(array(':user_email'=>$user_email));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

		?>

		<?php
 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

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
	 <link rel="shortcut icon" href="../assets/img/logosz.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
  
    <link rel="stylesheet" href="AlertifyJS/css/alertify.min.css" />
	<link rel="stylesheet" href="AlertifyJS/css/themes/semantic.min.css" />
	<script src="AlertifyJS/alertify.min.js"></script>
  
  

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6364f0e6b0d6371309cd44d4/1gh14q1p6';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</head>
<body>
<div class="col-md-12" style="text-align:center">
                    <h4>El torneo comienza en</h4>
                    <div style="font-size:18px; color:blue" id="Clock"></div>
          </div>
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
                 <?php include("mlateralc.php") ?>
                   


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

        <div id="page-wrapper">






    <!-- Wrapper for slides -->
    <?php 
          $ind=rand(6,9);
          $img="i".$ind .".jpg"
          ?>
        
        <!--   <img src="<?=$img ?> alt="..." style="width:100%;height:500px;">-->
          <?php if ($ind==6) { ?>
            <img src="i13.jpg" alt="..." style="width:100%;height:300px;">
           <?php } ?>
          
          <?php if ($ind==7) { ?>
            <img src="i7.jpg" alt="..." style="width:100%;height:300px;">
           <?php } ?>
          <?php if ($ind==8) { ?>
            <img src="i8.jpg" alt="..." style="width:100%;height:300px;">
           <?php } ?>
          <?php if ($ind==9) { ?>
            <img src="i9.jpg" alt="..." style="width:100%;height:300px;">
           <?php } ?>
   


		<br />
			 <div class="alert alert-success">

                      <!--  &nbsp; &nbsp; quis noLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,strud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.
   </div>
					<br />

			<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       &copy 2022 <?php echo $razsoc?>| All Rights Reserved | Design by : EP
						</p>

                    </div>

                </div>
            </div>




        </div>



    </div>
    <!-- /#wrapper -->


	<!-- Mediul Modal -->
        <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
           
          
          <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#008CBA" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 style="color:white" class="modal-title" id="myModalLabel">Configuracion Cuenta</h3>
              </div>
              <div class="modal-body">




				 <form enctype="multipart/form-data" method="post" action="settings.php">
                   <fieldset>

                     

              <p>Nombres:</p>
              <div class="form-group">
                  <input class="form-control" placeholder="Firstname" name="user_firstname" type="text" value="<?php  echo $user_firstname; ?>" required>
							</div>


							<p>Apellidos:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Lastname" name="user_lastname" type="text" value="<?php  echo $user_lastname; ?>" required>


							</div>

							<p>Empresa,Grupo,Familia,Identificacion, Etc:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Empresa,Grupo,Familia,Identificacion, Etc" name="user_address" type="text" value="<?php  echo $user_address; ?>" required>


							</div>

							<p>Contraseña:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="<?php  echo $user_password; ?>" required>


							</div>

							<div class="form-group">

                                <input class="form-control hide" name="user_id" type="text" value="<?php  echo $user_id; ?>" required>


							</div>








					 </fieldset>


              </div>
              <div class="modal-footer">

                <button class="btn btn-block btn-success btn-md" name="user_save">Guardar</button>

				 <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancelar</button>


				   </form>
              </div>
            </div>
          </div>
        </div>




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

<script src="js/countdown.js"></script>

	  	  <script>

    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });
    });

    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>



</body>
</html>
