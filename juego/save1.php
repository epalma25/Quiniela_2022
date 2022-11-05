<?php 
 $iduser=$_POST['user_id'];


$con=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
$mensaje="<b>No actulizo Ningun Registro Revisar por Favor</b>" ;

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	mysqli_set_charset($con,'utf8');
for ($i = 1; $i < 49 ; $i++) {
 
  $sql = "SELECT `id`, `ronda_id`, `fecha`, `equipo1_id`, `marcador1`, `equipo2_id`, `marcador2`, `ganador`, `estatus` FROM `partido` WHERE id = $i";
 
  $result=mysqli_query($con,$sql); 
            while ($ver = mysqli_fetch_array($result)) {
              $estatus= $ver[8];
              if ($estatus == '0') { 
                      $v1=  $_POST [$i . "_m1"];
                      $v2=  $_POST [$i . "_m2"];
                      if($v1 !="" && $v2 !="" ){
                            $idpartido=$i;
                            $ronda_id=1;
                            $estatus=0;
                            $puntaje=0;
                            $insert="";
                            $delete= "delete from usuario_partido where usuario_id = $iduser and partido_id = $i ";
                            $resultado1 = mysqli_query($con,$delete);
                            $insert=  " INSERT INTO usuario_partido (usuario_id, partido_id, ronda_id, marcador1, marcador2) VALUES ('$iduser','$idpartido','$ronda_id','$v1','$v2')";
                            $resultado1 = mysqli_query($con,$insert);
                            $mensaje="<b>Completado con exito</b>" ;
                            
                      }
     					 }
                          
            
            }
  
  // $resultado = $con->query($sql);

  
  
}
$close = mysqli_close($con);
 echo $mensaje;
?>
   
    
      



        



