<?php
session_start();
require_once ('..\config\config.php');
$id = $_GET['id'];

$pass = substr(md5(date("d.m.Y.H.i.s").rand(1,55555555)) , 0 , 8);

$pass_ok = sha1($pass);

$delete = "UPDATE users SET password='$pass_ok' WHERE id LIKE '$id'";
$db->query($delete);

$_SESSION['alert'] = '<div class="alert alert-info">Nowe hasło: <b>'.$pass.'</b></div>';

//
    header('location: ..\view\users.php');


$db->close();
exit();
