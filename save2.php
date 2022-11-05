<?php 


include 'lib/core/Calendar.php';

$currentDate = date("d/m h:i:A");
$fechaact=$currentDate;
 $iduser=$_POST['user_id'];
$dbcon=new mysqli("localhost","twiceeig_twiceeig","2T[-7Hj0W7Ugwj","twiceeig_twiceeig"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	mysqli_set_charset($dbcon,'utf8');

for ($i = 1; $i < 49 ; $i++) {
 
      $sql = "SELECT `id`, `ronda_id`, `fecha`, `equipo1_id`, `marcador1`, `equipo2_id`, `marcador2`, `ganador`, `estatus` FROM `partido` WHERE id = $i";
      $result=mysqli_query($dbcon,$sql); 
                while ($ver = mysqli_fetch_array($result)) {
                $date2 =  $ver[2];
                $date2 = date("Y-m-d", strtotime($date2));
                $fecha =  $date2;
              
                 if (!isInTime($fecha)){
                       $v1=  $_POST [$i . "_m1"];
                      $v2=  $_POST [$i . "_m2"];
                      if($v1 !="" && $v2 !="" ){
                        $r1= $v1;
                        $r2= $v2;
                         $match=$i; 
                            $estatus=1;
                            $puntaje=0;
                           
                            $update= "update partido set marcador1=$v1,marcador2=$v2,estatus=1 where id =$i ";
                           $resultado1 = mysqli_query($dbcon,$update);
                        
                        // actualiza puntuacion
  					
             $sql = "select marcador1, marcador2, usuario_id from usuario_partido where partido_id = $match";

              $resultado2 = $dbcon->query($sql);

              if ($resultado2->num_rows>0) {
                    while ($fila = $resultado2->fetch_assoc()) {

                      $u1=$fila['marcador1'];
                      $u2=$fila['marcador2'];

                      $points = 0;
                      if ($r1 == $u1 && $r2 == $u2) { ////acierto resultado exacto
                          $points = 5;
                      } else if ((($r1 > $r2) && ($u1 > $u2)) or ( ($r1 < $r2) && ($u1 < $u2))) { ///acierto ganador
                          $points = 3;
                      } else if (($r1 == $r2) && ($u1 == $u2)) { ///acierto empate
                          $points = 1;
                      }


                    //  $valor=calcScore($r1, $r2, $fila['marcador1'],$fila['marcador2']);

                      $id=$fila['usuario_id'];
                    $actual= "UPDATE usuario_partido SET puntaje=$points,estatus=1 WHERE  usuario_id = $id and partido_id = $match";


                  $resultado1 = mysqli_query($dbcon,$actual);











                   }
                 }
                        
                        
                        
                        
                        
                        
                           
                      }
     			 }
                          
            
            }
  
  // $resultado = $con->query($sql);
    
  
  
}



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
          $equ1=$fila['equipo1_id'];
          $equ2=$fila['equipo2_id'];
             $I=3;
          // nombre pais
          $sqle=" SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id= $equ1"; // nombre pais
          $resulte=mysqli_query($dbcon,$sqle); 
          $equipo1="";
           while ($vere = $resulte->fetch_assoc()) { 
             $equipo1=$vere['nombre'];
              }
           $sqle=" SELECT `id`, `nombre`, `bandera` FROM `equipo` WHERE id= $equ2"; // nombre pais
          $resulte=mysqli_query($dbcon,$sqle); 
          $equipo2="";
           while ($vere = $resulte->fetch_assoc()) { 
             $equipo2=$vere['nombre'];
              }
          //
          
          
          
          
          
          
          
          
             
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
                case 4:
                       $lmarc1="N";
                       $lmarc2="O";
                       $lpuntos="P";
                      break;
               
               Case 5:
                       $lmarc1="Q";
                       $lmarc2="R";
                       $lpuntos="S";
                      break;
                      Case 6:
                       $lmarc1="T";
                       $lmarc2="U";
                       $lpuntos="V";
                      break;
                      Case 7:
                       $lmarc1="W";
                       $lmarc2="X";
                       $lpuntos="Y";
                      break;
                      Case 8:
                       $lmarc1="Z";
                       $lmarc2="AA";
                       $lpuntos="AB";
                      break;
                      Case 9:
                       $lmarc1="AC";
                       $lmarc2="AD";
                       $lpuntos="AE";
                      break;
                      Case 10:
                       $lmarc1="AF";
                       $lmarc2="AG";
                       $lpuntos="AH";
                      break;
                      Case 11:
                       $lmarc1="AI";
                       $lmarc2="AJ";
                       $lpuntos="AK";
                      break;
                      Case 12:
                       $lmarc1="AL";
                       $lmarc2="AM";
                       $lpuntos="AN";
                      break;
                      Case 13:
                       $lmarc1="AO";
                       $lmarc2="AP";
                       $lpuntos="AQ";
                      break;
                      Case 14:
                       $lmarc1="AR";
                       $lmarc2="AS";
                       $lpuntos="AT";
                      break;
                      Case 15:
                       $lmarc1="AU";
                       $lmarc2="AV";
                       $lpuntos="AW";
                      break;
                      Case 16:
                       $lmarc1="AX";
                       $lmarc2="AY";
                       $lpuntos="AZ";
                      break;
                      Case 17:
                       $lmarc1="BA";
                       $lmarc2="BB";
                       $lpuntos="BC";
                      break;
                      Case 18:
                       $lmarc1="BD";
                       $lmarc2="BE";
                       $lpuntos="BF";
                      break;
                      Case 19:
                       $lmarc1="BG";
                       $lmarc2="BH";
                       $lpuntos="BI";
                      break;
                      Case 20:
                       $lmarc1="BJ";
                       $lmarc2="BK";
                       $lpuntos="BL";
                      break;
                      Case 21:
                       $lmarc1="BM";
                       $lmarc2="BN";
                       $lpuntos="BO";
                      break;
                      Case 22:
                       $lmarc1="BP";
                       $lmarc2="BQ";
                       $lpuntos="BR";
                      break;
                      Case 23:
                       $lmarc1="BS";
                       $lmarc2="BT";
                       $lpuntos="BU";
                      break;
                      Case 24:
                       $lmarc1="BV";
                       $lmarc2="BW";
                       $lpuntos="BX";
                      break;
                      Case 25:
                       $lmarc1="BY";
                       $lmarc2="BZ";
                       $lpuntos="CA";
                      break;
                      Case 26:
                       $lmarc1="CB";
                       $lmarc2="CC";
                       $lpuntos="CD";
                      break;
                      Case 27:
                       $lmarc1="CE";
                       $lmarc2="CF";
                       $lpuntos="CG";
                      break;
                      Case 28:
                       $lmarc1="CH";
                       $lmarc2="CI";
                       $lpuntos="CJ";
                      break;
                      Case 29:
                       $lmarc1="CK";
                       $lmarc2="CL";
                       $lpuntos="CM";
                      break;
                      Case 30:
                       $lmarc1="CN";
                       $lmarc2="CO";
                       $lpuntos="CP";
                      break;
                      Case 31:
                       $lmarc1="CQ";
                       $lmarc2="CR";
                       $lpuntos="CS";
                      break;
                      Case 32:
                       $lmarc1="CT";
                       $lmarc2="CU";
                       $lpuntos="CV";
                      break;
                      Case 33:
                       $lmarc1="CW";
                       $lmarc2="CX";
                       $lpuntos="CY";
                      break;
                      Case 34:
                       $lmarc1="CZ";
                       $lmarc2="DA";
                       $lpuntos="DB";
                      break;
                      Case 35:
                       $lmarc1="DC";
                       $lmarc2="DD";
                       $lpuntos="DE";
                      break;
                      Case 36:
                       $lmarc1="DF";
                       $lmarc2="DG";
                       $lpuntos="DH";
                      break;
                      Case 37:
                       $lmarc1="DI";
                       $lmarc2="DJ";
                       $lpuntos="DK";
                      break;
                      Case 38:
                       $lmarc1="DL";
                       $lmarc2="DM";
                       $lpuntos="DN";
                      break;
                      Case 39:
                       $lmarc1="DO";
                       $lmarc2="DP";
                       $lpuntos="DQ";
                      break;
                      Case 40:
                       $lmarc1="DR";
                       $lmarc2="DS";
                       $lpuntos="DT";
                      break;
                      Case 41:
                       $lmarc1="DU";
                       $lmarc2="DV";
                       $lpuntos="DW";
                      break;
                      Case 42:
                       $lmarc1="DX";
                       $lmarc2="DY";
                       $lpuntos="DZ";
                      break;
                      Case 43:
                       $lmarc1="EA";
                       $lmarc2="EB";
                       $lpuntos="EC";
                      break;
                      Case 44:
                       $lmarc1="ED";
                       $lmarc2="EE";
                       $lpuntos="EF";
                      break;
                      Case 45:
                       $lmarc1="EG";
                       $lmarc2="EH";
                       $lpuntos="EI";
                      break;
                      Case 46:
                       $lmarc1="EJ";
                       $lmarc2="EK";
                       $lpuntos="EL";
                      break;
                      Case 47:
                       $lmarc1="EM";
                       $lmarc2="EN";
                       $lpuntos="EO";
                      break;
                      Case 48:
                       $lmarc1="EP";
                       $lmarc2="EQ";
                       $lpuntos="ER";
                      break;
                      Case 49:
                       $lmarc1="ES";
                       $lmarc2="ET";
                       $lpuntos="EU";
                      break;
                      Case 50:
                       $lmarc1="EV";
                       $lmarc2="EW";
                       $lpuntos="EX";
                      break;
                      Case 51:
                       $lmarc1="EY";
                       $lmarc2="EZ";
                       $lpuntos="FA";
                      break;
                      Case 52:
                       $lmarc1="FB";
                       $lmarc2="FC";
                       $lpuntos="FD";
                      break;
                      Case 53:
                       $lmarc1="FE";
                       $lmarc2="FF";
                       $lpuntos="FG";
                      break;
                      Case 54:
                       $lmarc1="FH";
                       $lmarc2="FI";
                       $lpuntos="FJ";
                      break;
                      Case 55:
                       $lmarc1="FK";
                       $lmarc2="FL";
                       $lpuntos="FM";
                      break;
                      Case 56:
                       $lmarc1="FN";
                       $lmarc2="FO";
                       $lpuntos="FP";
                      break;
                      Case 57:
                       $lmarc1="FQ";
                       $lmarc2="FR";
                       $lpuntos="FS";
                      break;
                      Case 58:
                       $lmarc1="FT";
                       $lmarc2="FU";
                       $lpuntos="FV";
                      break;
                      Case 59:
                       $lmarc1="FW";
                       $lmarc2="FX";
                       $lpuntos="FY";
                      break;
                      Case 60:
                       $lmarc1="FZ";
                       $lmarc2="GA";
                       $lpuntos="GB";
                      break;
                      Case 61:
                       $lmarc1="GC";
                       $lmarc2="GD";
                       $lpuntos="GE";
                      break;
                      Case 62:
                       $lmarc1="GF";
                       $lmarc2="GG";
                       $lpuntos="GH";
                      break;
                      Case 63:
                       $lmarc1="GI";
                       $lmarc2="GJ";
                       $lpuntos="GK";
                      break;
                      Case 64:
                       $lmarc1="GL";
                       $lmarc2="GM";
                       $lpuntos="GN";
                      break;
                      Case 65:
                       $lmarc1="GO";
                       $lmarc2="GP";
                       $lpuntos="GQ";
                      break;


               
               
               
               }
               
              $objPHPExcel->getActiveSheet()->SetCellValue($lmarc1.$I,  $equipo1 . ": ". $fila['marcador1']); // pais1 : marcador 1
        	  $objPHPExcel->getActiveSheet()->SetCellValue($lmarc2.$I,  $equipo2 . ": ".$fila['marcador2']); // pais2 : marcador 2
              
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
                      $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Fecha Actualizacion"); 
                     $objPHPExcel->getActiveSheet()->SetCellValue('C1', $fechaact);  
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
// Calcular posiciones por equipo
$close = mysqli_close($dbcon);
	echo $salida;
include 'save3.php';
// fin de calcular posiciones

; 

//


function isInTime($match) {
                    return (diffTime($match) >= 1) ? true : false;
                }
                function diffTime($match) {

                    $date1 = strtotime($match);
                    return intval(floor(($date1 - time()) / 3600));
                }
?>
   
    
      



        



