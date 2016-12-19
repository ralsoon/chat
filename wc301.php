<?php 
session_start();
$log  = file('chat.log');
$chat = array();

for($i=0; $i<15; $i++)
{
    if((15-$i) > count($log)) continue;
    array_push($chat, $log[count($log)-(15-$i)]);
}

?>

<html>
    <head>
        <title>Chat - History</title>
        <link rel="stylesheet" href="wc201.css">
    </head>
    <body>
        <br>
         <h1>Chat History</h1>
        <input type="button" value="Refresh" onClick="window.location.reload();">
        <!--チャット欄-->
        <div class="box">
        <div class="box2">
        <?php
            for($i=0; $i<count($chat); $i++)
            {
                $array = unserialize($chat[$i]);
                print "$array[0] $array[1] ($array[2])";

                if($i+1 < count($chat)) print '<hr>';
            }
        ?>
        </div>
        </div>
        <hr>
        <input type="button" value="Refresh" onClick="window.location.reload();">
        <div class="right">
           <input type="button" value="Close" onClick="
           if (/Chrome/i.test(navigator.userAgent))
           { 
               window.close(); 
           }
           else 
           {
         	   window.open('about:blank', '_self').close(); 
           }">
        </div>
    </body>
</html>
