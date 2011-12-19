<?php 
require("../../Model/initDB.php");
require("../../Model/mainchatDB.php");
$nick = $_REQUEST["nick"];
$time = $_REQUEST["time"];
$mcDB= new mainchatDB();
if($mcDB->getmainchat($nick,$time)){
  $message = $mcDB->getmainchat($nick,$time);
  echo $message;
}else {
    return false;
}
?>