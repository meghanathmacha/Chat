<?php 
require("Model/initDB.php");
require("Model/usersDB.php");
$uid=$_REQUEST["uid"];
$uDB= new usersDB();
$uDB->deleteuid($uid);
 ?>