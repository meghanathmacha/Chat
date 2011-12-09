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

public function search_partner($uid)
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
if($uid==$partner_uid){return false;}else{
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
echo "PARTNER ID FROM GET FUNCTION ==".$partner_uid;
return $partner_uid;
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
echo "<br/>STATUS of ".$uid."=".$row['0'];
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
