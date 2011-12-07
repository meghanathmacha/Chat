<?php
include("session.php");
require("Model/initDB.php");
require("Model/usersDB.php");
$uDB = new usersDB();
$uDB->feeduid($uid);
echo "<br/>ONLINE USERS=".$uDB->online_users($uid);
if($uDB->checkstatus($uid)==0){
   $partner_uid=$uDB->search_partner($uid);
if(is_null($partner_uid)){
$partnerid=$uDB->search_partner($uid);
echo "<br/>PARTNER ID2=<br/>".$partner_uid;
    }else {
echo "<br/>PARTNER ID=".$partner_uid;} 
}
$uDB->checkstatus($uid);
$uDB->checkstatus($partner_uid);


$uDB->deleteuid($uid);
?>

