<?php
 include 'db_conection.php';
 
	require_once '../PHPExcel/Classes/PHPExcel.php';
	// Creamos un objeto PHPExcel
	$objPHPExcel = new PHPExcel();
	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	//$objPHPExcel = $objReader->load('TopRankQuinielaQatar.xls');
	$objPHPExcel = $objReader->load('PlantillaCargaPicking.xlsx');
	// Indicamos que se pare en la hoja uno del libro
	$objPHPExcel->setActiveSheetIndex(0);
	$query="SELECT `id`, `ronda_id`, `fecha`, `equipo1_id`, `marcador1`, `equipo2_id`, `marcador2`, `ganador`, `estatus` FROM `partido` order by fecha; ";
	
	

	
	 $resultado = $dbcon->query($query);
	 $I=3;
		while ($fila = $resultado->fetch_assoc()) {
           $objPHPExcel->getActiveSheet()->SetCellValue('D'.$I, $fila['id']);
        	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$I,  $fila['marcador1']);
        	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$I,  $fila['marcador2']);
        	
        
        
        	
        
        	
        	$I=$I+1;
        	
		    
		}
    $objPHPExcel->getActiveSheet()->getProtection()->setPassword('password');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save("Top_Rank.xlsx");
	$salida=	"Descargue Top Rank 5";


	echo $salida; 
	
?>