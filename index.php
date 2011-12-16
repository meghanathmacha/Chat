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
	  <link href="style.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
        <title>OMEGLE2<?php echo $uid; ?></title>
        <script type="text/javascript" src="includes/jquery1.js"/></script>
         <script type="text/javascript" src="includes/jqueryui.js"/></script>
        <link rel="StyleSheet" href="style.css" type="text/css">
            <script type="text/javascript" src="includes/slimScroll.js"></script>
<style>
#chatlog {

overflow: auto;
}
</style>
	
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
                    $('#chatlog').css({
				  height: '500px',
				  width: '800px',
				  
    });
                    
                    
             }
             
      });
      
       
}, 100);
    
   
        
        var refresh1Id = setInterval(function()
{
          $("#chatitem").load("getmessage.php",{'partner_uid':partner_uid},function (data) {
            if(data){
            $('#chatlog').append('<p>'+data+'</p>');
              $("#chatlog").scrollTop($("#chatlog")[0].scrollHeight);
            }
            });   
}, 100);
      

       $("#message_submit").click(function(){
         var message= $("#message").val();
         $('#chatlog').append('<p>You:'+message+'</p>');
           $("#chatlog").scrollTop($("#chatlog")[0].scrollHeight);
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

$('#chatlog').slimscroll({
				  height : '500px',
                                  width :'600px',
				  railVisible: true
			  });

$('form').submit(function(e){
    e.preventDefault();
});

   $("input").keypress(function (e) {
       
        if ((e.which && e.which == 13) || (e.keyCode &&e.keyCode == 13)) {
            var message= $("#message").val();
	$("#message").attr("value",'');
         $('#chatlog').append('<p>You:'+message+'</p>');
          $("#chatlog").scrollTop($("#chatlog")[0].scrollHeight);
         $.post("feedmessage.php",{'uid_from' :'<?php echo $uid; ?>','message':message,'uid_to':partner_uid});  	 
       }	

});
  
     });
</script>
        
    <body >
	<div id="main" class="clearfix">   
	<footer class="post-meta">
            <div id = "status" style="width:600px;height:500px;"><div id = 'chatlog' style="width:600px;height:500px;overflow:auto;"></div></div>
        </footer>
        <div id = 'chatinit' style="visibility:hidden">  </div>
<div id='Messagebox'class="clearfix">
	<aside class="widget">
            <form class="searchform">
                <div id='MyDiv'>
        <input id='destroy' type='button' value='Destroy Session'></input>

        </div>
              <!--  <input
    autopost = "false";
    type="textarea" 
    value="Start typing here"
    id='message'
    name="visitors_name" 
    onblur="if(value=='') value = ''" 
    onfocus="if(value!='') value = ''"
 ></input>-->
 <div><p><label for="f5"></label><textarea id="message" cols="70" rows="5" ></textarea></p></div>
<div><input id='message_submit' type='button' class="btn" value='Go'></input></div>
            </form></aside></div>
        
        <div id = 'chatitem' style="visibility:hidden">
        </div>      
            
        </div>

        </div>    
	<head>

</head>
        

    </body>
</head>
    
</html>
