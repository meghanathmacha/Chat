<?php
class usersDB extends DB
{

public function feeduid($uid)
{
if($this->link)
{
$query="insert into users (uid) values ($uid)";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
return true;
}
return false;
}
return false;
}

public function gender($uid,$gender)
{
if($this->link)
{
$query="UPDATE users SET gender=$gender WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
return true;
}
return false;
}
return false;
}
public function getgender($uid)
{
if($this->link)
{
    
$query="SELECT gender FROM users WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
   $row=mysql_fetch_row($result);
   
return $row['0'];
}
return false;
}
return false;
}
public function deleteuid($uid)
{
if($this->link)
{
$query="DELETE FROM users WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
return true;
}
return false;
}
return false;
}

public function search_partner($uid,$old_partner_uid=NULL)
{
if($this->link)
{

$query="SELECT uid FROM users WHERE users.status=0";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$count=0;
while($row=mysql_fetch_row($result)){
    $uids[$count]=$row['0'];
    $count++;
}
$number=rand(0,$count-2);
$partner_uid=$uids[$number];
if(($uid==$partner_uid) || ($partner_uid==$old_partner_uid)){return false;}
else{
$query="UPDATE users SET partner_uid=$partner_uid WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
$query="UPDATE users SET partner_uid=$uid WHERE users.uid=$partner_uid";
$result=mysql_query($query,$this->link);
$this->get_partner($uid);
$this->setstatus_1($uid);
$this->setstatus_1($partner_uid);
return $partner_uid;}
}
return false;
}
return false;
}
public function female_partner($uid,$old_partner_uid=NULL)
{
if($this->link)
{

$query="SELECT uid FROM users WHERE users.status=0 AND users.gender=2";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$count=0;
while($row=mysql_fetch_row($result)){
    $uids[$count]=$row['0'];
    $count++;
}
$number=rand(0,$count-2);
$partner_uid=$uids[$number];
if(($uid==$partner_uid) || ($partner_uid==$old_partner_uid)){return false;}
else{
$query="UPDATE users SET partner_uid=$partner_uid WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
$query="UPDATE users SET partner_uid=$uid WHERE users.uid=$partner_uid";
$result=mysql_query($query,$this->link);
$this->get_partner($uid);
$this->setstatus_1($uid);
$this->setstatus_1($partner_uid);
return $partner_uid;}
}
return false;
}
return false;
}
public function male_partner($uid,$old_partner_uid=NULL)
{
if($this->link)
{

$query="SELECT uid FROM users WHERE users.status=0 AND users.gender=1 ";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$count=0;
while($row=mysql_fetch_row($result)){
    $uids[$count]=$row['0'];
    $count++;
}
$number=rand(0,$count-2);
$partner_uid=$uids[$number];
if(($uid==$partner_uid) || ($partner_uid==$old_partner_uid)){return false;}
else{
$query="UPDATE users SET partner_uid=$partner_uid WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
$query="UPDATE users SET partner_uid=$uid WHERE users.uid=$partner_uid";
$result=mysql_query($query,$this->link);
$this->get_partner($uid);
$this->setstatus_1($uid);
$this->setstatus_1($partner_uid);
return $partner_uid;}
}
return false;
}
return false;
}

public function get_partner($uid)
{
if($this->link)
{
$query="SELECT partner_uid FROM users WHERE users.status=1 AND users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$row=mysql_fetch_row($result);
$partner_uid=$row['0'];
return $partner_uid;
}
return false;
}
return false;
}

public function removepartner($uid)
{
if($this->link)
{
$query="UPDATE users SET status=0,old_partner_uid=partner_uid,partner_uid=0 WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{

return true;
}
return false;
}
return false;
}
public function getoldpartner($uid)
{
if($this->link)
{
$query="SELECT old_partner_uid FROM users WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$row=mysql_fetch_row($result);
return $row['0'];
}
return false;
}
return false;
}

public function online_users($uid)
{
if($this->link)
{
$query="SELECT * FROM users WHERE users.status=0 ";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$count = mysql_affected_rows();
return $count-1;
}
return false;
}
return false;
}
public function checkstatus($uid)
{
if($this->link)
{
$query="SELECT status FROM users WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$row=mysql_fetch_row($result);
return $row['0'];
}
return false;
}
return false;
}
public function setstatus_1($uid)
{
if($this->link)
{
$query="UPDATE users SET status=1 WHERE users.uid=$uid";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{

return true;
}
return false;
}
return false;
}
}

?>
