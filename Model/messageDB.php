<?php
class messageDB extends DB
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

}

?>
