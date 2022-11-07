<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$disabled = 1;

//





$add = "UPDATE category set disabled=$disabled where id like $id";
echo $add;
$db->query($add);
header('location: ..\view\category.php');



$db->close();
exit();
