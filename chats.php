<?php
#!/usr/local/bin/php

require_once('ZzZ/zzz.main.php');
require_once('ZzZ/zzz.functions.php');
$row = PFSL($stats=1);

if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'chats') {
	chats($row);

if(isset($_REQUEST['chat']) && !empty($_REQUEST['chat'])) {

    if ($row->level >= 10) {
    $chat = alphnum($_REQUEST['chat']);
	$ip = $_SERVER['REMOTE_ADDR'];
//PRECHECK IP CHATS
  $timer = time()-3;
$vquery = "SELECT * FROM `".$main['tbl_chat']."` WHERE `ip`='$ip' AND `timer`>='$timer' ORDER by `id` DESC LIMIT 50";
if ($vresult = mysqli_query($link, $vquery)) {
if (mysqli_num_rows($vresult) <= 2) {
    $inserti = "NULL,".(isset($row)?$row->id:0).",0,'$row->name $chat','$ip',".time();
    $cquery = "INSERT INTO `".$main['tbl_chat']."` VALUES ($inserti)";
    if (mysqli_query($link, $cquery)) {}
}
}else{

}
    }else{
    	    $inserti = "NULL,0,'$row->id','You can chat when you reach level 10, we have zero tolerance for misbehaviour.','$ip',".time();
    			$cquery = "INSERT INTO `".$main['tbl_chat']."` VALUES ($inserti)";
    			if (mysqli_query($link, $cquery)) {}
    			}
}

if ($_SERVER['REMOTE_ADDR'] == '::1') {
	$inserti = "NULL,0,0,'".cookie_hash($_SERVER,rand(10,20))."','',".time();
	$bquery = "INSERT INTO `".$main['tbl_chat']."` VALUES ($inserti)";
	if (mysqli_query($link, $bquery)) {}
}
}

?>
