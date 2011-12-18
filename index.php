<?php
require_once("includes/one-one/session.php");
require("Model/initDB.php");
require("Model/usersDB.php");
$uDB = new usersDB();
$uDB->feeduid($uid);
if($uDB->checkstatus($uid)==0){
$partner_uid=$uDB->search_partner($uid);
if(is_null($partner_uid)){
$partner_uid=$uDB->search_partner($uid);    
$online_users_no=$uDB->online_users($uid);
$status_user=$uDB->checkstatus($uid);
}
}
 

?>
<html>
    <head>
	  <link href="style.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
        <title>E-Strange <?php echo $uid; ?></title>
        <script type="text/javascript" src="includes/jquery1.js"/></script>
         <script type="text/javascript" src="includes/jqueryui.js"/></script>
        <link rel="StyleSheet" href="style.css" type="text/css">
            <script type="text/javascript" src="includes/slimScroll.js"></script>	
<div id="wrapper">
<header id="header" class="clearfix" role="banner">
    
        <hgroup>
            <h1 id="site-title"><a href="index.php">E Strange</a></h1>
        </hgroup>   
    </header> 

            <script> $(document).ready(function(){
//For mozilla
/*window.onbeforeunload = confirmExit;
function confirmExit()
{
    var where_to = confirm("Click OK to exit, Click CANCEL to stay.");
    if (where_to == true)
    {
        $.post("includes/one-one/unload.php",{'uid' :'<?php echo $uid; ?>'});
    }
    if (where_to == false){
        alert("Continue chatting");
    }
}*/

var refreshId = setInterval(function()
{
      $("#chatinit").load("includes/one-one/main.php",{'uid':'<?php echo $uid; ?>'},function (data) {
            
             $("#chatinit").html(data);
             if(data) {
                 partner_uid= data;
                $('#statusbar').html('<p>You are connected to a random Kgpian.Enjoy chatting</p>');
             }else {
                    $('#statusbar').empty();
                    $('#statusbar').html('<p>Please wait while you are being connected...</p>');
                    
                    $("#chatlog").empty();
                    $('#chatlog').css({
				  height: '350px',
				  width: '920px',
				  
    });
                    
                    
             }
             
      });
      
       
}, 100);
    
   
        
        var refresh1Id = setInterval(function()
{
          $("#chatitem").load("includes/one-one/getmessage.php",{'partner_uid':partner_uid},function (data) {
            if(data){
                
            $('#chatlog').append('<div><p>'+data+'</p></div><hr/>');
              $("#chatlog").scrollTop($("#chatlog")[0].scrollHeight);
            }
            });   
}, 100);
      

       $("#message_submit").click(function(){
         var message= $("#message").val();
if($("#message").val()!="")  {
         $('#chatlog').append('<div><p><b>You</b> :'+message+'</p></div><hr/>');
           $("#chatlog").scrollTop($("#chatlog")[0].scrollHeight);
         $.post("includes/one-one/feedmessage.php",{'uid_from' :'<?php echo $uid; ?>','message':message,'uid_to':partner_uid}); } 
       });
       $("#disconnect").click(function(){
        $.post("includes/one-one/disconnect.php",{'uid' :'<?php echo $uid; ?>','partner_uid':partner_uid});  
       });
       $(window).bind('beforeunload', function(event) {
    $.post("includes/one-one/unload.php",{'uid' :'<?php echo $uid; ?>','partner_uid':partner_uid});
    event.returnValue = "What are you thinking??Please Leave the page :P";
    return event.returnValue;
}); 
     $(window).unload( function (){
         $.post("includes/one-one/test.php",{'uid' :'<?php echo $uid; ?>'});
        });

$('#chatlog').slimscroll({
				  height : '350px',
                                  width :'920px',
				  railVisible: true
			  });

$('form').submit(function(e){
    e.preventDefault();
});

 $("textarea").keypress(function (e) {       
        if ((e.which && e.which == 13) || (e.keyCode &&e.keyCode == 13)) {
            var message= $("#message").val();	
$("#message").attr("value",'');
         $('#chatlog').append('<div><p><b>You</b> :'+message+'</p></div><hr/>');
          $("#chatlog").scrollTop($("#chatlog")[0].scrollHeight);
         $.post("includes/one-one/feedmessage.php",{'uid_from' :'<?php echo $uid; ?>','message':message,'uid_to':partner_uid});  	 
       }	
});
  
     });
</script>
        
    <body >

	<div id="main" class="clearfix">   
	
            <div id = "status" style="width:945px;height:415px;">
    <div id= 'statusbar' style="width:auto; height:30px;"></div>
    <div id = 'chatlog' >
    </div>
     <div id = 'chatitem' style="visibility:hidden">  </div>  
        <div id = 'chatinit' style="visibility:hidden">  </div> 
            </div>
<br/>
<div id='Messagebox' >
    <table><tr><td>
    <div id='disconnect'>
        <input id='disconnect' type='button' class="butn" value='Disconnect'></input>

        </div></td><td>
    <div id='textbox'><textarea
    autopost = "false";
    type="textarea" 
    value="Start typing here"
    id='message'
    name="visitors_name"
	style="width: 620px; height:56px;overflow:auto;"
    onblur="if(value=='') value = ''" 
    onfocus="if(value!='') value = ''"
 ></textarea></div></td><td>
    <div id='send'><input id='message_submit' type='button' class="butn" value='Go'></input></div> </td></tr></table>
 <!--  <input
    autopost = "false";
    type="textarea" 
    value="Start typing here"
    id='message'
    name="visitors_name" 
    onblur="if(value=='') value = ''" 
    onfocus="if(value!='') value = ''"
 ></input>-->
</div>
</div>
</div>    
<head>
</head>
</body>
</head>
</html>