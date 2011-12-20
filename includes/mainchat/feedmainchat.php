<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$nick=$_REQUEST["nick"];
$message=$_REQUEST["message"];
$id=$_REQUEST["id"];
$mcDB= new mainchatDB();
$mcDB->feedmainchat($nick,$message,$id);
 ?>