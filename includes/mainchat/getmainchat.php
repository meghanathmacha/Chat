<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$nick = $_REQUEST["newnick"];
$time = $_REQUEST["time"];
$mcDB= new mainchatDB();
echo $mcDB->getmainchat($nick,$time);
?>