<?php 
require("../../Model/initDB.php");
require("../../Model/usersDB.php");
require("../../Model/messageDB.php");
$uid_to=$_REQUEST["partner_uid"];
$uDB= new usersDB();
$mDB= new messageDB();
$message=$mDB->getmessage($uid_to);
$new_message=$mDB->emoticons($message);
if($new_message){
 echo  "<strong>Stranger</strong>:".$new_message;
 $mDB->setstatus_1($uid_to);
}else { return false;}
?>