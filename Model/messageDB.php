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
public function emoticons($message) {
  $emoticons = array(
    '<img src="includes/smileys/smile.png">' => array(':-)', ':)', ':]','=)'),
    '<img src="includes/smileys/wink.png">'   => array(';-)', ';)'),
    '<img src="includes/smileys/grin.png">'  => array(':-D', ':D','=D',':-d',':d','=d'),
    '<img src="includes/smileys/tongue.png">'  => array(':-P', ':P','=P',':-p', ':p','=p'),
    '<img src="includes/smileys/curlylips.png">'  => array(':3'),
    '<img src="includes/smileys/kiss.png">'  => array(':-*', ':*'),
    '<img src="includes/smileys/kiki.png">'  => array('^_^'),
    '<img src="includes/smileys/squint.png">'  => array('-_-'),
    '<img src="includes/smileys/confused.png">'  => array('o.O', 'O.o'),
    '<img src="includes/smileys/grupmy.png">'  => array('>:-(', '>:('),
'<img src="includes/smileys/upset.png">'  => array('>:O', '>:-O','>:o', '>:-o'),
'<img src="includes/smileys/sunglasses.png">'  => array('8-|', '8|','B-|','B|'),
'<img src="includes/smileys/glasses.png">'  => array('8-)', '8)','B-)','B)'),
'<img src="includes/smileys/pacman.png">'  => array(':v'),
'<img src="includes/smileys/angel.png">'  => array('O:)', 'O:-)','o:)','o:-)'),
'<img src="includes/smileys/frown.png">'  => array(':-(', ':(','=(',':['),
'<img src="includes/smileys/gasp.png">'  => array(':-O', ':O',':-o',':o'),
'<img src="includes/smileys/cry.png">'  => array(":'("),
'<img src="includes/smileys/unsure.png">'  => array(':/', ':-/'),
'<img src="includes/smileys/devil.png">'  => array('3:)', '3:-)'),
'<img src="includes/smileys/putnam.gif">'  => array(':putnam:',':PUTNAM:'),
'<img src="includes/smileys/robot.gif">'  => array(':|]'),
'<img src="includes/smileys/heart.png">'  => array('<3'),
'heartbreak'  => array('</3'),
'<img src="includes/smileys/shark.gif">'  => array('(^^^)'),
'<img src="includes/smileys/42.gif">'  => array(':42:'),
'<img src="includes/smileys/penguin.gif">'  => array('<(")'),
'Thumbsup'  => array('(Y)', '(y)'),

    );

  foreach ($emoticons as $emot => $icons) {
    $message = str_replace($icons, $emot, $message);
}
  return $message;
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

public function deletemessage($uid_to)
{
if($this->link)
{
$query="DELETE FROM messages WHERE messages.uid_from=$uid_to or messages.uid_to=$uid_to";
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
}

?>