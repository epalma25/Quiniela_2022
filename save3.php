<?php 





$dbcon=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	mysqli_set_charset($dbcon,'utf8');



// Calcular posiciones por equipo

$actual= "UPDATE `equipo` SET `G`=0,`E`=0,`P`=0,`GF`=0,`GC`=0,`DG`=0,`PJ`=0,`puntos`=0 ";
//$actual= "UPDATE usuario_partido SET puntaje=$points,estatus=1 WHERE  usuario_id = $id and partido_id = $match";
$resultado1 = mysqli_query($dbcon,$actual);

$query="SELECT `id`, `ronda_id`, `fecha`, `equipo1_id`, `marcador1`, `equipo2_id`, `marcador2`, `ganador`, `estatus` FROM `partido` where estatus=1 order by fecha; ";

	 $resultado = $dbcon->query($query);
	
		while ($fila = $resultado->fetch_assoc()) {
          $equipo1_id=$fila['equipo1_id'];
          $equipo2_id=$fila['equipo2_id'];
          $marcador1=$fila['marcador1'];
          $marcador2=$fila['marcador2'];
          $puntose1=0;
          $puntose2=0;
          $g1=0;
          $g2=0;
          $e=0;
           $p1=0;
          $p2=0;
          $dif=0;
          if ($marcador1 >$marcador2) {
            $puntose1=3;
            $puntose2=0;
             $g1=1;
             $p2=1;
         
          } 
        if ($marcador2 >$marcador1) {
            $puntose2=3;
            $puntose1=0;
           $g2=1;
           $p1=1;
            
          } 
          if ($marcador1 ==$marcador2) {
            $puntose1=1;
            $puntose2=1;
             $e=1;
          } 
          
       $actual1= "UPDATE `equipo` SET `G`=G+$g1,`E`=E+$e,`P`=P+$p1,`GF`=GF+ $marcador1,`GC`=GC+$marcador2,`PJ`=PJ+1,`puntos`=puntos + $puntose1 where id=$equipo1_id ";        
 
      $resultado1 = mysqli_query($dbcon,$actual1);
      $actual2= "UPDATE `equipo` SET `G`=G+$g2,`E`=E+$e,`P`=P+$p2,`GF`=GF+ $marcador2,`GC`=GC+$marcador1,`PJ`=PJ+1,`puntos`=puntos + $puntose2 where id=$equipo2_id " ;        
     
      $resultado1 = mysqli_query($dbcon,$actual2);

          
        }
        
        $actual= "UPDATE `equipo` SET `DG`=GF-GC";

$resultado1 = mysqli_query($dbcon,$actual);
// fin de calcular posiciones

$close = mysqli_close($dbcon);

echo $actual;
?>