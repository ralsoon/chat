<?php
    session_start();

    $info = array($_SESSION['name'], $_REQUEST['message'], date('Y-m-d G-i-s'));

    $fp = fopen('chat.log', 'a');
    flock($fp, LOCK_EX);
	fwrite($fp, serialize($info));
    fwrite($fp, "\n");
	fclose($fp);

    header('Location: wc201.php');
?>