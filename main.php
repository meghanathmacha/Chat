<?php
require("Model/initDB.php");
require("Model/usersDB.php");
$uid=$_REQUEST["uid"];
$uDB=new usersDB();
$uDB->checkstatus($uid);
$partner_uid = $uDB->get_partner($uid);
$uDB->checkstatus($partner_uid);
?>

