<?php
$arr =array (
    'email'=> 'edwinh.palma@gmail.com',
    'password'=>'Harpal65*'
   
);
$data = json_encode($arr, JSON_UNESCAPED_SLASHES);




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.cup2022.ir/api/v1/user/login");
// curl_setopt($ch, CURLOPT_HEADER, "Content-Type: application/json");   
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch) ;

//$data = json_decode(file_get_contents($res), true);
//echo $res. '--------->' ;
$data = json_decode($res , TRUE);

echo "<pre>";
//print_r($data );

//Leemos el JSON
//$datos_clientes = file_get_contents("clientes.json");
//$json_clientes = json_decode($datos_clientes, true);
$token1='';
foreach ($data as $cliente) {
    $estatus=$cliente['status'];
    $token=$cliente['token'];
   $token1=$cliente['token'];
 //   echo 'Primer ciclo token-->' . $token ."<br>";
   //  foreach($countries as $token) {
  //    echo 'Token dentro ------> '.$countries['token']."<br>";
  //   $token1=$countries['token'];
 //   }
 
 //  echo 'Token ---> ' .$cliente['token']."<br>";
}

 //  echo  'Token final -->'. $token1."<br>";




// Monty


curl_close($ch);

// resultados
$jwt=$token1;
//$url = "http://api.cup2022.ir/api/v1/team/1"; // informacion de los equipos
$url = "http://api.cup2022.ir/api/v1/match"; // informacion de los juegos
//$url = "http://api.cup2022.ir/api/v1/bydate"; // por fecha
//$url = "http://api.cup2022.ir/api/v1/standings"; // posiciones
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer ".$jwt,
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);
$data = json_decode($resp, true);


echo "<pre>";
print_r($data );
//echo $resp;

//



//echo 'https://twiceeight.cl/qatar2022v1/freeapi2.php';
?>