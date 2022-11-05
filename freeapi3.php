<?php




$jwt='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MzYyNjc5MTZjYWNjMDZmNDhkZDExZTciLCJpYXQiOjE2NjczOTM0MjYsImV4cCI6MTY2NzQ3OTgyNn0.ZwWY4t8yz7RfjpgeyvBs1aiWmMJwJ-Aau12tM84AKMY';


$url = "http://api.cup2022.ir/api/v1/team";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MzYyNjc5MTZjYWNjMDZmNDhkZDExZTciLCJpYXQiOjE2NjczOTM0MjYsImV4cCI6MTY2NzQ3OTgyNn0.ZwWY4t8yz7RfjpgeyvBs1aiWmMJwJ-Aau12tM84AKMY",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);
$data = json_decode($resp, true);

echo $data;





//{"status":"success","message":"User created","data":{"token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MzYyNjc5MTZjYWNjMDZmNDhkZDExZTciLCJpYXQiOjE2NjczOTM0MjYsImV4cCI6MTY2NzQ3OTgyNn0.ZwWY4t8yz7RfjpgeyvBs1aiWmMJwJ-Aau12tM84AKMY"}}

?>
