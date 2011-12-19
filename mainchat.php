<?php
require("Model/initDB.php");
require("Model/mainchatDB.php");
$time=time();
$mcDB = new mainchatDB();
?>
<html>
    <head>
	  <link href="style.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
        <title>E-Strange Main chat</title>
        <script type="text/javascript" src="includes/jquery1.js"/></script>
         <script type="text/javascript" src="includes/jqueryui.js"/></script>
        <link rel="StyleSheet" href="style.css" type="text/css">
            <script type="text/javascript" src="includes/slimScroll.js"></script>	
<div id="wrapper">
<header id="header" class="clearfix" role="banner">
    
        <hgroup>
            <h1 id="site-title"><a href="index.php">E Strange Main Chat</a></h1>
        </hgroup>   
    </header> 

            <script> $(document).ready(function(){
		var refreshId = setInterval(function()
{
	    
          $("#chatitem").load("includes/mainchat/getmainchat.php",{'nick':nick,'time':time},function (data) {
            if(data){
            $('#chatlog').append('<div><p>'+data+'</p></div>');
            }
            });

}, 100);
                $("#nick_submit").click(function(){
         var nickname= $("#nick").val();
if(nickname)  {
    nick = nickname;
         $('#nickbox').css({visibility:'hidden',});
         } 
       });
                
$("#message_submit").click(function(){
         var message= $("#message").val();
if(message)  {
         $('#chatlog').append('<div><p><b>'+nick+'</b> :'+message+'</p></div>');
         $.post("includes/mainchat/feedmainchat.php",{'nick' : nick,'message':message});
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
 <div id= 'nickbox'><input
    autopost = "false";
    type="textarea" 
    value="Start typing here"
    id='nick'
    name="visitors_name" 
    onblur="if(value=='') value = ''" 
    onfocus="if(value!='') value = ''"
 ></input><div id='go'><input id='nick_submit' type='button' class="butn" value='Thats it.'></input></div> </div>
</div>
</div>
</div>    
<head>
</head>
</body>
</head>
</html>