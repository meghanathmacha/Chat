<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$time = $_REQUEST["time"];
$id=$_REQUEST["id"];
$mcDB= new mainchatDB();
echo $mcDB->getmainchat($time,$id);
?>