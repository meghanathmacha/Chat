<?php 
require("../../Model/initDB.php");
require("../../Model/usersDB.php");
require("../../Model/messageDB.php");
$uid_from=$_REQUEST["uid_from"];
$message=$_REQUEST["message"];
$uid_to=$_REQUEST["uid_to"];
$uDB= new usersDB();
$mDB= new messageDB();
$uDB->gender($uid,'1');
$gender=$uDB->getgender($uid);

if($gender==0){
if(preg_match("/\bm\b/i", $message) or preg_match("/\bmale\b/i", $message)){
  $uDB->gender($uid_from,'1');
}
if(preg_match("/\bf\b/i", $message) or preg_match("/\bfemale\b/i",$message)){
  $uDB->gender($uid_from,2);
}
}
$mDB->feedmessage($uid_from,$message,$uid_to);
 ?>