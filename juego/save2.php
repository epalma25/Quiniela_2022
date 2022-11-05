<?php 
include 'lib/core/Calendar.php';
 $iduser=$_POST['user_id'];
$dbcon=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	mysqli_set_charset($dbcon,'utf8');

// excel

 
	require_once '../PHPExcel/Classes/PHPExcel.php';
	// Creamos un objeto PHPExcel
	$objPHPExcel = new PHPExcel();
	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	
	$objPHPExcel = $objReader->load('qatar.xlsx');
	// Indicamos que se pare en la hoja uno del libro
	$objPHPExcel->setActiveSheetIndex(0);
	$query="SELECT `id`, `ronda_id`, `fecha`, `equipo1_id`, `marcador1`, `equipo2_id`, `marcador2`, `ganador`, `estatus` FROM `partido` where estatus=1 order by fecha; ";
		
	 $resultado = $dbcon->query($query);
	
    $pos = 1;
    $sw=0;  
		while ($fila = $resultado->fetch_assoc()) {
          $nrop=$fila['id'];
             $I=3;
       //     SELECT * FROM `equipo` where id=$fila['id']; // nombre pais
                       $lmarc1="E";
                       $lmarc2="F";
                       $lpuntos="G";
           switch ( $nrop) {
                    case 1:
                       $lmarc1="E";
                       $lmarc2="F";
                       $lpuntos="G";
                      break;
                    case 2:
                       $lmarc1="H";
                       $lmarc2="I";
                       $lpuntos="J";
                      break;
                    case 3:
                       $lmarc1="K";
                       $lmarc2="L";
                       $lpuntos="M";
                      break;
               }
               
              $objPHPExcel->getActiveSheet()->SetCellValue($lmarc1.$I,  $fila['marcador1']); // pais1 : marcador 1
        	  $objPHPExcel->getActiveSheet()->SetCellValue($lmarc2.$I,  $fila['marcador2']); // pais2 : marcador 2
              
              $objPHPExcel->getActiveSheet()->SetCellValue('D'.$I,"<-----Resultado Reales----->");
              $sql = "SELECT usuario_id,sum(puntaje) ,users.user_firstname,users.user_lastname,users.user_address FROM `usuario_partido`, users  WHERE  usuario_id=users.user_id  GROUP BY usuario_id ORDER BY sum(puntaje) desc;";
                  $result=mysqli_query($dbcon,$sql); 
                   $pos = 1;   
                   $I=4;
                  while ($ver = mysqli_fetch_array($result)) {
                    $id_user=$ver[0];
                     $sqlc = " SELECT `usuario_id`, `partido_id`, `ronda_id`, `marcador1`, `marcador2`, `estatus`, `puntaje` FROM `usuario_partido` where partido_id=$nrop and usuario_id= $id_user";
                          $resultc=mysqli_query($dbcon,$sqlc); 
                         
                          while ($verc = mysqli_fetch_array($resultc)) {
                                 $I++;
                                  $objPHPExcel->getActiveSheet()->SetCellValue($lmarc1.$I,  $verc['marcador1']); // pais1 : marcador 1
        	                      $objPHPExcel->getActiveSheet()->SetCellValue($lmarc2.$I,  $verc['marcador2']); // pais2 : marcador 2
                                  $objPHPExcel->getActiveSheet()->SetCellValue($lpuntos.$I,  $verc['puntaje']); // pais2 : marcador 2
                  
                  }
                    
                    if ($sw==0){
                    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$I, $pos++);
                    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$I, $ver[1]);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$I, $ver[4]);
                    $nombre= $ver[2]. " " . $ver[3];
                    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$I,$nombre);}
                    
        	  
                } 
        
        	
        	$sw=1;
        	
		    
		}
    $objPHPExcel->getActiveSheet()->getProtection()->setPassword('password');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save("Top_Rank.xlsx");
	$salida=	"Descargue Top Rank 5";

$close = mysqli_close($dbcon);
	echo $salida; 

//


function isInTime($match) {
                    return (diffTime($match) >= 1) ? true : false;
                }
                function diffTime($match) {

                    $date1 = strtotime($match);
                    return intval(floor(($date1 - time()) / 3600));
                }
?>
   
    
      



        



