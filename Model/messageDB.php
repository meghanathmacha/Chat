<?php
class messageDB extends DB
{
public function feedmessage($uid_from,$message,$uid_to)
{
if($this->link)
{
$time=time();
$query="insert into messages (uid_from,message,uid_to,time) values ($uid_from,'$message',$uid_to,$time)";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
return true;
}
return false;
}
return false;
}
public function getmessage($uid_to)
{
if($this->link)
{
$query="select message from messages where messages.uid_from=$uid_to and messages.status=0 limit 1";
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
public function setstatus_1($uid_from)
{
if($this->link)
{
$query="UPDATE messages SET status=1 WHERE messages.uid_from=$uid_from";
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
