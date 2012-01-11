<?php
require("../../Model/initDB.php");
require("../../Model/topicsDB.php");
require("../../Model/usersDB.php");
$tDB= new topicsDB();
$uDB= new usersDB();
$message= $_REQUEST['message'];
$uid= $_REQUEST['uid'];
$words = explode(" ", $message);
$topics= $tDB->gettopic();
$statistics=$uDB->getstatistics($uid);
//$statistics = array("0","0","0","0");
foreach ($words as $key => $value) {
    if(preg_match("/\b$value\b/i",$topics[1])){
    $statistics[0] += 1;
    //echo $statistics[0];
} 
elseif(preg_match("/\b$value\b/i",$topics[2])){
    $statistics[1] += 1;
    //echo $statistics[1];
}
elseif(preg_match("/\b$value\b/i",$topics[3])){
    $statistics[2] += 1;
   // echo $statistics[1];
}
elseif(preg_match("/\b$value\b/i",$topics[4])){
    $statistics[3] += 1;
   // echo $statistics[1];
}
$statistic=implode(",",$statistics);
$uDB->updatestatistics($uid,"$statistic");
}
?>