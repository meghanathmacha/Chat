<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$nick=$_REQUEST["nick"];
$message=$_REQUEST["message"];
$mcDB= new mainchatDB();
$mcDB->feedmainchat($nick,$message);
 ?>