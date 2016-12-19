<?php 
session_start();
$log  = file('chat.log');
$chat = array();

for($i=0; $i<15; $i++)
{
    if((15-$i) > count($log)) continue;
    array_push($chat, $log[count($log)-(15-$i)]);
}

$dsn  = 'mysql:dbname=chat; host=127.0.0.1';
$user = 'root';
$pw   = 'H@chiouji1';

$sql  = 'SELECT * FROM stamp_master';

$dbh = new PDO($dsn, $user, $pw); //接続
$sth = $dbh->prepare($sql);
$sth->execute();

$data=$sth->fetchAll();
?>

<html>
    <head>
        <title>Chat</title>
        <link rel="stylesheet" href="wc201.css">
    </head>
    <body>
        <br>
        <form action="wc201_send.php">
            <?php print $_SESSION['name']; ?> <input type="text" name="message" size=40> <input type="submit" value="Write"><br>
        </form>
        <form action="wc201_send_image.php">
            <?php 
                for($i = 0; $i < count($data); $i++)
                {
                    echo '<input type=image src="facePicture/'.$data[$i]['file_name'].'" name="message" value='.$i.' id="image">';
                }
            ?>
        </form>
        <hr>
        <input type="button" value="Refresh" onClick="window.location.reload();">
        <!--チャット欄-->
        <div class="box">
        <div class="box2">
        <?php
            for($i=count($chat)-1; $i>=0; $i--)
            {
                $array = unserialize($chat[$i]);
                print "$array[0] $array[1] ($array[2])";

                if($i-1 >= 0) print '<hr>';
            }
        ?>
        </div>
        </div>
        <hr>
        <a href="wc301.php" target="blank">History</a> 
        <div class="right">
            <form action="wc201_logout.php"> <input type="submit" value="Logout"/> </form>
        </div>
    </body>
</html>
