<?php
session_start();
require_once ('..\config\config.php');



$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$type = $_POST['type'];
$status = 1;
$phone = $_POST['phone'];




//



$add = "INSERT INTO `users`(`id`,`name`,`username`,`password`,`status`,`type`,`phone`) VALUES
(NULL,'$name','$mail','$password','$status','$type','$phone')";
$db->query($add);
echo $add;


header('location: ..\view\users.php');



$db->close();
exit();
