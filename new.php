<?php
$num = rand();
echo '<a href="mainchat.php?id=', urlencode($num), '">nice</a>';
echo $_SERVER['REMOTE_ADDR'];
echo "<PRE>" . print_r($_SERVER, true) . "</PRE>";
echo "<br/>";
function getClientIP() {

if (isset($_SERVER)) {

    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        return $_SERVER["HTTP_X_FORWARDED_FOR"];

    if (isset($_SERVER["HTTP_CLIENT_IP"]))
        return $_SERVER["HTTP_CLIENT_IP"];

    return $_SERVER["REMOTE_ADDR"];
}

if (getenv('HTTP_X_FORWARDED_FOR'))
    return getenv('HTTP_X_FORWARDED_FOR');

if (getenv('HTTP_CLIENT_IP'))
    return getenv('HTTP_CLIENT_IP');

return getenv('REMOTE_ADDR');
}
echo getClientIP();
function getRealIpAddr()


{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
echo getRealIpAddr();

?>