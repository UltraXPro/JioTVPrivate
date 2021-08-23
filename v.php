
<?php
session_start();
$mn = $_GET['mob'];
$op = $_GET['otp'];
//echo $mn;
        $url = 'https://api.jio.com:443/v3/dip/user/otp/verify';
$data = array("identifier" => "$mn",
	"otp"=>"$op",
	"rememberUser" => "T",
	"upgradeAuth" => "Y",
	"returnSessionDetails" => "T",
		"deviceInfo" => array(
			"consumptionDeviceName" => "samsung SM-G998B",
				"info" => array(
					"type" => "android",
					"platform" => array(
						"name" => "p3s",
						"version" => "11"),
					"androidId" => "757922202b08f257")));
$postdata = json_encode($data);

$ch = curl_init($url);
define("COOKIE_FILE", "cookie.txt");


curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, COOKIE_FILE); 
curl_setopt ($ch, CURLOPT_COOKIEFILE, COOKIE_FILE); 
//$response = curl_exec($ch);



curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'x-api-key: l7xx938b6684ee9e4bbe8831a9a682b8e19f',
    'app-name: RJIL_JioTV',
    'User-Agent: Dalvik/2.1.0 (Linux; U; Android 11; SM-G998B Build/RP1A.200720.012)',
    'Connection: Keep-Alive',
    'Upgrade-Insecure-Requests: 1',
    'Accept-Encoding: gzip',)
);



$result = curl_exec($ch);
curl_close($ch);
$j=json_decode($result,true);
var_dump($j);
$k= $j["ssoToken"];
$crm= $j["sessionAttributes"]["user"]["subscriberId"];
$u= $j["sessionAttributes"]["user"]["unique"];
$n=$j["sessionAttributes"]["user"]["commonName"];
if($k != '') {
file_put_contents("tok.txt",$k);
file_put_contents("crm.txt",$crm);
file_put_contents("uid.txt",$u);
file_put_contents("nm.txt",$n);
//print_r ($result);
}
 else {
}
if($j["ssoLevel"] == 20) {
    header("Location: success.php");
        //echo "Login Success ! GO And Watch";

} else {
    //print('reCAPTCHA failed.');
    header("Location: failed.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="1;url=success.php">

</head>
<body>

<center>
<p>Please Wait...</p>
</center>
</body>
</html>
