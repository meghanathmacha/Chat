<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$time = $_REQUEST["time"];
$mcDB= new mainchatDB();
echo $mcDB->getmainchat($time);
?>