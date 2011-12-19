<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$nick = $_REQUEST["nick"];
$time = $_REQUEST["time"];
$mcDB= new mainchatDB();
echo $mcDB->getmainchat($nick,$time);
/*if($message){
  echo $message;
}else {
    return false;
}*/
?>