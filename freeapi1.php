<?php
$arr =array (
    'name' => 'Edwin Palma',
    'email'=> 'edwinh.palma@gmail.com',
    'password'=>'Harpal65*',
    'passwordConfirm'=>'Harpal65*'
);
$data = json_encode($arr, JSON_UNESCAPED_SLASHES);




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.cup2022.ir/api/v1/user");
// curl_setopt($ch, CURLOPT_HEADER, "Content-Type: application/json");   
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
echo $res;
curl_close($ch);
//echo 'https://twiceeight.cl/qatar2022v1/freeapi1.php';
//{"status":"success","message":"User created","data":{"token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MzYyNjc5MTZjYWNjMDZmNDhkZDExZTciLCJpYXQiOjE2NjczOTM0MjYsImV4cCI6MTY2NzQ3OTgyNn0.ZwWY4t8yz7RfjpgeyvBs1aiWmMJwJ-Aau12tM84AKMY"}}
?>