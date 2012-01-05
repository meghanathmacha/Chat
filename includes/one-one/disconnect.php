<?php 
require("../../Model/initDB.php");
require("../../Model/usersDB.php");
require("../../Model/messageDB.php");
$uid=$_REQUEST["uid"];
$partner_uid=$_REQUEST["partner_uid"];
$uDB= new usersDB();
$mDB= new messageDB();
$uDB->removepartner($uid);
sleep(1);
$uDB->removepartner($partner_uid);
?>