<?php
session_start();
require_once ('..\config\config.php');



$name = $_POST['name'];
$disabled = 0;



//




$add = "INSERT INTO `category`(`id`,`name`,`disabled`) VALUES
(NULL,'$name','$disabled')";
$db->query($add);
echo $add;


header('location: ..\view\category.php');



$db->close();
exit();
