<?php 
require("Model/initDB.php");
require("Model/usersDB.php");
require("Model/messageDB.php");
$uid_to=$_REQUEST["partner_uid"];
$uDB= new usersDB();
$mDB= new messageDB();
if($mDB->getmessage($uid_to)){
 echo  "Stranger:".$mDB->getmessage($uid_to);
 $mDB->setstatus_1($uid_to);
}else { return false;}
?>