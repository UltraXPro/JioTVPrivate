<?php
$mn = $_GET['mob'];
//echo $mn;
$url = "https://api.jio.com:443/v3/dip/user/otp/send";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "x-api-key: l7xx938b6684ee9e4bbe8831a9a682b8e19f",
   "app-name: RJIL_JioTV",
   "User-Agent: Dalvik/2.1.0 (Linux; U; Android 11; SM-G998B 	Build/RP1A.200720.012)",
   "Connection: Keep-Alive,",
   "Accept-Encoding: gzip,",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//{\"identifier\":\"$mn\",\"otpIdentifier\":\"$mn\",\"action\":\"otpbasedauthn\"}"
//$data = '{"identifier":"$mn","otpIdentifier":"$mn","action":"otpbasedauthn"}';
$data ="{\"identifier\":\"$mn\",\"otpIdentifier\":\"$mn\",\"action\":\"otpbasedauthn\"}";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);


?>
<html lang="en"><head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <title>YMTV LIVE</title>
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<style>
.main-content{
	width: 50%;
	border-radius: 20px;
	box-shadow: 0 5px 5px rgba(0,0,0,.4);
	margin: 5em auto;
	display: flex;
}
.company__info{
	background-color: #008080;
	border-top-left-radius: 20px;
	border-bottom-left-radius: 20px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	color: #fff;
}
.fa-android{
	font-size:3em;
}
@media screen and (max-width: 640px) {
	.main-content{width: 90%;}
	.company__info{
		display: none;
	}
	.login_form{
		border-top-left-radius:20px;
		border-bottom-left-radius:20px;
	}
}
@media screen and (min-width: 642px) and (max-width:800px){
	.main-content{width: 70%;}
}
.row > h2{
	color:#008080;
}
.login_form{
	background-color: #fff;
	border-top-right-radius:20px;
	border-bottom-right-radius:20px;
	border-top:1px solid #ccc;
	border-right:1px solid #ccc;
}
form{
	padding: 0 2em;
}
.form__input{
	width: 100%;
	border:0px solid transparent;
	border-radius: 0;
	border-bottom: 1px solid #aaa;
	padding: 1em .5em .5em;
	padding-left: 2em;
	outline:none;
	margin:1.5em auto;
	transition: all .5s ease;
}
.form__input:focus{
	border-bottom-color: #008080;
	box-shadow: 0 0 5px rgba(0,80,80,.4); 
	border-radius: 4px;
}
.btn{
	transition: all .5s ease;
	width: 70%;
	border-radius: 30px;
	color:#008080;
	font-weight: 600;
	background-color: #fff;
	border: 1px solid #008080;
	margin-top: 1.5em;
	margin-bottom: 1em;
}
.btn:hover, .btn:focus{
	background-color: #008080;
	color:#fff;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no">
  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>OTP Page</title>


	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><img width="70.722" height="89.778" src="https://ymtvapk.xyz/wp-content/uploads/2021/05/logo-1.png" class="attachment-large size-large" alt="" loading="lazy" srcset="https://ymtvapk.xyz/wp-content/uploads/2021/05/logo-1.png 192w, https://ymtvapk.xyz/wp-content/uploads/2021/05/logo-1-150x150.png 150w" sizes="(max-width: 192px) 100vw, 192px"></h2></span>
				<h4 class="company_title">YM TV LIVE</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						
						<div class="alert alert-success" role="alert">Enter OTP !
</div>
					</div>
					<div class="row">
						<form action="v.php" method="GET" control="" class="form-group">
							<div class="row">
								<input type="text" name="otp" id="otp" class="form__input" placeholder="Enter OTP" required="">
							</div>
							<div class="row">
								 <input type="hidden" id="mob" name="mob" value="<?php echo $mn ?>">
							</div>
							
							<div class="row">
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer">
		Coded with ♥ by <a href="https://ymtvapk.xyz/">YM TV LIVE.</a><p></p>
	</div>
</body></html>


