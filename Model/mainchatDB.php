<?php
class mainchatDB extends DB
{

public function feedmainchat($nick,$message)
{
if($this->link)
{
$time=time();
$query="insert into mainchat (nick,message,time) values ('$nick','$message',$time)";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
return true;
}
return false;
}
return false;
}
public function getmainchat($nick,$time)
{
if($this->link)
{
global $message;
$query="select nick,message from mainchat where time>$time";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
echo mysql_affected_rows()."<br/>";
while($row=mysql_fetch_row($result)){
if(!($row['0']=="$nick")){
$message = $message.$row['0'].":".$row['1']."<br/>";
}
}
return $message;
}
return false;
}
return false;
}
public function gettime()
{
if($this->link)
{
$query="select time from mainchat order by time desc limit 1";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$row=mysql_fetch_row($result);
$time = $row['0'];
echo $time;
return $time;
}
return false;
}
return false;
}
}
?>