<?php
class topicsDB extends DB
{

public function gettopic()
{
if($this->link)
{
$query="select words from topics ";
$result=mysql_query($query,$this->link);
if(mysql_affected_rows()>0)
{
$count=1;
while($row=mysql_fetch_row($result)){
$words[$count]=$row['0'];
$count++;
}
return $words;
}
return false;
}
return false;
}

}

?>