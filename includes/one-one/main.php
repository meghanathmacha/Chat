<?php
require("../../Model/initDB.php");
require("../../Model/usersDB.php");
$uid=$_REQUEST["uid"];
$uDB=new usersDB();
$partner_uid=$uDB->get_partner($uid);
if($partner_uid){
   echo $partner_uid;
}else{
   
   return false; }

?>



