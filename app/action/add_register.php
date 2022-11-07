<?php
session_start();
require_once ('..\config\config.php');



$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = 0;
$status = 1;
$phone = $_POST['phone'];




$_SESSION['alert'] = '<script type="text/javascript">swal("Rejestracja", "Rejestracja zakończona powodzeniem!", "success");</script>';




$add = "INSERT INTO `users`(`id`,`name`,`username`,`password`,`status`,`type`,`phone`) VALUES
(NULL,'$name','$username','$password','$status','$type','$phone')";
$db->query($add);
echo $add;


header('location: ..\index.php');



$db->close();
exit();
