<?php
require_once("session.php");
require("Model/initDB.php");
require("Model/usersDB.php");
$uDB = new usersDB();
$uDB->feeduid($uid);
if($uDB->checkstatus($uid)==0){
$partner_uid=$uDB->search_partner($uid);
if(is_null($partner_uid)){
$partner_uid=$uDB->search_partner($uid);    
}
}
?>
<html>
    <head>
        <title>OMEGLE2<?php echo $uid; ?></title>
        <script type="text/javascript" src="includes/jquery1.js"/></script>
            <script> $(document).ready(function(){
//For mozilla
/*window.onbeforeunload = confirmExit;
function confirmExit()
{
    var where_to = confirm("Click OK to exit, Click CANCEL to stay.");
    if (where_to == true)
    {
        $.post("unload.php",{'uid' :'<?php echo $uid; ?>'});
    }
    if (where_to == false){
        alert("Continue chatting");
    }
}*/

var refreshId = setInterval(function()
{
      $("#chatinit").load("main.php",{'uid':'<?php echo $uid; ?>'},function (data) {
            
             $("#chatinit").html(data);
             if(data) {
                 partner_uid= data;
                
             }else {
                    $("#chatlog").empty();
                    
                    
             }
             
      });
      
       
}, 100);
    
   
        
        var refresh1Id = setInterval(function()
{
          $("#chatitem").load("getmessage.php",{'partner_uid':partner_uid},function (data) {
            if(data)
            $('#chatlog').append('<p>'+data+'</p>');
            });   
}, 100);
      
        
       $("#message_submit").click(function(){
         var message= $("#message").val();
         $('#chatlog').append('<p>You:'+message+'</p>');
         $.post("feedmessage.php",{'uid_from' :'<?php echo $uid; ?>','message':message,'uid_to':partner_uid});  
       });
       $("#destroy").click(function(){
        $.post("disconnect.php",{'uid' :'<?php echo $uid; ?>','partner_uid':partner_uid});  
       });
       $(window).bind('beforeunload', function(event) {
    $.post("unload.php",{'uid' :'<?php echo $uid; ?>','partner_uid':partner_uid});
    event.returnValue = "What are you thinking??Please Leave the page :P";
    return event.returnValue;
}); 
     $(window).unload( function (){
         $.post("test.php",{'uid' :'<?php echo $uid; ?>'});
        });


   $("form input").keypress(function (e) {
        if ((e.which && e.which == 32) || (e.keyCode &&e.keyCode == 32)) {
            var message= $("#message").val();
	$("#message").attr("value",'');
         $('#chatlog').append('<p>You:'+message+'</p>');
         $.post("feedmessage.php",{'uid_from' :'<?php echo $uid; ?>','message':message,'uid_to':partner_uid});  	 
       }	

});
  
     });
</script>
        
    </head>
    <body ><br/>
        <div id='MyDiv'>
        <input id='destroy' type='button' value='Destroy Session'></input>
        </div>
        <div id = 'chatinit'>  
        </div>
        <div id = 'status'>  
        </div>
        <div id = 'chatlog'>
        </div>
        <div id = 'chatitem' style="visibility:hidden">
        </div>
<div id='Messagebox'>
		<form ><input 
    type="text" 
    value="Start typing here"
    id='message'
    name="visitors_name" 
    onblur="if(value=='') value = ''" 
    onfocus="if(value!='') value = ''"
 ></input>
	    
          <input id='message_submit' type='button' value='Go'></input></form>
</div>
                
        
    </body>
    
</html>
