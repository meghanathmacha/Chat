<?php
class messageDB extends DB
{

public function feedmessage($uid_from,$message,$uid_to)
{
if($this->link)
{
$query="insert into messages (uid_from,message,uid_to) values ($uid_from,'$message',$uid_to)";
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
