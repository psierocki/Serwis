<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$type = 1;







$add = "UPDATE users set type=$type where id like $id";
echo $add;
$db->query($add);
$_SESSION['notification'] = '<div class="alert alert-success" role="alert">Zmieniono konto na klienta!</div>';
header('location: ..\view\users.php');



$db->close();
exit();
