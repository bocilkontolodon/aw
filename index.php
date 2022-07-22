<?php 
//error_reporting(0);
session_start();
require "twitteroauth-main/autoload.php";
require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$cONSUMER_KEY = "fTOSrIs2jnE3hVAyqHtisILWS";
$cONSUMER_SECRET = "I22XD9IdFLa7E9il8mo946BdIkYPUxt8KuLsR0GruQh4KFp6Hb";
$access_token = "1431164278816460800-cUb3dJkMmrpuEJBTxp9sSlCpCEUvz4";
$access_token_secret = "1UZNl3ElyTUTcOVfsMeUoDumimWjezB7NzmMNEkedfqIP";
$connection = new TwitterOAuth($cONSUMER_KEY, $cONSUMER_SECRET, $access_token, $access_token_secret);

$var = file_get_contents('kw.txt'); 
$result = explode(',',$var); 
$kw = $result[array_rand($result)];
$tweets  = $connection->get("search/tweets", ["count" => 5,  "q" => $kw,  "result_type" => 'recent',  "lang" => 'id',]);
foreach ($tweets->statuses as $key => $tweet) {

$twe =  '@'.$tweet->user->screen_name;
$tw[] =$twe;
}
$username = implode(" ", $tw);
echo $username;
$twit = 'Viral mahasiswi UGM diajak dosen ke hotel agar bisa lulus 👉 http://bit.do/UGM_Viral'."\n\n".$username;
$t = $connection->post('statuses/update', array('status' => $twit));
exit();

?>
