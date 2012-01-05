<?php
function emoticons($message) {
  $emoticons = array(
    '<img src="../smileys/smile.png">' => array(':-)', ':)', ':]','=)'),
    '<img src="../smileys/wink.png">'   => array(';-)', ';)'),
    '<img src="../smileys/grin.png">'  => array(':-D', ':D','=D',':-d',':d','=d'),
    '<img src="../smileys/tongue.png">'  => array(':-P', ':P','=P',':-p', ':p','=p'),
    '<img src="../smileys/curlylips.png">'  => array(':3'),
    '<img src="../smileys/kiss.png">'  => array(':-*', ':*'),
    '<img src="../smileys/kiki.png">'  => array('^_^'),
    '<img src="../smileys/squint.png">'  => array('-_-'),
    '<img src="../smileys/confused.png">'  => array('o.O', 'O.o'),
    '<img src="../smileys/grupmy.png">'  => array('>:-(', '>:('),
'<img src="../smileys/upset.png">'  => array('>:O', '>:-O','>:o', '>:-o'),
'<img src="../smileys/sunglasses.png">'  => array('8-|', '8|','B-|','B|'),
'<img src="../smileys/glasses.png">'  => array('8-)', '8)','B-)','B)'),
'<img src="../smileys/pacman.png">'  => array(':v'),
'<img src="../smileys/angel.png">'  => array('O:)', 'O:-)','o:)','o:-)'),
'<img src="../smileys/frown.png">'  => array(':-(', ':(','=(',':['),
'<img src="../smileys/gasp.png">'  => array(':-O', ':O',':-o',':o'),
'<img src="../smileys/cry.png">'  => array(":'("),
'<img src="../smileys/unsure.png">'  => array(':/', ':-/'),
'<img src="../smileys/devil.png">'  => array('3:)', '3:-)'),
'<img src="../smileys/putnam.gif">'  => array(':putnam:',':PUTNAM:'),
'<img src="../smileys/robot.gif">'  => array(':|]'),
'<img src="../smileys/heart.png">'  => array('<3'),
'heartbreak'  => array('</3'),
'<img src="../smileys/shark.gif">'  => array('(^^^)'),
'<img src="../smileys/42.gif">'  => array(':42:'),
'<img src="../smileys/penguin.gif">'  => array('<(")'),
'Thumbsup'  => array('(Y)', '(y)'),

    );

  foreach ($emoticons as $emot => $icons) {
    $message = str_replace($icons, $emot, $message);
}
  return $message;
}
echo "lol :O :P :) :( (Y)";
?>