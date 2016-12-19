<?php
    session_start();
    $user_name = $_SESSION['name'];
    $info = array('SysOP', "$user_name Logout.", date('Y-m-d G-i-s'));

    $fp = fopen('chat.log', 'a');
    flock($fp, LOCK_EX);
    fwrite($fp, serialize($info));
    fwrite($fp, "\n");
    fclose($fp);

    header('Location: wc101.html');
    exit;
?>