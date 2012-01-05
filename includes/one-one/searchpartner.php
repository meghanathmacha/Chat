<?php
require("../../Model/initDB.php");
require("../../Model/usersDB.php");
$uid=$_REQUEST["uid"];
$uDB=new usersDB();
$old_partner_uid=$uDB->getoldpartner($uid);
$gender=$uDB->getgender($uid);
if($gender==1){
    $attempt_1=$uDB->female_partner($uid,$old_partner_uid);
    if(!($attempt_1)){
    $uDB->search_partner($uid,$old_partner_uid);
    }
}
if($gender==2){
    $attempt_1=$uDB->male_partner($uid,$old_partner_uid);
    if(!($attempt_1)){
    $uDB->search_partner($uid,$old_partner_uid);
    }
}
if($gender==0){
    $uDB->search_partner($uid,$old_partner_uid);
}

?>
