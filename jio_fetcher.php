<?php
//http://localhost/jio/jio_fetcher.php?u=&p=  // link format
$u = $_GET['u'];
if(strpos($u, "@") !== false) {
$user = $u;
} else {
$user = "+91".$u;
}
$p = $_GET['p'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.jio.com/v3/dip/user/unpw/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\"identifier\": \"$user\", \"password\": \"$p\", \"rememberUser\": \"T\", \"upgradeAuth\": \"Y\", \"returnSessionDetails\": \"T\", \"deviceInfo\": {\"consumptionDeviceName\": \"Jio\", \"info\": {\"type\": \"android\", \"platform\": {\"name\": \"vbox86p\", \"version\": \"8.0.0\"}, \"androidId\": \"6fcadeb7b4b10d77\"}}}",
  CURLOPT_HTTPHEADER => array(
    "x-api-key: l7xx75e822925f184370b2e25170c5d5820a",
    "Content-Type: application/json"
  ),
));

$result = curl_exec($curl);
curl_close($curl);

//echo $result;
$j=json_decode($result,true);
echo var_dump($j);

$k= $j["ssoToken"];
$crm= $j["sessionAttributes"]["user"]["subscriberId"];
$u= $j["sessionAttributes"]["user"]["unique"];
$n=$j["sessionAttributes"]["user"]["commonName"];


if($k != '') {

file_put_contents("tok.txt",$k);
file_put_contents("crm.txt",$crm);
file_put_contents("uid.txt",$u);
file_put_contents("nm.txt",$n);
}
 else {
}

if($j["ssoLevel"] == 40) {
    header("Location: success.php");
        //echo "Login Success ! GO And Watch";

} else {
    //print('reCAPTCHA failed.');
    header("Location: failed.php");
}
?>