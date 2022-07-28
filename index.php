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

if(isset($code)){
	$link = get('http://147.182.178.125/'.$code);
	header("Location:".$link);
}else{
	echo "Coming Soon";	
}
?>