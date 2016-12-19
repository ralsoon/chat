<?php
    $user_name     = $_REQUEST['name'];
    $user_passward = $_REQUEST['password'];

    if($user_name === '' || $user_passward === '')
    {
        header('Location: er001.html');
        exit;
    }

    $dsn  = 'mysql:dbname=chat; host=127.0.0.1';
    $user = 'root';
    $pw   = 'H@chiouji1';

    $sql  = 'SELECT * FROM user WHERE loginid = '."'".$user_name."'". ';';

    $dbh = new PDO($dsn, $user, $pw); //接続
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if($sth->columnCount() === 0) 
    {
        header('Location: er001.html');
        exit;
    }

    $buff=$sth->fetch();
    if($buff['password'] !== $user_passward)
    {
        header('Location: er001.html');
        exit;
    }

    session_start();
    $_SESSION['name'] = htmlspecialchars($buff['dispname']);
    $info = array('SysOP', "${buff['dispname']} Login.", date('Y-m-d G-i-s'));

    $fp = fopen('chat.log', 'a');
    flock($fp, LOCK_EX);
    fwrite($fp, serialize($info));
    fwrite($fp, "\n");
    fclose($fp);

    header('Location: wc201.php');
?>