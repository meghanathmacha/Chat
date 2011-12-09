<?php
require_once("session.php");
require("Model/initDB.php");
require("Model/usersDB.php");
$uDB = new usersDB();
$uDB->feeduid($uid);
echo "<br/>ONLINE USERS=".$uDB->online_users($uid);
            if($uDB->checkstatus($uid)==0){
               $partner_uid=$uDB->search_partner($uid);
            if(is_null($partner_uid)){
            $partnerid=$uDB->search_partner($uid);
            echo "<br/>PARTNER ID2=<br/>".$partner_uid;
                }else {
            echo "<br/>PARTNER ID=".$partner_uid;} 
            }
            $uDB->checkstatus($uid);
            $uDB->checkstatus($partner_uid);
            $uDB->get_partner($uid);
?>
<html>
    <head>
        <title>OMEGLE2<?php echo $uid; ?></title>
        <script type="text/javascript" src="includes/jquery.js"/></script>
        <script>
     $(document).ready(function(){
       $("#destroy").click(function(){
        $.post("test.php",{'uid' :'<?php echo $uid; ?>'});  
       });
       $("#reload").click(function(){
        
            $("#chatlog").load("main.php",{'uid':'<?php echo $uid; ?>'});
       
       });
       $("#message_submit").click(function(){
         var message= $("#message").val();
         $.post("message.php",{'uid_from' :'<?php echo $uid; ?>','message':message,'uid_to':'<?php echo $partner_uid; ?>'});  
       });
     });
   </script>
    </head>
    <body><br/>
        <div id='MyDiv'>
        <input id='destroy' type='button' value='Destroy Session'></input>
        </div>
        <div id = 'chatlog'>
            <input id='reload' type='button' value='Reload'></input>
            <?php
            
            if($uDB->checkstatus($uid)==0){
               $partner_uid=$uDB->search_partner($uid);
            if(is_null($partner_uid)){
            $partner_uid=$uDB->search_partner($uid);
            echo "<br/>PARTNER ID2=<br/>".$partner_uid;
                }else {
            echo "<br/>PARTNER ID=".$partner_uid;} 
            }
            echo "<br/>".$partner_uid;
            $uDB->checkstatus($uid);
            $uDB->checkstatus($partner_uid);
            ?>
        
        </div>
        <div id='Messagebox'>
            <input type='text' id='message' value='start typing here'></input>
            <input id='message_submit' type='button' value='Go'></input>
        </div>
        
        <script type="text/javascript">
        
     $(window).unload( function (){
         $.post("test.php",{'uid' :'<?php echo $uid; ?>'});
        });
</script>
    </body>
    
</html>



