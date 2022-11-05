<?php
$user_id=$_SESSION['user_id'] ;
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
<script src="js/countdown.js"></script>
                <ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="index.php"> &nbsp; <span class='glyphicon glyphicon-home'></span> Home</a></li>
                           
                  
					<li><a href="rules.php"> &nbsp; <span class='glyphicon glyphicon-chevron-up'></span> Reglas del Juego</a></li>
					<li><a href="formcarga2.php"> &nbsp; <span class='glyphicon glyphicon-random'></span> Mi Quinielas</a></li>
				
                   <li><a data-toggle="modal" data-target="#setposicion"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> Posicion de los Usuarios </a></li>
                  
					<li><a href="resultados.php"> &nbsp; <span class='glyphicon glyphicon-eye-open'></span> Resultados Diarios</a></li>
                     <li><a href="TablaPosiciones.php"> &nbsp; <span <span class='glyphicon glyphicon-list-alt'></span> Tabla de Posiciones</a></li>
                     <li><a data-toggle="modal" data-target="#setAccount"> &nbsp; <span class='fa fa-gear'></span> Configurar Cuenta </a></li>
                 
                    
                  
                       <li><a href="formCarga1.php"> &nbsp; <span class='glyphicon glyphicon-circle-arrow-up'></span> Cargar Datos Reales(Administrador)</a></li>
					
					<li><a href="logout.php"> &nbsp; <span class='glyphicon glyphicon-off'></span> Logout</a></li>

                   



            </ul>
                  
        
      
                <ul class="nav navbar-nav navbar-right navbar-user">
                  
                  
                  
                  
                  
                    <li class="dropdown messages-dropdown">
                        <a href="#"><i class="fa fa-calendar"></i>  <?php
                        date_default_timezone_set("America/New_York");
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                          
                            echo $new;
                          
                  


                          
                          ?></a>
                        
                    </li>
				
         
