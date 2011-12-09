<?php 
require("Model/initDB.php");
require("Model/usersDB.php");
require("Model/messageDB.php");
$uid_from=$_REQUEST["uid_from"];
$message=$_REQUEST["message"];
$uid_to=$_REQUEST["uid_to"];
$uDB= new usersDB();
$mDB= new messageDB();
$mDB->feedmessage($uid_from,$message,$uid_to);
 ?>