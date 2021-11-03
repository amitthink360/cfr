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
   return json_decode($response);
} 
echo $_GET['code'];die;
//$link = get('https://aptrack.us/get_link.php', array('code'=> $_GET['code'],'ip'=> $_SERVER['REMOTE_ADDR']));
//header("Location:".$link->url);
?>